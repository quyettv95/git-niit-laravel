<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {

        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    public function getStrType()
    {
        $permissionMapping = array_flip(config('permission'));
        return $permissionMapping[$this->type];
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_user', 'user_id', 'post_id');
    }

    public function isFav($post)
    {
        return $this->posts()->where('post_id', $post->id)->count() > 0;
    }

}
