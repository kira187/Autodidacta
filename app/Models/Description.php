<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relationship 1:1 inverse
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
