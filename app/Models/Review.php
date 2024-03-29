<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relationship 1:m inverse
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relationship 1:m inverse
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
