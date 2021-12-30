<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Validate if the user marks the completion of the lesson
     * @return bool Completed
     */
    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }    

    //Relationship 1:m inverse
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    //Relationship 1:m inverse
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    //Relationship 1:1
    public function description()
    {
        return $this->hasOne(Description::class);
    }

    //Relationship m:n
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //Relationship 1:1 polymorphic 
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    //Relationship 1:m polymorphic 
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }

    //Relationship 1:m polymorphic 
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
