@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<section class="page-section order" id="order">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2  class="col text-center" >Order description</h2>
            <div  class="col text-center">
          
                       <b>order id:</b> <li>{{ $data["order"]["id"]}}</li> <br>
                       <b>order total Pay:</b><li>{{ $data["order"]["totalPay"]}}</li><br>
                       <b>order date:</b><li>{{ $data["order"]["date"]}}</li><br>
                       <b>order discountOrder:</b> <li>{{ $data["order"]["discountOrder"]}}</li><br>
                       <b>order shippingCost:</b>    <li>{{ $data["order"]["shippingCost"]}}</li><br>
         
           
            </div>
        </div>
    </div>
</div>
<div class="col text-center">
                    <form method="post" action="{{ route('order.delete',$data['order']['id'])}}">
                        @csrf @method('DELETE')
                        <input class="btn btn-primary" type="submit" value="Delete">
                    </form></br></br>
                </div>
</section>
@endsection
