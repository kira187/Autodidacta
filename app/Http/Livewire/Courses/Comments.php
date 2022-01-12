<?php

namespace App\Http\Livewire\Courses;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class Comments extends Component
{
    public $course, $lesson, $title, $body;
    public $currentStep = 1, $status = 1;

    public function mount(Course $course, Lesson $lesson)
    {
        $this->course = $course;
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.courses.comments');
    }
  
    public function save()
    {
        $this->validate([
            'title' => 'required|min:5',
        ]);

        $comment = Comment::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => auth()->id(),
            'commentable_type' => 'App\Models\Lesson',
            'commentable_id' => $this->lesson->id
        ]);

        $this->reset([ 'title', 'body']);

        $this->lesson = Lesson::find($this->lesson->id);
  
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }
}
