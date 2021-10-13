<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat;
use App\Models\User;

class ContentChat extends Component
{
    public $userChatId, $currentUser;
    protected $listeners = ['reciveMessage' => 'refresh'];

    public function mount($id)
    {
        $this->userChatId = $id;
        $this->currentUser = auth()->user()->id;
    } 

    public function refresh() {}
    
    public function render()
    {
        $chat = Chat::with([
            'user_sender:id,name,profile_photo_path',
            'user_receiver:id,name,profile_photo_path',
            'messages'
            ])
        ->where('receiver', $this->userChatId)
        ->where('sender', $this->currentUser)
        ->Orwhere( function($query) {
            return $query
                ->where('sender', $this->userChatId)
                ->where('receiver', $this->currentUser);
        })->first();

        if ($chat != null) {
            return view('livewire.chat.content-chat', compact('chat'))
                ->layout('layouts.chat');
        } else {
            return view('livewire.chat.content-chat', [
                'user' => User::find($this->userChatId)
            ])->layout('layouts.chat');
        }
    }
}
