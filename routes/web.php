<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\Chat\ContentChat;
use App\Http\Livewire\Student\MyCoursesLearning;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::get('/descubre', HomeController::class)->name('disvover');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');
Route::get('cursos/{course}', [CourseController::class, 'info'])->name('courses.info');
Route::post('cursos/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('course.enrolled');
Route::get('cursos-status/{course}', CourseStatus::class)->name('course.status')->middleware('auth');
Route::get('mis-cursos', MyCoursesLearning::class)->name('student.courses')->middleware('auth');
Route::view('convertirme/instructor', 'instructor.make-instructor')->name('make-instructor');
Route::get('upgrade/to-instructor', [UserController::class, 'upgradeUserToInstructor'])->name('upgrade.to-instructor')->middleware('auth');
Route::view('contactanos', 'contact')->name('contact-us');
Route::view('chat', 'layouts.chat');
Route::get('chat/{id}', ContentChat::class)->name('chat');

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('importador/play-list-youtube/{video_id}', [HomeController::class, 'getPlayListDetail'])->name('youtube');
Route::post('importador', [HomeController::class, 'saveCourse'])->name('importador.store');
