<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    //Relationship 1:1
    Public function user()
    {
        return $this->belongsTo(User::class);
    }
}
