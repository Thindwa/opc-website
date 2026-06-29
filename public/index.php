<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Fix SCRIPT_NAME for shared hosting subdirectory deployments.
// On some Apache setups, SCRIPT_NAME is just "/index.php" even when the
// app lives in a subfolder (e.g. /opc-website/public/). This breaks
// Laravel's route matching because getPathInfo() then includes the
// subdirectory prefix.
if (
    isset($_SERVER['SCRIPT_NAME'], $_SERVER['SCRIPT_FILENAME'], $_SERVER['DOCUMENT_ROOT'])
    && ($_SERVER['SCRIPT_NAME'] === '/index.php' || $_SERVER['SCRIPT_NAME'] === '\\index.php')
) {
    $relativePath = str_replace(
        str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']),
        '',
        str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'])
    );
    if ($relativePath !== $_SERVER['SCRIPT_FILENAME']) {
        $_SERVER['SCRIPT_NAME'] = $relativePath;
    }
}

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
