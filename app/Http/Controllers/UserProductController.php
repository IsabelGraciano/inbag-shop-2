<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use App\WishList;
use Illuminate\Database\Eloquent\ModelNotFoundException as EloquentModelNotFoundException;

class UserProductController extends Controller
{   
    public function list()
    {
        $data = []; 
        $data["title"] = "Available products";
        $data["products"] = Product::all();

        return view('product.userList')->with("data",$data);
    }

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

    public function saveWishList($id)
    {
        $userId= 1;

        $wishList = new WishList();
        $wishList->setCustomerId($userId);
        $wishList->setProductId($id);
        $wishList->save();
        return redirect()->route('product.userView',$id);
       // return view('product.userList')->with("data",$data);
    }

    public function viewWishList()
    { 
        $userId= 1;
        $data = []; //to be sent to the view
        $product = [];

        $data["title"] = "WishList";
        $productsWishList = WishList::all()->where('customer_id',$userId);
        $data["productsWishList"]= $productsWishList;
        
      //  echo(sizeof($productsWishList));
      
        for ($i = 0; $i <= sizeof($productsWishList)-1; $i++) {
            echo($i);
            array_push ( $product , Product::findOrFail($productsWishList[$i]->getProductId()));
        }
        $data["products"] = $product;
         
        //$data["products"] = Product::all();
       
        return view('product.userWishListView')->with("data",$data);
    }

    public function cart($id)
    {
        $idUser=1;
        try{
        $product= Product::findOrFail($id);

        } catch(EloquentModelNotFoundException $e){
            return redirect()->route('home.index');
          
        }
        $cart= session()->get("products");
        $cart[$id]=1;
        session()->put("products",$cart);
        $cart=session()->get("products");
        return back();

    }
}