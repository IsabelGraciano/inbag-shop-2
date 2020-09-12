<?php
/*Santiago Moreno Rave*/
namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['totalPay','date','discountOrder','shippingCost'];
    
    
    public static function validate(Request $request){
    $request->validate([
        "totalPay" => "required|numeric|gt:0",
        "date" =>"required",
        "discountOrder" => "required|numeric|gt:0",
        "shippingCost" => "required|numeric|gt:0"
        
    ]);

    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotalPay()
    {
        return $this->attributes['totalPay'];
    }

    public function setTotalPay($totalPay)
    {
        $this->attributes['totalPay'] = $totalPay;
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function setDate($date)
    {
        $this->attributes['date'] = $date;
    }

    public function getDiscountOrder()
    {
        return $this->attributes['discountOrder'];
    }

    public function setDiscountOrder($discountOrder)
    {
        $this->attributes['discountOrder'] = $discountOrder;
    }
    public function getShippingCost()
    {
        return $this->attributes['shippingCost'];
    }

    public function setShippingCost($shippingCost)
    {
        $this->attributes['shippingCost'] = $shippingCost;
    }

}