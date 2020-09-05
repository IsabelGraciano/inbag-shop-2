<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;

class UserProductController extends Controller
{   
    /* This method returns a view with all the product objects that are inserted into the database */
    public function list()
    {
        $data = []; 
        $data["title"] = "Available products";
        $data["products"] = Product::all();

        return view('product.userList')->with("data",$data);
    }


    /* This method shows the information of one product in specific */
    public function view($id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.userList');
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
        
        return view('product.userView')->with("data",$data);
    }
}