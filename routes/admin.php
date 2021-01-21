<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

Route::get('/', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
Route::resource('roles', Rolecontroller::class)->names('roles');
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('users');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}',[CourseController::class, 'show'])->name('courses.show');
Route::post('course/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');