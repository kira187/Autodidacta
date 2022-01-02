<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class Comments extends Component
{
    public $course, $newQuestion;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.courses.comments');
    }

    public function listComments()
    {
        $this->newQuestion = false;
    }
}
