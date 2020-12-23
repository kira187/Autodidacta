<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourse;

Route::redirect('', 'instructor/courses');
Route::get('courses', InstructorCourse::class)->name('courses.index');