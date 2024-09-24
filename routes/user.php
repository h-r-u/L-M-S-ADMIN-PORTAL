<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
	Route::get('/user/{string}', [UserController::class, 'index'])->name('user');
	Route::get('/user/{id}/show', [UserController::class, 'show'])->name('show-user');
});