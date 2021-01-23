<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('/', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', Rolecontroller::class)->names('roles');
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');
Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');
Route::resource('levels', LevelController::class)->except(['show'])->names('levels');
Route::resource('prices', PriceController::class)->except(['show'])->names('prices');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}',[CourseController::class, 'show'])->name('courses.show');
Route::post('course/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
Route::get('course/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
