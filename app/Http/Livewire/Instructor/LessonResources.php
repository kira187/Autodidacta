<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Lesson;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class LessonResources extends Component
{
    use WithFileUploads;

    Public $lesson, $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resource');
        
        $this->lesson->resource()->create([
            'url' => $url
        ]);

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download()
    {
        return response()->download(storage_path('app/public/'. $this->lesson->resource->url));
    }

    public function destroy()
    {
        Storage::delete($this->lesson->resource->url);
        $this->lesson->resource->delete();

        $this->lesson = Lesson::find($this->lesson->id);
    }
}
