<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute()
    {                
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        }
        return 5;
    }

    public function scopeCategory($query, $category_id)
    {
        if($category_id) {
            return $query->whereCategoryId($category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if($level_id) {
            return $query->whereLevelId($level_id);
        }
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
    
    //Relationship 1:m
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Relationship 1:m inverse
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship m:n inverse
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    //Relationship 1:m inverse
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //Relationship 1:m inverse
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relationship 1:m inverse
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    //Relationship 1:m
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    //Relationship 1:m
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    //Relationship 1:m
    public function audience()
    {
        return $this->hasMany(Audience::class);
    }

    //Relationship 1:m
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    //Relationship 1:1 polymorphic 
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
