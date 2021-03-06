<?php

use Favik\Favik\Http\Controllers\AuthController;

Route::group(['middleware' => ['web']], function () {
  Route::get('/auth/login/redirect', [AuthController::class, 'redirect'])->name('login.redirect');
  Route::get('/auth/callback', [AuthController::class, 'callback']);
  Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/api/auth/login', [AuthController::class, 'apiLogin']);