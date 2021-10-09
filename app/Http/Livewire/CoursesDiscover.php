<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use Database\Seeders\LevelSeeder;
use Illuminate\Support\Facades\Auth;

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

        //dd($categories);

        $courses = Course::whereStatus(3)
            ->category($this->category_id)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(5)->get();


        $courses_programming = Course::whereStatus(3)
            ->category(3)
            ->level($this->level_id)
            ->orderBy('students_count', 'desc')
            ->limit(5)->get();


        if(Auth::check()){
            $courses_view = Course::whereHas('students', function($query){
                $query->where('user_id', auth()->user()->id);
            })->get();

            return view('livewire.courses-discover', compact('courses', 'courses_programming', 'courses_view'));
        }

        return view('livewire.courses-discover', compact('courses', 'courses_programming'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }
}
