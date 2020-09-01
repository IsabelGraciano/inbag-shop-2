<?php
/* Isabel Graciano Vasquez */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //attributes id, size, usetime, description, deliveryType, image, created_at, updated_at
    protected $fillable = ['name','size','usetime','description','deliveryType','image'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
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
        return $this->attributes['deliveryType'];
    }

    public function setDeliverytype($deliveryType)
    {
        $this->attributes['deliveryType'] = $deliveryType;
    }


    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

}
