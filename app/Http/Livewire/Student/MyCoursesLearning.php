<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use Livewire\Component;

class MyCoursesLearning extends Component
{
    public function render()
    {
        $courses = Course::whereHas('students', function($query){
            $query->where('user_id', auth()->user()->id);
         })->paginate(8);
        
        return view('livewire.student.my-courses-learning', compact('courses'));
    }
}
