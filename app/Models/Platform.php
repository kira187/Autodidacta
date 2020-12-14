<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relationship 1:m
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
