<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::whereStatus(3)->latest('id')->limit(8)->get();

        return view('welcome', compact('courses'));
    }
}
