<!-- Isabel Graciano Vasquez -->
@extends('layouts.master')
@section('content')
<div class="row" style="margin-top:150px; margin-bottom:20px">
<div class="col-lg-8 mx-auto">
<div class="container">
<a href="{{ route('product.productsApi', app()->getLocale()) }}">
<img class="img-fluid mb-5 "  src="{{ asset('img/static-img/Logo-Agricolae.png') }} " />
</a>
</div>
        <!-- List group-->
        <ul class="list-group shadow">
            @foreach($data["products"] as $product)
            <!-- list group item-->
            <li class="list-group-item">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                        <h5 class="mt-0 font-weight-bold mb-2">{{ $product['name']}}</h5>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">${{ $product['price'] }}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                        <a method="POST" href="{{ $product['product_link'] }}​​" > {{ __('product.api.interest') }}</a><br />
                        </div>
                    </div>
                    <img src="{{ $product['image'] }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    
                </div> <!-- End -->
            </li> <!-- End -->
            @endforeach
        </ul> <!-- End -->
    </div>
</div>
</div>

</section>
@endsection