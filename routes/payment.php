<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::middleware('auth')->group(function () {
	Route::get('payment/{string}', [PaymentController::class, 'index'])->name('payment');
	Route::get('payment/{id}/show', [PaymentController::class, 'show'])->name('payment-show');
});