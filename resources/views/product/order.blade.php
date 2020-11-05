<!-- Isabel Graciano Vasquez -->
@extends('layouts.master')
@section("title", __('product.userList.title'))

@section('content')
<div class="space-column">
    <div class="text-center mt-5 mb-5">
    <li class="list-group-item">
      
    <h1 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.order') }}: {{$data["order"][0]}}</a></h4>
    <h4 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.total') }} {{$data["order"][1]}}</a></h4>
    <h4 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.shipping_cost') }} {{$data["order"][2]}}</a></h4>
    <h4 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.date') }} {{$data["date"]}}</a></h6>
    </li>
    </div>

    <div class="col-lg-8 mx-auto">
        <!-- List group-->
        <ul class="list-group shadow">
            @foreach($data["products"] as $product)
            
            <!-- list group item-->
            <li class="list-group-item">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                        @if(!Auth::guest())
                        <h5 class="mt-0 font-weight-bold mb-2"><a href="{{ route('product.userView',['id'=> $product->getId(), app()->getLocale()]) }}">{{ $product->getName() }}</a></h5>
                        @else 
                        <h5 class="mt-0 font-weight-bold mb-2">{{ $product->getName() }}</h5>
                        @endif


                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">{{ $product->getPrice() }}</h6>

                            
                            <ul class="list-inline small">
                                <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                            </ul>
                        </div>
                            @foreach($data["quantity"] as $quantity)
                            @if($quantity[0]==$product->getId())
                            <h6 class="font-weight-bold my-2"><a> {{ __('product.orders.quantify') }} {{ $quantity[1]}}</a></h6>
                            @endif
                            @endforeach
                   </div><img src="{{ asset('/img/' . $product->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                </div> <!-- End -->
            </li> <!-- End -->
            @endforeach
        </ul> <!-- End -->
    </div>
</div>

</section>
@endsection