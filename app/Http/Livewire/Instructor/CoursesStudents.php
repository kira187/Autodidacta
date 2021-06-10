<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $course, $search;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('dictated', $course);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%' )->paginate(4);

        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor' , ['course' => $this->course]);
    }
}
