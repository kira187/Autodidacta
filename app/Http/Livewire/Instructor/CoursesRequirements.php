<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Requirement;

class CoursesRequirements extends Component
{
    public $course, $requirement, $name;
    public $confirmingRequirementDeletion = false;
    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $this->course->requirements()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
        $this->emitTo('livewire-toast', 'show', 'Requerimiento creado exitosamente');
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requirement();

        $this->course = Course::find($this->course->id);
        $this->emitTo('livewire-toast', 'show', 'Requerimiento actualizado');
    }

    public function confirmRequirementDeletion(Requirement $requirement)
    {
        $this->confirmingRequirementDeletion = $requirement->id;
    }

    public function deleteRequirement(Requirement $requirement)
    {
        $requirement->delete();
        $this->course = Course::find($this->course->id);
        $this->confirmingRequirementDeletion = false;
        $this->emitTo('livewire-toast', 'show', ['type' => 'info', 'message' => 'Requisito eliminado satisfactoriamente']);
    }
}
