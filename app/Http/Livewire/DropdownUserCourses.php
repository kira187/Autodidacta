<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownUserCourses extends Component
{
    public function render()
    {
        $courses = auth()->user()->courses_enrolled->take(3);

        return view('livewire.dropdown-user-courses', compact('courses'));
    }
}
