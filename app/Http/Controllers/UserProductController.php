<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use App\WishList;
use App\Item;
use App\Order;
use App\Http\Controllers\Input;
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
        $verification = WishList::all()->where('product_id',$id);
        if($verification->isEmpty()){
        $wishList = new WishList();
        $wishList->setCustomerId($userId);
        $wishList->setProductId($id);
        $wishList->save();
        return redirect()->route('product.userView',$id);
        
        }else{

            return back();
        }
       
        
       // return view('product.userList')->with("data",$data);
    }

    //lista todos los wishlist
    public function viewWishList()
    { 
        $userId= 1;
        $data = []; //to be sent to the view
        $product = [];

        $data["title"] = "WishList";
        $productsWishList = WishList::all()->where('customer_id',$userId);
        $data["productsWishList"]= $productsWishList;
        

      for ($i = 0; $i <= sizeof($productsWishList)-1; $i++) {    
           array_push ( $product , Product::findOrFail($productsWishList[$i]->getProductId()));
        }
        $data["products"] = $product;
       return view('product.userWishListView')->with("data",$data);
    }

    public function wishListView($id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.userWishListView');
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
        
        return view('product.userWishListProductShow')->with("data",$data);
    }

    public function delete($id)
    {
        WishList::where('product_id', $id)->delete();;
        return redirect()->route('product.userWishListView');
    }

    public function addToCart($id, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);
        return back();
    }

    public function removeCart(Request $request)
    {
        $request->session()->forget('products');
        return redirect()->route('product.userList');
    }

    public function cart(Request $request)
    {
        $products = $request->session()->get("products");
        if($products){
            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;
            return view('product.cart')->with("data",$data);
        }

        return redirect()->route('product.userList');
    }

    public function buy(Request $request)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->save();

        $precioTotal = 0;

        $products = $request->session()->get("products");
        if($products){
            $keys = array_keys($products);
            for($i=0;$i<count($keys);$i++){
                $item = new Item();
                $item->setProductId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($products[$keys[$i]]);
                $item->save();
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
            }

            $order->setTotal($precioTotal);
            $order->save();

            $request->session()->forget('products');
        }

        return redirect()->route('product.userList');
    }
}