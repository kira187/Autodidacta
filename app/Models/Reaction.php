<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    CONST LIKE = 1;
    CONST DISLIKE = 2;

    //Relationship polymorphic 
    public function reactionable()
    {
        return $this->morphTo();
    }

    //Relationship 1:m inverse
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
