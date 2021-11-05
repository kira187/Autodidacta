<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class HomeController extends Controller
{
    public function index ()
    {
        $courseTop = $this->getTopCourse();
        $usersInscriptions = DB::table('course_user')->count();
        $currentStudents = User::doesntHave('roles')->count();
        $coursesAproved = Course::where('status', 3)->count();
        $instructors = User::role('Instructor')->count();

        return view('admin.index', compact('courseTop', 'usersInscriptions', 'currentStudents', 'coursesAproved', 'instructors'));
    }

    public function getTopCourse()
    {
        $coursesWithStudents = DB::table('course_user')
            ->select(DB::raw('count(*) as course_count, course_id'))
             ->groupBy('course_id')
             ->get();

        $courseTop = ['course_id' => '', 'students' => 0];
        foreach ($coursesWithStudents as $course) {
            if ($course->course_count > $courseTop['students']) {
                $courseTop['course_id'] = $course->course_id;
                $courseTop['students'] = $course->course_count;
            }
        }

        $course = Course::find($courseTop['course_id']);
        return $course;
    }
}
