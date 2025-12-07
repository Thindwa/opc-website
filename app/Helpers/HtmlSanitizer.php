<?php

namespace App\Helpers;

class HtmlSanitizer
{
    /**
     * Allowed HTML tags for rich text content
     */
    private const ALLOWED_TAGS = '<p><br><strong><b><em><i><u><ul><ol><li><h1><h2><h3><h4><h5><h6><a><img><blockquote><code><pre><table><thead><tbody><tr><th><td>';

    /**
     * Sanitize HTML content by allowing only safe tags
     * 
     * @param string|null $html
     * @return string
     */
    public static function sanitize(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        // Step 1: Remove all dangerous tags completely (case-insensitive, multiple passes for nested tags)
        $dangerousTags = ['script', 'iframe', 'object', 'embed', 'svg', 'form', 'input', 'button', 'textarea', 'select', 'style', 'link', 'meta', 'base'];
        
        // Remove dangerous tags with content (case-insensitive)
        foreach ($dangerousTags as $tag) {
            // Match opening tag (case-insensitive), any content, closing tag (case-insensitive)
            $pattern = '/<' . $tag . '[^>]*>.*?<\/' . $tag . '>/is';
            $html = preg_replace($pattern, '', $html);
            
            // Remove self-closing dangerous tags (case-insensitive)
            $pattern = '/<' . $tag . '[^>]*\/?>/is';
            $html = preg_replace($pattern, '', $html);
        }
        
        // Step 2: Remove any remaining script tags (case variations)
        $html = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $html);
        $html = preg_replace('/<script[^>]*\/?>/is', '', $html);
        
        // Step 3: Remove event handlers (onclick, onerror, etc.) - case-insensitive
        $html = preg_replace('/\s+on\w+\s*=\s*["\'][^"\']*["\']/i', '', $html);
        $html = preg_replace('/\s+on\w+\s*=\s*[^\s>]*/i', '', $html);
        
        // Step 4: Remove javascript: and data: URLs from all attributes
        $html = preg_replace('/\s+(href|src|action|formaction)\s*=\s*["\']javascript:[^"\']*["\']/i', '', $html);
        $html = preg_replace('/\s+(href|src|action|formaction)\s*=\s*["\']data:[^"\']*["\']/i', '', $html);
        
        // Step 5: Remove javascript: from style attributes
        $html = preg_replace_callback('/style\s*=\s*["\']([^"\']*)["\']/i', function ($matches) {
            $style = $matches[1];
            // Remove javascript: URLs and expressions
            $style = preg_replace('/javascript:[^;)]*/i', '', $style);
            $style = preg_replace('/expression\s*\([^)]*\)/i', '', $style);
            return 'style="' . htmlspecialchars($style, ENT_QUOTES, 'UTF-8') . '"';
        }, $html);
        
        // Step 6: Use strip_tags to only allow safe tags (this removes all non-allowed tags)
        $html = strip_tags($html, self::ALLOWED_TAGS);
        
