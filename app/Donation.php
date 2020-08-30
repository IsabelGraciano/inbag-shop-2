<?php
/* Isabel Graciano Vasquez */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //attributes id, size, usetime, description, deliveryType, PHOTOS, created_at, updated_at
    protected $fillable = ['size','usetime','description','deliverytype',];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }


    public function getUsetime()
    {
        return $this->attributes['usetime'];
    }

    public function setUsetime($usetime)
    {
        $this->attributes['usetime'] = $usetime;
    }


    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }


    public function getDeliverytype()
    {
        return $this->attributes['deliverytype'];
    }

    public function setDeliverytype($deliverytype)
    {
        $this->attributes['deliverytype'] = $deliverytype;
    }

}
