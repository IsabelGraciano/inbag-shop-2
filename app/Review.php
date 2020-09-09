<?php
/* Camila Barona */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;

class Review extends Model
{
    //attributes id, name, description, size, discount, category, color, price, image, created_at, updated_at
    protected $fillable = ['description', 'ranking','product_id'];

    public static function validate(Request $request){
        $request->validate([
            "description" => 'required',
            "ranking"=>'required',  
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }


    public function getRanking()
    {
        return $this->attributes['ranking'];
    }

    public function setRanking($ranking)
    {
        $this->attributes['ranking'] = $ranking;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($pId)
    {
        $this->attributes['product_id'] = $pId;
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
