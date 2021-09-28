<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat;

class ContentChat extends Component
{
    public $chatId;

    public function mount($id)
    {
        $this->chatId = $id;
    } 
    
    public function render()
    {
        $chat = Chat::find($this->chatId);
        return view('livewire.chat.content-chat', compact('chat'))
            ->layout('layouts.chat');
    }
}
