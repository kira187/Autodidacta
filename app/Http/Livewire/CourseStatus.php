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

        if (empty($this->currentLesson)) {
            $this->currentLesson = $course->lessons->last();
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    /**
     * Methods
     */
    public function changeLesson(Lesson $lesson)
    {
        $this->currentLesson = $lesson;
    }

    public function completed()
    {
        if($this->currentLesson->completed) {            
            $this->currentLesson->users()->detach(auth()->user()->id);
        } else {
            $this->currentLesson->users()->attach(auth()->user()->id);
        }

        $this->currentLesson = Lesson::find($this->currentLesson->id);
        $this->course = Course::find($this->course->id);
    }

    /**
     * Propertys
     */
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

    public function getProgressProperty()
    {
        $i = 0;

        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $progressPorcentage = ($i * 100)/($this->course->lessons->count());

        return round($progressPorcentage, 2);
    }
}
