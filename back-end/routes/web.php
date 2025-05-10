<?php

use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);
