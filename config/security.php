<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Security Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains security-related configuration options for the
    | application to protect against common cyber security attacks.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Password Security
    |--------------------------------------------------------------------------
    */
    'password' => [
        'min_length' => env('PASSWORD_MIN_LENGTH', 12),
        'require_uppercase' => env('PASSWORD_REQUIRE_UPPERCASE', true),
        'require_lowercase' => env('PASSWORD_REQUIRE_LOWERCASE', true),
        'require_numbers' => env('PASSWORD_REQUIRE_NUMBERS', true),
        'require_symbols' => env('PASSWORD_REQUIRE_SYMBOLS', true),
        'max_age_days' => env('PASSWORD_MAX_AGE_DAYS', 90),
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    */
    'rate_limiting' => [
        'login_attempts' => env('RATE_LIMIT_LOGIN_ATTEMPTS', 5),
        'login_decay_minutes' => env('RATE_LIMIT_LOGIN_DECAY_MINUTES', 15),
        'api_requests' => env('RATE_LIMIT_API_REQUESTS', 60),
        'api_decay_minutes' => env('RATE_LIMIT_API_DECAY_MINUTES', 1),
        'web_requests' => env('RATE_LIMIT_WEB_REQUESTS', 100),
        'web_decay_minutes' => env('RATE_LIMIT_WEB_DECAY_MINUTES', 1),
    ],

    /*
    |--------------------------------------------------------------------------
    | File Upload Security
    |--------------------------------------------------------------------------
    */
    'file_upload' => [
        'max_file_size' => env('MAX_FILE_SIZE', 10 * 1024 * 1024), // 10MB
        'allowed_extensions' => [
            'images' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'],
            'documents' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv'],
            'videos' => ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'],
        ],
        'scan_uploads' => env('SCAN_FILE_UPLOADS', true),
        'quarantine_suspicious' => env('QUARANTINE_SUSPICIOUS_FILES', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Session Security
    |--------------------------------------------------------------------------
    */
    'session' => [
        'regenerate_on_login' => env('SESSION_REGENERATE_ON_LOGIN', true),
        'invalidate_on_logout' => env('SESSION_INVALIDATE_ON_LOGOUT', true),
        'timeout_minutes' => env('SESSION_TIMEOUT_MINUTES', 30),
        'concurrent_sessions' => env('MAX_CONCURRENT_SESSIONS', 3),
    ],

    /*
    |--------------------------------------------------------------------------
    | Security Headers
    |--------------------------------------------------------------------------
    */
    'headers' => [
        'hsts_max_age' => env('HSTS_MAX_AGE', 31536000), // 1 year
        'hsts_include_subdomains' => env('HSTS_INCLUDE_SUBDOMAINS', true),
        'hsts_preload' => env('HSTS_PRELOAD', true),
        'csp_report_only' => env('CSP_REPORT_ONLY', false),
        'csp_report_uri' => env('CSP_REPORT_URI'),
    ],

    /*
    |--------------------------------------------------------------------------
    | IP Security
    |--------------------------------------------------------------------------
    */
    'ip_security' => [
        'blocked_ips' => explode(',', env('BLOCKED_IPS', '')),
        'allowed_ips' => explode(',', env('ALLOWED_IPS', '')),
        'geo_blocking' => env('ENABLE_GEO_BLOCKING', false),
        'blocked_countries' => explode(',', env('BLOCKED_COUNTRIES', '')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Security Monitoring
    |--------------------------------------------------------------------------
    */
    'monitoring' => [
        'log_failed_logins' => env('LOG_FAILED_LOGINS', true),
        'log_suspicious_activity' => env('LOG_SUSPICIOUS_ACTIVITY', true),
        'log_admin_actions' => env('LOG_ADMIN_ACTIONS', true),
        'alert_on_multiple_failures' => env('ALERT_ON_MULTIPLE_FAILURES', true),
        'max_failed_attempts' => env('MAX_FAILED_ATTEMPTS', 5),
    ],
];
