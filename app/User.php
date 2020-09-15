<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    //attributes id, name, lastname, email, password, rol, created_at, updated_at
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName', 'email', 'password', 'phone','country','state','city','neighborhood','adress','adressDetails'
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

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function donation(){
        return $this->hasMany(Donation::class);
    }

    public function review(){
        return $this->belongsToMany(Review::class);
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function getLastName(){
        return $this->attributes['lastName'];
    }
}
