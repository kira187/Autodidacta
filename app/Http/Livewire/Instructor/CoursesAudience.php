<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Audience;
use App\Models\Course;

class CoursesAudience extends Component
{
    public $course, $audience, $name;
    protected $rules = [
        'audience.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->audience = new Audience();
    }

    public function render()
    {
        return view('livewire.instructor.courses-audience');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $this->course->audience()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }

    public function update()
    {
        $this->validate();
        $this->audience->save();
        $this->audience = new Audience();

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();
        $this->course = Course::find($this->course->id);
    }
}
