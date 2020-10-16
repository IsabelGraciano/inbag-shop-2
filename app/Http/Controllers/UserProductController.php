<?php
/* Isabel Graciano Vasquez con Product y Cart*/
/* Santiago Moreno Rave con Wishlist */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use App\WishList;
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{   
    public function list()
    {
        $data = [];
        $data["products"] = Product::all();

        return view('product.userList')->with("data", $data);
    }

    /*
    public function wishlistShowOne($id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.userWishListShowAll');
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
        
        return view('product.wishlistShowOne')->with("data",$data);
    }
    */


    public function view($id)
    {
        $data = []; //to be sent to the view

        $userId=Auth::user()->id;
        $wishlist = WishList::all()->where('product_id',$id)->where('customer_id',$userId);
        
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.userList');
        }

        $data["wishlist"] = $wishlist;
        $data["product"] = $product;
        $data["title"] = $product->getName();
        
        return view('product.userView')->with("data",$data);
    }

    public function userWishListShowAll()
    { 
        $customer_id= Auth::user()->id;
        $data = [];
        $keys=[];
        $productsWishList = WishList::all()->where('customer_id',$customer_id);
        $products_aux = json_decode($productsWishList,true);
        $products =array_values($products_aux );
        for ($i = 0; $i <= sizeof($products)-1; $i++) {
            array_push($keys,$products[$i]['product_id']);
        }

        if($products){
            $data["title"] = "WishList";
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;
            return view('product.userWishListShowAll')->with("data",$data);
        }
        return redirect()->route('product.userList');
    }

    public function saveWishList($id)
    {
        $userId=Auth::user()->id;
        $verification = WishList::all()->where('product_id',$id)->where('customer_id',$userId);

        if($verification->isEmpty()){
            $wishList = new WishList();
            $wishList->setCustomerId($userId);
            $wishList->setProductId($id);
            $wishList->save();
            return redirect()->route('product.userView',$id);
        
        }else{
            return back();
        }
    }

    public function delete($id)
    {
        $customer_id= Auth::user()->id;
        WishList::where('product_id', $id)->where('customer_id',$customer_id)->delete();
        return redirect()->route('product.userWishListShowAll');
    }

    public function addToCart($id, Request $request)
    {
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
        $data = [];
        $products = $request->session()->get("products");
        $precioTotal = 0;
        $shippingCost=10000;

        if($products){
            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;

            for($i=0; $i<count($keys); $i++){
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
                $shippingCost= $shippingCost - 1000;
            }

            $discount = 0;
            if($precioTotal < 300000){
                $precioTotal = ($precioTotal - (($precioTotal * 15) / 100));
                $discount = 15;
            }
            else{
                $precioTotal = ($precioTotal - (($precioTotal * 25) / 100));
                $discount = 25;
            }

            $data["shipping-cost"] = $shippingCost;
            $data["total1"] = $shippingCost + $precioTotal; 
            $data["discount"] = $discount;
            return view('product.cart')->with("data",$data);
        }
        return back();
    }

    public function cartlist(){
        $customer_id= Auth::user()->id;
        $data = [];
        $items=[];
        $products = [];

        $list = Order::all()->where('customer_id',$customer_id);
        $list_aux = json_decode($list,true);

        $cart =array_values($list_aux);
        for ($i = 0; $i <= sizeof($cart)-1; $i++) {
            $item = Item::all()->where('order_id',$cart[$i]['id']);
            $item_aux = json_decode($item,true);

            for($j = 0; $j <= sizeof($item_aux)-1; $j++){
                $products = Product::all()->where('order_id',$cart[$i]['id']);
                $products_aux = json_decode($products,true);
            }

            $var = array_merge($cart[$i], $item_aux);
            array_push($items, $var);
        }

        dd($item);

        //$product = Product::all()->where('id',$item[$i]['product_id']);
        //$product_aux = json_decode($product,true);

        //dd($items);

        //$orders = array_merge($cart, $item);
        //$data["orders"] = $orders;
    }

    public function buy(Request $request)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->setShippingCost("0");
        $customer_id = Auth::user()->id;
        $order->setCustomerId($customer_id);

        $order->save();

        $precioTotal = 0;
        $shippingCost=0;

        $products = $request->session()->get("products");

        if($products){
            $keys = array_keys($products);
            
            for($i=0; $i<count($keys); $i++){
                $item = new Item();
                $item->setProductId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($products[$keys[$i]]);
                $item->save();
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
                $shippingCost= $shippingCost + 1000;
            }

            if($precioTotal < 300000){
                $precioTotal = ($precioTotal - (($precioTotal * 15) / 100));
            }
            else{
                $precioTotal = ($precioTotal - (($precioTotal * 25) / 100));
            }

            $order->setTotal($precioTotal);
            $order->setShippingCost($shippingCost);
            $order->save();

            $request->session()->forget('products');
        }
        return redirect()->route('product.userList');
    }

    public function bestSellers()
    {
        $data = [];
        $productsModels = [];
        $item = Item::groupBy('product_id')->selectRaw('sum(quantity) as sum, product_id')->orderBy('sum', 'desc')->pluck('sum', 'product_id')->take(5);

        $key = $item->keys();
        
        for ($i = 0; $i < 5; $i++) {
            array_push($productsModels,Product::findOrFail($key[$i]));
        }    
        
        $data["products"] = $productsModels;
        return view('product.userBestSellers')->with("data", $data);
    }
}