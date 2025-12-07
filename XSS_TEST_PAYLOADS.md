# XSS Test Payloads for Security Testing

**⚠️ WARNING: These are for testing purposes only. Use only on your own development environment.**

## How to Test

1. Create a new news post in the admin panel
2. Try entering these payloads in the **description** field (where rich text is allowed)
3. Save and view the news post on the frontend
4. Check if the payloads are properly sanitized (they should be)

---

## Test Payloads

### 1. Basic Script Tag Attack
**Payload:**
```html
<script>alert('XSS Attack!')</script>
```

**Expected Result:** The `<script>` tag should be completely removed. No alert should appear.

---

### 2. Event Handler Attack (onclick)
**Payload:**
```html
<img src="x" onerror="alert('XSS via onerror')">
```

**Expected Result:** The `onerror` attribute should be stripped. The image tag might remain but without the event handler.

---

### 3. JavaScript URL Attack
**Payload:**
```html
<a href="javascript:alert('XSS via href')">Click me</a>
```

**Expected Result:** The `javascript:` URL should be removed from the href attribute. The link should either be removed or have an empty/invalid href.

---

### 4. Data URI Attack
**Payload:**
```html
<a href="data:text/html,<script>alert('XSS')</script>">Data URI attack</a>
```

**Expected Result:** The `data:` URL should be removed from the href.

---

### 5. Inline Style with Expression (IE-specific, but test anyway)
**Payload:**
```html
<div style="background:url('javascript:alert(1)')">Styled div</div>
```

**Expected Result:** The style attribute should be sanitized, and any javascript: URLs should be removed.

---

### 6. SVG with Script
**Payload:**
```html
<svg><script>alert('SVG XSS')</script></svg>
```

**Expected Result:** SVG tags are not in the allowed list, so this should be completely removed.

---

### 7. Iframe Attack
**Payload:**
```html
<iframe src="javascript:alert('XSS')"></iframe>
```

**Expected Result:** `<iframe>` is not in the allowed tags list, so it should be removed.

---

### 8. Object/Embed Attack
**Payload:**
```html
<object data="javascript:alert('XSS')"></object>
<embed src="javascript:alert('XSS')">
```

**Expected Result:** Both tags should be removed as they're not in the allowed list.

---

### 9. Multiple Event Handlers
**Payload:**
```html
<div onclick="alert(1)" onmouseover="alert(2)" onload="alert(3)">Hover me</div>
```

**Expected Result:** All event handler attributes should be stripped.

---

### 10. Encoded Attack (HTML Entities)
**Payload:**
```html
&lt;script&gt;alert('Encoded XSS')&lt;/script&gt;
```

**Expected Result:** Should be displayed as plain text (the entities should be shown, not executed).

---

### 11. Mixed Case Attack (Evasion attempt)
**Payload:**
```html
<ScRiPt>alert('Case evasion')</ScRiPt>
```

**Expected Result:** Should still be caught and removed (regex is case-insensitive).

---

### 12. Nested Script Tags
**Payload:**
```html
<script><script>alert('Nested')</script></script>
```

**Expected Result:** Both script tags should be removed.

---

### 13. Safe HTML (Should Work)
**Payload:**
```html
<p>This is a <strong>safe</strong> paragraph with <a href="https://example.com">a link</a>.</p>
```

**Expected Result:** This should work fine - it's legitimate HTML that should be allowed.

---

## How to Verify Protection

### Method 1: Browser Console
1. Open browser DevTools (F12)
2. Go to Console tab
3. After saving the news post, check if any JavaScript errors or alerts appear
4. If you see alerts, the protection failed

### Method 2: View Page Source
1. After saving, view the news post on the frontend
2. Right-click → View Page Source
3. Search for your test payload
4. Verify that:
   - `<script>` tags are removed
   - Event handlers are stripped
   - `javascript:` URLs are removed

### Method 3: Network Tab
1. Open DevTools → Network tab
2. Look for any unexpected requests (like data exfiltration attempts)
3. If your payload tried to send data externally, you'd see it here

---

## What Should Happen (Expected Behavior)

✅ **GOOD (Protected):**
- Script tags are completely removed
- Event handlers are stripped
- JavaScript URLs are blocked
- Only safe HTML tags remain
- Text is properly escaped

❌ **BAD (Vulnerable):**
- Alert boxes appear
- Scripts execute
- Event handlers work
- JavaScript URLs execute

---

## Testing Checklist

- [ ] Test basic script tag
- [ ] Test event handlers
- [ ] Test JavaScript URLs
- [ ] Test data URIs
- [ ] Test SVG/iframe/object tags
- [ ] Test encoded attacks
- [ ] Test case evasion
- [ ] Verify safe HTML still works
- [ ] Check browser console for errors
- [ ] View page source to verify sanitization

---

## Additional Notes

1. **Title Field:** The title field should use plain text escaping (not HTML sanitization), so any HTML should be displayed as text.

2. **Image Field:** If there's a separate image upload field, test file upload security separately (try uploading a file with a script extension, etc.).

3. **Slug Field:** Test SQL injection attempts here (though Eloquent should protect against this):
   - `' OR '1'='1`
   - `'; DROP TABLE news; --`

4. **Rate Limiting:** Try submitting the form multiple times rapidly to test rate limiting.

---

## If Protection Fails

If any of these attacks succeed:
1. **DO NOT** use the site in production
2. Review the `HtmlSanitizer` class
3. Check that `singlenews.blade.php` is using `HtmlSanitizer::sanitize()`
4. Verify the sanitizer is being called correctly
5. Test again after fixes

---

## Safe Testing Environment

- ✅ Use only in development/local environment
- ✅ Use a test database
- ✅ Don't test on production
- ✅ Clear test data after testing
- ✅ Document any vulnerabilities found

---

*Last updated: After implementing XSS protection fixes*

