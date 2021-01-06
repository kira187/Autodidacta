<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;

class CoursesCurriculum extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }
    
    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }
}
