<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['sender', 'receiver'];
    // ['sent_by', 'sent_to'];

    //Relationship 1:m inverse
    public function user_sender()
    {
        return $this->belongsTo(User::class, 'sender');
    }

    //Relationship 1:m inverse
    public function user_receiver()
    {
        return $this->belongsTo(User::class, 'receiver');
    }

    //Relationship 1:m
    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
