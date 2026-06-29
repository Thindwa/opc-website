<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

if (isset($_SERVER['REQUEST_URI'])) {
    $qs = '';
    $pos = strpos($_SERVER['REQUEST_URI'], '?');
    if ($pos !== false) {
        $qs = substr($_SERVER['REQUEST_URI'], $pos);
    }
    $_SERVER['REQUEST_URI'] = '/opc-lw-update' . $qs;
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

$app = require_once __DIR__.'/../bootstrap/app.php';
$app->handleRequest(Request::capture());
