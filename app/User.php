<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Checks if user is an admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return ($this->role == 'admin');
    }

    /**
     * Checks if user is an editor
     *
     * @return boolean
     */
    public function isEditor()
    {
        return ($this->role == 'editor');
    }

    /**
     * Options for user roles
     *
     * @var array
     */
    public static  $roles = ['admin', 'editor', 'participant'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
