<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Notifications\ApprovedCourse;
use App\Notifications\RejectCourse;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)
            ->with('category')
            ->get();

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se pude publicar un curso que no se encuentre completo.');
        }

        $course->status = 3;
        $course->save();

        $course->teacher->notify(New ApprovedCourse($course));

        return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó correctamente!');
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());

        $course->status = 1;
        $course->save();

        $course->teacher->notify(New RejectCourse($course));

        return redirect()->route('admin.courses.index')->with('info', 'El curso se ha rechazado correctamente');
    }
}
