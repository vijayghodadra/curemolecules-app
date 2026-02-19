<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Check if The Application is under maintenance
if (file_exists(__DIR__ . '/../storage/framework/maintenance.php')) {
    require __DIR__ . '/../storage/framework/maintenance.php';
}

// Register The Auto Loader
require __DIR__ . '/../vendor/autoload.php';

// Run The Application
(require __DIR__ . '/../bootstrap/app.php')
    ->handleRequest(Request::capture());
