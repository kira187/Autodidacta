<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class MessageInput extends Component
{
    public $text;

    public function mount()
    {
        $this->text = '';
    }

    public function sendMessage()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.chat.message-input');
    }
}
