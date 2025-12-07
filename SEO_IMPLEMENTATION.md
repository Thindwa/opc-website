# SEO Implementation Guide

## Overview

SEO (Search Engine Optimization) has been fully implemented across your website. All SEO settings are manageable from the admin panel and automatically applied to all pages.

## ✅ What's Implemented

### 1. **Dynamic Meta Tags**
- **Title tags** - Automatically generated from settings or page-specific content
- **Meta descriptions** - Pulled from settings or customized per page
- **Keywords** - Configurable keywords for SEO
- **Canonical URLs** - Automatically set for each page

### 2. **Open Graph Tags** (Facebook/Social Media)
- `og:title` - Page title for social sharing
- `og:description` - Page description
- `og:image` - Image for social media previews
- `og:url` - Canonical page URL
- `og:type` - Content type
- `og:site_name` - Site name

### 3. **Twitter Card Tags**
- `twitter:card` - Large image card format
- `twitter:title` - Page title
- `twitter:description` - Page description
- `twitter:image` - Image for Twitter previews
- `twitter:url` - Page URL

### 4. **Page-Specific SEO**
Individual pages can override default SEO settings:
- News articles - Auto-generates SEO from article title, description, and image
- Ministers/Deputy Ministers pages - Custom SEO
- Other content pages - Uses page titles

## 📝 Managing SEO Settings

### Access SEO Settings
1. Go to **Admin Panel** → **Settings** → **Seo** tab
2. Configure:
   - **Default SEO Title** - Used as fallback for all pages
   - **Default Meta Description** - Used as fallback (150-160 characters recommended)
   - **Default Keywords** - Comma-separated keywords
   - **Default Social Media Image** - Image for Open Graph/Twitter (1200x630px recommended)

### General Settings
1. Go to **Admin Panel** → **Settings** → **General** tab
2. Set **Brand Name** - Used in page titles

## 🎯 How It Works

### Default Behavior
- All pages automatically use SEO settings from the admin panel
- If no page-specific SEO is provided, defaults are used

### Page-Specific SEO
Controllers can pass custom SEO data:

```php
$seo = [
    'title' => 'Custom Page Title',
    'description' => 'Custom meta description',
    'keywords' => 'custom, keywords, here',
    'image' => asset('storage/custom-image.jpg'),
];

return view('frontend.page', compact('seo'));
```

### View Override
Views can also override the title using `@section('title')`:

```blade
@section('title', 'Custom Page Title')
```

## 📋 Pages with Custom SEO

The following pages have page-specific SEO implemented:

1. **Home Page** - Uses default SEO from settings
2. **News Listing** - "News & Updates - [Brand Name]"
3. **Single News Article** - Auto-generated from article:
   - Title: `[Article Title] - [Brand Name]`
   - Description: First 160 characters of article content
   - Image: Article featured image
4. **Cabinet Ministers** - "Cabinet Ministers - [Brand Name]"
5. **Deputy Ministers** - "Deputy Ministers - [Brand Name]"
6. **History Page** - Uses page title
7. **Charter Page** - Uses page title

## 🔧 Technical Details

### Files Created/Modified

1. **`app/Helpers/SeoHelper.php`** - Helper class for SEO operations
2. **`resources/views/layouts/frontend.blade.php`** - Updated with dynamic SEO meta tags
3. **`app/Http/Controllers/FrontendController.php`** - Added SEO data to controllers
4. **`app/Filament/Pages/Settings.php`** - Added SEO settings fields
5. **`database/seeders/SettingsSeeder.php`** - Seeded default SEO values

### SEO Meta Tags Structure

```html
<!-- Basic SEO -->
<title>Page Title</title>
<meta name="description" content="...">
<meta name="keywords" content="...">
<meta name="robots" content="index, follow">
<link rel="canonical" href="...">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="...">
<meta property="og:description" content="...">
<meta property="og:image" content="...">
<meta property="og:url" content="...">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="...">
<meta name="twitter:description" content="...">
<meta name="twitter:image" content="...">
```

## ✅ SEO Best Practices Implemented

- ✅ Unique page titles
- ✅ Meta descriptions (150-160 characters)
- ✅ Canonical URLs
- ✅ Open Graph tags for social sharing
- ✅ Twitter Card tags
- ✅ Robots meta tags (index, follow)
- ✅ Structured data ready (can be added later)
- ✅ Mobile-friendly (viewport meta tag)

## 🚀 Testing Your SEO

### 1. View Page Source
- Right-click on any page → View Page Source
- Look for `<title>` and `<meta>` tags
- Verify they contain your SEO settings

### 2. Social Media Preview
- Use tools like:
  - [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/)
  - [Twitter Card Validator](https://cards-dev.twitter.com/validator)
  - [LinkedIn Post Inspector](https://www.linkedin.com/post-inspector/)

### 3. SEO Testing Tools
- Google Search Console
- Google PageSpeed Insights
- SEO analyzers (Screaming Frog, etc.)

## 📊 Default SEO Values (Seeded)

All settings have been seeded with default values:

- **Brand Name:** "Office of the President and Cabinet"
- **SEO Title:** "Office of the President and Cabinet - Government of Malawi"
- **SEO Description:** "Official website of the Office of the President and Cabinet, Government of Malawi. Information about the Cabinet, Ministers, Departments, and Government services."
- **SEO Keywords:** "Malawi, Government, OPC, Office of the President and Cabinet, Cabinet Ministers, Deputy Ministers, Government Services, Government of Malawi"

## 🔄 Updating SEO Settings

1. Go to Admin Panel → Settings
2. Edit SEO settings
3. Save changes
4. Settings cache is automatically cleared
5. Changes apply immediately to all pages

## 📝 Notes

- SEO settings are cached for performance
- Cache is automatically cleared when settings are updated
- Page-specific SEO takes precedence over default settings
- All meta tags are properly escaped to prevent XSS
- Images for social sharing should be at least 1200x630px for best results

---

*SEO implementation completed and ready for use!*

