<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Chat;

class ListChats extends Component
{
    public $chat, $currentUser;

    public function mount()
    {
        $this->chat = new Chat();
        $this->currentUser = auth()->user()->id;
    }
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
        
        $contacts = User::limit(3)->get();

        return view('livewire.chat.list-chats', compact('chats', 'contacts'));
    }
}
