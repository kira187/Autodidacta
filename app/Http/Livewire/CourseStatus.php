<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class CourseStatus extends Component
{
    public $course, $currentLesson;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->currentLesson = $lesson;
                break;
            }            
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->currentLesson = $lesson;
    }

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->currentLesson->id);
    }

    public function getPreviousProperty()
    {
        if($this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }        
    }

    public function getNextProperty()
    {
        if ($this->index  == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }
}
