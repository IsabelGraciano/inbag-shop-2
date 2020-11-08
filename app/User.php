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
        'name','lastName', 'email', 'password', 'provider', 'provider_id', 'phone','country','state','city','neighborhood','adress','adressDetails'
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

    public function getId(){
        return $this->attributes['id'];
    }
    
    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getLastName(){
        return $this->attributes['lastName'];
    }

    public function setLastName($lastName)
    {
        $this->attributes['lastName'] = $lastName;
    }

    
    public function getCountry(){
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }

    public function getPhone(){
        return $this->attributes['phone'];
    }

    public function setPhone($phone)
    {
        $this->attributes['phone'] = $phone;
    }


    public function getEmail(){
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getCity(){
        return $this->attributes['city'];
    }

    public function setCity($city)
    {
        $this->attributes['city'] = $city;
    }
    
    public function getState(){
        return $this->attributes['state'];
    }

    public function setState($state)
    {
        $this->attributes['state'] = $state;
    }

    public function getNeighborhood(){
        return $this->attributes['neighborhood'];
    }

    public function setNeighborhood($neighborhood)
    {
        $this->attributes['neighborhood'] = $neighborhood;
    }

    public function getAdress(){
        return $this->attributes['adress'];
    }

    public function setAdress($adress)
    {
        $this->attributes['adress'] = $adress;
    }

    public function getAdressDetails(){
        return $this->attributes['adressDetails'];
    }

    public function setAdressDetails($adressDetails)
    {
        $this->attributes['adressDetails'] = $adressDetails;
    }

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

}