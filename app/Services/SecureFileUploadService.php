<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SecureFileUploadService
{
    /**
     * Allowed MIME types for different file categories
     */
    private const ALLOWED_MIME_TYPES = [
        'image' => [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'image/webp',
            'image/svg+xml'
        ],
        'document' => [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'text/plain',
            'text/csv'
        ],
        'video' => [
            'video/mp4',
            'video/avi',
            'video/mov',
            'video/wmv',
            'video/flv',
            'video/webm'
        ]
    ];

    /**
     * Maximum file sizes (in bytes)
     */
    private const MAX_FILE_SIZES = [
        'image' => 5 * 1024 * 1024, // 5MB
        'document' => 10 * 1024 * 1024, // 10MB
        'video' => 50 * 1024 * 1024, // 50MB
    ];

    /**
     * Upload and validate a file securely
     */
    public function uploadFile(UploadedFile $file, string $category, string $directory = 'uploads'): array
    {
        // Validate file category
        if (!array_key_exists($category, self::ALLOWED_MIME_TYPES)) {
            throw new \InvalidArgumentException("Invalid file category: {$category}");
        }

        // Validate file size
        if ($file->getSize() > self::MAX_FILE_SIZES[$category]) {
            throw new \InvalidArgumentException("File size exceeds maximum allowed size for {$category}");
        }

        // Validate MIME type
        if (!in_array($file->getMimeType(), self::ALLOWED_MIME_TYPES[$category])) {
            throw new \InvalidArgumentException("File type not allowed for {$category}");
        }

        // Additional security checks
        $this->validateFileContent($file, $category);

        // Generate secure filename
        $filename = $this->generateSecureFilename($file);
        $path = $file->storeAs($directory, $filename, 'public');

        return [
            'filename' => $filename,
            'path' => $path,
            'url' => Storage::url($path),
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'original_name' => $file->getClientOriginalName()
        ];
    }

    /**
     * Validate file content for security
     */
    private function validateFileContent(UploadedFile $file, string $category): void
    {
        $content = file_get_contents($file->getPathname());

        // Check for malicious content patterns
        $maliciousPatterns = [
            '/<\?php/i',
            '/<script/i',
            '/javascript:/i',
            '/vbscript:/i',
            '/onload=/i',
            '/onerror=/i',
            '/eval\(/i',
            '/exec\(/i',
            '/system\(/i',
            '/shell_exec\(/i'
        ];

        foreach ($maliciousPatterns as $pattern) {
            if (preg_match($pattern, $content)) {
                throw new \InvalidArgumentException('File contains potentially malicious content');
            }
        }

        // Additional image-specific validation
        if ($category === 'image') {
            $this->validateImageFile($file, $content);
        }
    }

    /**
     * Validate image file specifically
     */
    private function validateImageFile(UploadedFile $file, string $content): void
    {
        // Check file signature
        $signatures = [
            'jpeg' => "\xFF\xD8\xFF",
            'png' => "\x89\x50\x4E\x47",
            'gif' => "GIF8",
            'webp' => "RIFF"
        ];

        $validSignature = false;
        foreach ($signatures as $type => $signature) {
            if (strpos($content, $signature) === 0) {
                $validSignature = true;
                break;
            }
        }

        if (!$validSignature) {
            throw new \InvalidArgumentException('Invalid image file signature');
        }

        // Additional checks for image dimensions
        $imageInfo = getimagesize($file->getPathname());
        if ($imageInfo === false) {
            throw new \InvalidArgumentException('Invalid image file');
        }

        // Check for reasonable dimensions (prevent memory exhaustion attacks)
        if ($imageInfo[0] > 4000 || $imageInfo[1] > 4000) {
            throw new \InvalidArgumentException('Image dimensions too large');
        }
    }

    /**
     * Generate secure filename
     */
    private function generateSecureFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $filename = Str::random(40) . '.' . $extension;

        return $filename;
    }

    /**
     * Delete file securely
     */
    public function deleteFile(string $path): bool
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }
}
