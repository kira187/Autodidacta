<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;

class SearchInput extends Component
{
    public $search;

    public function mount()
    {
        $this->search = '';
    }

    public function render()
    {
        $users = [];
        
        if (strlen($this->search) > 0) {
            if (User::where('name', 'like','%'.$this->search.'%')->exists()) {
                $users = User::where('name', 'like','%'.$this->search.'%')->get();
            }
        }
        return view('livewire.chat.search-input', compact('users'));
    }
}
