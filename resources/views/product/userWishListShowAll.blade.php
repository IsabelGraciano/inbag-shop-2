<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", __('wishlist.title'))
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">

    <div class="row space-column">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
            @foreach($data["products"] as $product)  
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2 ml-4"><a href="{{ route('product.wishlistShowOne', ['id'=>$product->getId()]) }}">{{ $product->getName()  }}</a></h5>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                
                            </div>
                        </div>
                        <img src="{{ asset('/img/' . $product->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
                @endforeach
            </ul> <!-- End -->
        </div>
    </div>
</section>
@endsection