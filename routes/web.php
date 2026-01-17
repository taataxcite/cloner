<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Payment routes
Route::get('/payment', [TestController::class, 'payment'])->name('payment.index');
Route::post('/payment/process', [TestController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/summary', [TestController::class, 'orderSummary'])->name('payment.summary');
