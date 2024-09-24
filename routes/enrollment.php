<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::middleware('auth')->group(function () {
	Route::get('/enrollment/{string}', [EnrollmentController::class, 'index'])->name('parent-enrollment');
	Route::get('/enrollment/{id}/show', [EnrollmentController::class, 'show'])->name('show-enrollment');
});

Route::middleware('auth')->group(function () {
	Route::patch('/enrollment/{id}/patch', [EnrollmentController::class, 'patch'])->name('patch-method');
	Route::delete('/enrollment/{id}/discard', [EnrollmentController::class, 'discard'])->name('discard-method');
});