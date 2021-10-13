<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Chat;
use App\Models\Course;

class ListChats extends Component
{
    public $chat, $currentUser;
    protected $listeners = ['messageSent' => 'refresh'];

    public function mount()
    {
        $this->chat = new Chat();
        $this->currentUser = auth()->user()->id;
    }

    public function refresh(){}

    public function render()
    {   
        $chats = $this->chat->with([
            'user_sender:id,name,profile_photo_path', 
            'user_receiver:id,name,profile_photo_path', 
            'messages' => function($query){
                $query->latest();
            }
        ])
        ->where('sender', $this->currentUser)
        ->orWhere('receiver', $this->currentUser)
        ->get();
        
        $courses = Course::whereHas('students', function($query){ 
            $query->where('user_id', $this->currentUser); 
        })->select(['id', 'user_id', 'title'])
        ->with(['teacher:id,name'])
        ->get();

        return view('livewire.chat.list-chats', compact('chats', 'courses'));
    }
}
