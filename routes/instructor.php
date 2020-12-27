<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'instructor/courses');
Route::resource('courses', CourseController::class);

