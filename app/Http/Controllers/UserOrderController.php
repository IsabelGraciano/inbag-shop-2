<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class UserOrderController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $order = Order::findOrFail($id);
        $data["title"]= $order->getId();
        $data["order"] = $order;

        return view('order.show')->with("data",$data);
    }

    public function showAll()
    {
        $data=[];
        $order = order::all();
        $data["order"] = $order;
        $data["title"]= "All your orders";
        
        return view('order.showAll')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create order";
        $data["orders"] = Order::all();

        return view('order.create')->with("data",$data);

    }

    public function save(Request $request)
    {
        Order::create($request->only(["totalPay","date","discountOrder","shippingCost"]));

        return back()->with('success','Order created successfully!');
    }

    public function delete($id)
    {
        $data = []; //to be sent to the view
        $customer = Order::findOrFail($id);
        
        $customer->delete();
        return redirect()->route('order.showAll');
    }
}
