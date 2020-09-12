
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<section class="page-section order" id="order">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2  class="col text-center" >Orders</h2>
            
            <ul  class="col text-center">
        
             @foreach($data["order"] as $order)
             <div>
                @if($order->id<=2)
                <strong><h5>Order#:<a href="{{ route('order.show',['id'=>$order->id])}}">{{$order->id}}</a></strong></h5>
               @else
                <h5>Order #:<a href="{{ route('order.show',['id'=>$order->id])}}">{{$order->id}}</a></h5>
               @endif
             </div>
             @endforeach 
            </ul> 
        </div>
    </div>
</div>
</section>
@endsection
