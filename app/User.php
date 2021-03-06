<?php

namespace App;
use Actuallymab\LaravelComment\CanComment;
use Actuallymab\LaravelComment\Commentable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use CanComment;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lname','email','username', 'birthdate', 'address','city','postal_code','country','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verified'
    ];
}
