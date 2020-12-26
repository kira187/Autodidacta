<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourse;

Route::redirect('', 'instructor/courses');
Route::get('courses', InstructorCourse::class)->middleware('can:Leer cursos')->name('courses.index');
