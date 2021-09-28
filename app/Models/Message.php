<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'message', 'user_id'];

    //Relationship 1:m
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relationship 1:m inverse
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