        // Step 7: Clean up attributes on remaining tags
        $html = preg_replace_callback('/<([a-z][a-z0-9]*)\b[^>]*>/i', function ($matches) {
            $tag = strtolower($matches[1]);
            
            // Double-check: if this is a dangerous tag that somehow got through, remove it
            $dangerousTags = ['script', 'iframe', 'object', 'embed', 'svg', 'form', 'input', 'button', 'textarea', 'select', 'style', 'link', 'meta', 'base'];
            if (in_array($tag, $dangerousTags)) {
                return ''; // Remove the tag completely
            }
            
            $allowedAttributes = self::getAllowedAttributes($tag);
            
            // Extract all attributes
            preg_match_all('/(\w+)\s*=\s*["\']([^"\']*)["\']/', $matches[0], $attrMatches, PREG_SET_ORDER);
            
            $cleanAttributes = [];
            foreach ($attrMatches as $attr) {
                $attrName = strtolower($attr[1]);
                $attrValue = $attr[2];
                
                // Skip event handlers
                if (preg_match('/^on\w+/i', $attrName)) {
                    continue;
                }
                
                // Skip javascript: and data: URLs
                if (preg_match('/^(javascript|data):/i', $attrValue)) {
                    continue;
                }
                
                // Only allow whitelisted attributes
                if (in_array($attrName, $allowedAttributes)) {
                    if ($attrName === 'href' || $attrName === 'src') {
                        // Only allow http, https, or relative URLs
                        if (preg_match('/^(https?:\/\/|\/|#)/i', $attrValue)) {
                            $cleanAttributes[] = $attrName . '="' . htmlspecialchars($attrValue, ENT_QUOTES, 'UTF-8') . '"';
                        }
                    } elseif ($attrName === 'alt' || $attrName === 'title') {
                        $cleanAttributes[] = $attrName . '="' . htmlspecialchars($attrValue, ENT_QUOTES, 'UTF-8') . '"';
                    } elseif (in_array($attrName, ['class', 'id', 'style'])) {
                        // Sanitize style to remove javascript: URLs and expressions
                        if ($attrName === 'style') {
                            $attrValue = preg_replace('/javascript:[^;)]*/i', '', $attrValue);
                            $attrValue = preg_replace('/expression\s*\([^)]*\)/i', '', $attrValue);
                        }
                        $cleanAttributes[] = $attrName . '="' . htmlspecialchars($attrValue, ENT_QUOTES, 'UTF-8') . '"';
                    }
                }
            }
            
            return '<' . $tag . (!empty($cleanAttributes) ? ' ' . implode(' ', $cleanAttributes) : '') . '>';
        }, $html);
        
        // Final safety check: remove any remaining dangerous tags (case-insensitive)
        $dangerousTags = ['script', 'iframe', 'object', 'embed', 'svg', 'form', 'input', 'button', 'textarea', 'select', 'style', 'link', 'meta', 'base'];
        foreach ($dangerousTags as $tag) {
            $html = preg_replace('/<' . $tag . '[^>]*>.*?<\/' . $tag . '>/is', '', $html);
            $html = preg_replace('/<' . $tag . '[^>]*\/?>/is', '', $html);
        }
        
        return trim($html);
    }

    /**
     * Get allowed attributes for a specific tag
     */
    private static function getAllowedAttributes(string $tag): array
    {
        $tag = strtolower($tag);
        
        $attributes = [
            'a' => ['href', 'title', 'target', 'rel'],
            'img' => ['src', 'alt', 'title', 'width', 'height', 'class'],
            'table' => ['class', 'style'],
            'th' => ['class', 'style', 'colspan', 'rowspan'],
            'td' => ['class', 'style', 'colspan', 'rowspan'],
            'tr' => ['class', 'style'],
            'thead' => ['class'],
            'tbody' => ['class'],
            'ul' => ['class', 'style'],
            'ol' => ['class', 'style'],
            'li' => ['class', 'style'],
            'p' => ['class', 'style'],
            'div' => ['class', 'style'],
            'span' => ['class', 'style'],
            'h1' => ['class', 'style'],
            'h2' => ['class', 'style'],
            'h3' => ['class', 'style'],
            'h4' => ['class', 'style'],
            'h5' => ['class', 'style'],
            'h6' => ['class', 'style'],
            'blockquote' => ['class', 'style'],
            'code' => ['class', 'style'],
            'pre' => ['class', 'style'],
            'strong' => ['class'],
            'b' => ['class'],
            'em' => ['class'],
            'i' => ['class'],
            'u' => ['class'],
            'br' => [],
        ];
        
        return $attributes[$tag] ?? ['class'];
    }

    /**
     * Escape HTML for plain text content
     * This is a wrapper around Laravel's e() helper
     */
    public static function escape(?string $text): string
    {
        return e($text ?? '');
    }
}

