<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class ContentChat extends Component
{
    public $chatId;

    public function mount($id)
    {
        $this->chatId = $id;
    } 
    
    public function render()
    {
        return view('livewire.chat.content-chat');
    }
}
