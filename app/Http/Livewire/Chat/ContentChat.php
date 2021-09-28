<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat;
use App\Models\User;

class ContentChat extends Component
{
    public $userChatId, $currentUser;

    public function mount($id)
    {
        $this->userChatId = $id;
        $this->currentUser = auth()->user()->id;
    } 
    
    public function render()
    {
        if (Chat::where('receiver', $this->userChatId)->orWhere('sender', $this->userChatId)->exists()) {
            return view('livewire.chat.content-chat', [
                'chat' => Chat::with([
                    'user_sender:id,name,profile_photo_path',
                    'user_receiver:id,name,profile_photo_path',
                    'messages'
                ])
                ->where('sender', $this->userChatId)
                ->Orwhere('receiver', $this->userChatId)
                ->first()
            ])->layout('layouts.chat');
        } else {
            return view('livewire.chat.content-chat', [
                'user' => User::find($this->userChatId)
            ]);
        }
    }
}
