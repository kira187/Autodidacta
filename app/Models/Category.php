<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    //Relationship 1:m
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}