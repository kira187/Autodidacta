<?php

namespace App\Http\Livewire\Chat;

use App\Events\SendMessage;
use Livewire\Component;
use App\Models\Chat;
use App\Models\Message;
use Carbon\Carbon;

class MessageInput extends Component
{
    public $text, $userChatId, $currentUser, $chat;

    public function mount($userChatId)
    {
        $this->text = '';
        $this->userChatId = $userChatId;
        $this->currentUser = auth()->user()->id;

        if (Chat::where('receiver', $this->userChatId)->orWhere('sender', $this->userChatId)->exists()) {
            $this->chat = Chat::select('id')
                ->where('sender', $this->userChatId)
                ->Orwhere('receiver', $this->userChatId)
                ->first();
        }
    }

    public function sendMessage()
    {
        $this->validate ([
            'text' => 'required'
        ]);

        if (!$this->chat) {
            $this->chat = Chat::create([
                'sender' => $this->currentUser,
                'receiver' => $this->userChatId
            ]);
        }

        Message::create([
            'chat_id' => $this->chat->id,
            'user_id' => $this->currentUser,
            'message' => $this->text,
            'send_date' => Carbon::now()
        ]);

        $this->emit('messageSent');
        event(new SendMessage($this->currentUser, $this->text));
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.chat.message-input');
    }
}
