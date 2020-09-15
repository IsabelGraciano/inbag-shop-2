<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", __('product.userList.title'))


@section('content')
<div class="space-column">
    <div class="text-center mt-0 mb-5">
        <a class="btn btn-xl btn-outline-dark" href="{{ route('product.userBestSellers') }}">
            <i class="fas fa-star"></i>
            {{__('product.view.sellers')}}
        </a>
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
                        <h5 class="mt-0 font-weight-bold mb-2"><a href="{{ route('product.userView',['id'=> $product->getId()]) }}">{{ $product->getName() }}</a></h5>
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
                    </div><img src="{{ asset('/productImages/' . $product->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                </div> <!-- End -->
            </li> <!-- End -->
            @endforeach
        </ul> <!-- End -->
    </div>
</div>

</section>
@endsection