<?php
/*Isabel Graciano Vasquez*/
namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\User;

class Order extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['total'];
    
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getShippingCost()
    {
        return $this->attributes['shipping_cost'];
    }

    public function setShippingCost($shipping_cost)
    {
        $this->attributes['shipping_cost'] = $shipping_cost;
    }

    public function getCustomerId()
    {
        return $this->attributes['customer_id'];
    }

    public function setCustomerId($customer_id)
    {
        $this->attributes['customer_id'] = $customer_id;
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}