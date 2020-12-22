<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseStatus extends Component
{
    public $course, $currentLesson, $index, $previous, $next;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->currentLesson = $lesson;

                //get Index
                $this->index = $course->lessons->search($lesson);
                //get Prev
                $this->previous = $course->lessons[$this->index - 1];
                break;
            }            
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }    
}
