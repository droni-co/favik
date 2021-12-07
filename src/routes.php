<?php

use Favik\Http\Controllers\AuthController;

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/login/redirect', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('/auth/callback', [AuthController::class, 'callback']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('merchants', MerchantController::class)->except(['show']);
  Route::resource('roles', RoleController::class)->only(['index', 'create', 'store', 'destroy']);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/', [WebController::class, 'index'])->name('home');
  Route::get('/orders/{merchant_id}/list', [OrderController::class, 'list'])->name('orders.list');
  Route::get('/orders/{merchant_id}/charts', [OrderController::class, 'charts'])->name('orders.charts');
  Route::get('/analytics/{merchant_id}', [AnalyticsController::class, 'report'])->name('analytics.report');
  Route::get('/users/{merchant_id}', [UserController::class, 'report'])->name('users.report');
});
