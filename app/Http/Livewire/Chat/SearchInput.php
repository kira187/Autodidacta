<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;

class SearchInput extends Component
{
    public function render()
    {
        return view('livewire.chat.search-input');
    }
}
