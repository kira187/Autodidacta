<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Price;

class ListChats extends Component
{
    public $chats, $contacts;

    public function render()
    {
        return view('livewire.chat.list-chats', [
            'chats' => Price::all(),
        ]);
    }
}
