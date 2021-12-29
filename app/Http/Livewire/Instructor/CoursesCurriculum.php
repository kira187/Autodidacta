<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $name, $confirmingSectionDeletion = false;
    
    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->section = new Section();
        $this->authorize('dictated', $course);
    }
    
    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor', ['course' => $this->course]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
        $this->emitTo('livewire-toast', 'show', ['type' => 'info', 'message' => 'Sección creada exitosamente']);
    }

    public function edit(Section $section)
    {
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();
        $this->course = Course::find($this->course->id);
        $this->emitTo('livewire-toast', 'show', ['type' => 'info', 'message' => 'Sección actualzada correctamente']);
    }

    public function confirmSectionDeletion(Section $section)
    {
        $this->confirmingSectionDeletion = $section->id;
    }

    public function deleteSection(Section $section)
    {
        $section->delete();
        $this->course = Course::find($this->course->id);
        $this->confirmingSectionDeletion = false;
        $this->emitTo('livewire-toast', 'show', ['type' => 'info', 'message' => 'Seccion eliminada correctamente']);
    }
}
