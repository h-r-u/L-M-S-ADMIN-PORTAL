<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::middleware('auth')->group(function () {
	Route::get('/course/', [CourseController::class, 'create'])->name('course-section');
	Route::get('/course/{string}', [CourseController::class, 'index'])->name('course');
	Route::post('/course/{string}/method/', [CourseController::class, 'store'])->name('course-method');
	Route::get('/course/{string}/show/', [CourseController::class, 'show'])->name('course-show');
	Route::get('/course/{string}/edit/', [CourseController::class, 'edit'])->name('course-edit');
	Route::patch('/course/{id}/update/', [CourseController::class, 'update'])->name('course-update');

});