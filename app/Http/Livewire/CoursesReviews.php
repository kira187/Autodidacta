<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Support\Collection;

use Livewire\Component;

class CoursesReviews extends Component
{
    public $course_id, $comment, $reviews;
    public $rating = 5, $pageNumber = 1;
    public $hasMorePages;

    protected $rules = [
        'comment' => 'required|min:10',
    ];

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount(Course $course)
    {
        $this->course_id = $course->id;
        $this->reviews = new Collection();
        $this->loadReviews();
    }

    public function render()
    {
        $course = Course::find($this->course_id);

        return view('livewire.courses-reviews', compact('course'));
    }


    public function store()
    {
        $this->validate();
        $course = Course::find($this->course_id);

        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Increment counter to list reviews
     *
     * @return response()
     */
    public function loadReviews()
    {
        $reviews = Review::where('course_id', $this->course_id)
            ->with(['user:id,name,profile_photo_path'])
            ->paginate(5, ['*'], 'page', $this->pageNumber);

        
        $this->pageNumber += 1;

        $this->hasMorePages = $reviews->hasMorePages();

        $this->reviews->push(...$reviews->items());
    }
}
