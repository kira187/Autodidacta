<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Relationship 1:1
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //Relationship 1:m
    public function courses_dictated()
    {
        return $this->hasMany(Course::class);
    }

    //Relationship m:n
    public function courses_enrolled()
    {
        return $this->belongsTo(Course::class);
    }

    //Relationship 1:m
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Relationship 1:m
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Relationship 1:m
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    //Relationship m:n
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function items()
    {
        $this->hasMany(Item::class);
    }
}
