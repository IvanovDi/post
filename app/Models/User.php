<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts ()
    {
        return $this->hasMany(Post::class);
    }

    public function likes ()
    {
        return $this->hasMany(Like::class);
    }

    public function comments ()
    {
        return $this->hasMany(Comments::class);
    }
}
