<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    
    protected $fillable = ['body', 'course_id'];

    //Relationship 1:1 inverse
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
