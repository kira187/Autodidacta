<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = course::whereStatus(3)->latest('id')->limit(12)->get();

        return view('welcome', compact('courses'));
    }
}
