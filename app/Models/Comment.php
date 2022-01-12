<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relationship polymorphic 
    public function commentable()
    {  
        return $this->morphTo();
    }

    //Relationship 1:m polymorphic 
    public function comments()
    {
        return $this->morphMany(comments::class, 'commentable');
    }

    //Relationship 1:m polymorphic 
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }    

    //Relationship 1:m inverse
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
