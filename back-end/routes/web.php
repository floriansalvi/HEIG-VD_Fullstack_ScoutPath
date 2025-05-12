<?php

use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Illuminate\Support\Facades\Route;

// Define the default route for the application
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Include authentication routes from the auth.php file
require __DIR__.'/auth.php';

// Define a route for retrieving the CSRF cookie (required by Sanctum for SPA authentication)
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);
