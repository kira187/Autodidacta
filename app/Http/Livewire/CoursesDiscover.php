<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use Database\Seeders\LevelSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Livewire\WithPagination;
class CoursesDiscover extends Component
{
    use WithPagination;
    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::whereStatus(3)
            ->category($this->category_id)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        $courses_web_development = Course::whereStatus(3)
            ->category(1)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        $courses_design = Course::whereStatus(3)
            ->category(2)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        $courses_programming = Course::whereStatus(3)
            ->category(3)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        $courses_electronic = Course::whereStatus(3)
            ->category(4)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        $courses_math = Course::whereStatus(3)
            ->category(5)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(15)->get();

        

        // Check if the user is logged
        if(Auth::check()){

            $courses_view = Course::whereHas('students', function($query){
                $query->where('user_id', auth()->user()->id);
            })->get();

            return view('livewire.courses-discover', compact('courses', 'courses_programming', 'courses_view', 'courses_web_development', 'courses_design', 'courses_electronic', 'courses_math'));
        }

        return view('livewire.courses-discover', compact('courses', 'courses_programming', 'courses_web_development', 'courses_design', 'courses_electronic', 'courses_math'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }
}
