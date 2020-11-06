<?php
/* Isabel Graciano Vasquez con Product, pdf y Cart*/
/* Santiago Moreno Rave con Wishlist */

namespace App\Http\Controllers;

use App\Interfaces\Pdf;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use App\WishList;
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;


class UserProductController extends Controller
{   
    public $precioTotal1 = NULL;
    public $shippingCost1 = NULL;
    public $discount1 = NULL;

    public function list($language)
    {
        $data = [];
        $data["products"] = Product::all();

        return view('product.userList')->with("data", $data);
    }

    public function view($language, $id)
    {
        $data = []; //to be sent to the view

        $userId=Auth::user()->id;
        $wishlist = WishList::all()->where('product_id',$id)->where('customer_id',$userId);

        
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.userList', ['language' => $language]);
        }

        $data["wishlist"] = $wishlist;
        $data["product"] = $product;
        $data["title"] = $product->getName();
        
        return view('product.userView')->with("data",$data);
    }

    public function userWishListShowAll($language)
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
        return redirect()->route('product.userList', ['language' => $language]);
    }

    public function saveWishList($language, $id)
    {
        $userId=Auth::user()->id;
        $verification = WishList::all()->where('product_id',$id)->where('customer_id',$userId);

        if($verification->isEmpty()){
            $wishList = new WishList();
            $wishList->setCustomerId($userId);
            $wishList->setProductId($id);
            $wishList->save();
            return redirect()->route('product.userView', ['language' => $language, $id]);

        }else{
            return back();
        }
    }

    public function delete($language, $id)
    {
        $customer_id= Auth::user()->id;
        WishList::where('product_id', $id)->where('customer_id',$customer_id)->delete();
        return back();
    }

    public function addToCart($language, $id, Request $request)
    {
        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);
        return back();
    }

    public function removeCart($language, Request $request)
    {
        $request->session()->forget('products');
        return redirect()->route('product.userList', ['language' => $language]);
    }

    public function cart(Request $request, $language)
    {
        //global $precioTotal1, $shippingCost1, $discount1;

        $data = [];
        $products = $request->session()->get("products");
        $this->precioTotal1 = 0;
        $this->shippingCost1=10000;

        if($products){
            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;

            for($i=0; $i<count($keys); $i++){
                $productActual = Product::find($keys[$i]);
                $this->precioTotal1 = $this->precioTotal1 + $productActual->getPrice()*$products[$keys[$i]];
                $this->shippingCost1= $this->shippingCost1 - 1000;
            }

            $this->discount1 = 0;
            if($this->precioTotal1 < 300000){
                $this->precioTotal1 = ($this->precioTotal1 - (($this->precioTotal1 * 15) / 100));
                $this->discount1 = 15;
            }
            else{
                $this->precioTotal1 = ($this->precioTotal1 - (($this->precioTotal1 * 25) / 100));
                $this->discount1 = 25;
            }

            $data["shipping-cost"] = $this->shippingCost1;
            $data["total1"] = $this->shippingCost1 + $this->precioTotal1; 
            $data["discount"] = $this->discount1;
            return view('product.cart')->with("data",$data);
        }
        return back();
    }

    public function cartList($language){
        $customer_id= Auth::user()->id;
        $data = [];
        $dates = [];

        $list = Order::all()->where('customer_id',$customer_id);
        $list_aux = json_decode($list,true);
        
        $cart =array_values($list_aux);
        $data["orders"] =  $cart;

        for($i=0; $i <sizeof($cart); $i++){
            
            $date= strval($cart[$i]["created_at"]);
            array_push($dates,substr($date,0,10));
        }
        $data["dates"] = $dates;
    return view('product.cartlist')->with("data", $data);
    }

    public function orderView($language, $id){
        $data = [];
        $products = [];
        $list = Order::findOrFail($id);
        $cart = array_values(json_decode($list,true));
        $item = Item::all()->where('order_id',$id);
        $item_aux = json_decode($item,true);
        $items = array_values($item_aux);
        $date= strval(substr($cart[4],0,10));
        $quantity= [];
      
        for ($i = 0; $i < sizeof($items); $i++) {
            array_push($products, Product::findOrFail($items[$i]["product_id"]));
        }

        for ($i = 0; $i < sizeof($items); $i++) {
            array_push($quantity, [($items[$i]["product_id"]),($items[$i]["quantity"])]);
        }
        $data["order"] =  $cart;
        $data["date"] = $date;
        $data["products"] = $products;
        $data["quantity"] = $quantity;
        return view('product.order')->with("data", $data);
    }

    public function buy(Request $request, $language)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->setShippingCost("0");
        $customer_id = Auth::user()->id;
        $order->setCustomerId($customer_id);

        $order->save();

        $precioTotal = 0;
        $shippingCost= 0;

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
        return redirect()->route('product.userList', ['language' => $language]);
    }

    public function bestSellers($language)
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

    public function something(){
        $this->shippingCost1 = 20;
        $this->discount1 = 30;
        $this->precioTotal1 = 23;
    }

    public function pdf($language, Request $request){
        $this->cart($request, $language);

        $data["shipping-cost"] = $this->shippingCost1;
        $data["total1"] = $this->shippingCost1 + $this->precioTotal1; 
        $data["discount"] = $this->discount1;
        
        $generatePdf = app(Pdf::class);
        return $generatePdf->generate($data);
    }
}