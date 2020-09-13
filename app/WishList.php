<?php
/* Santiago Moreno Rave */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Exception;
use Illuminate\Http\Request;


class WishList extends Model
{
    //attributes id, customer_id, product_id, created_at, updated_at
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    public function getCustomerId()
    {
        return $this->attributes['customer_id'];
    }

    public function setCustomerId($cid)
    {
        $this->attributes['customer_id'] = $cid;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($pid)
    {
        $this->attributes['product_id'] = $pid;
    }




}