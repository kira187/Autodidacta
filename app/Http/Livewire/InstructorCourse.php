<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class InstructorCourse extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                        ->where('user_id', auth()->user()->id)
                        ->latest('id')
                        ->paginate(8);

        return view('livewire.instructor-course', compact('courses'));
    }

    public function resetPage(){
        $this->reset('page');
    }
}
