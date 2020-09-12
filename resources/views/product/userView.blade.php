<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="row" style="margin-top:20px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <div class="d-flex align-items-center justify-content-between mt-1" >
                                <div class="ml-4">
                                <b>{{__('product.view.name')}} {{ $data["product"]->getName() }}<br />
                                <b>{{__('product.view.size')}} {{ $data["product"]->getSize() }}<br />
                                <b>{{__('product.view.discount')}} {{ $data["product"]->getDiscount() }}<br />
                                <b>{{__('product.view.description')}} {{ $data["product"]->getDescription() }}<br />
                                <b>{{__('product.view.category')}} {{ $data["product"]->getCategory() }}<br />
                                <b>{{__('product.view.color')}} {{ $data["product"]->getColor() }}<br />
                                <b>{{__('product.view.price')}} {{ $data["product"]->getPrice() }}<br />
                                </div>

                                <div>
                                    <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                        <div class="col-md-12">Quantity: 
                                        <input type="number" class="form-control" name="quantity" min="0" style="width: 80px;">
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success">Add to cart</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ route('product.userWishListSave', ['id'=> $data['product']->getId()])}}" method="GET">
                                        @csrf
                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success">Add to wishlist</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                </ul>
                            </div>
                        </div><img src="{{ asset('/productImages/' . $data["product"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>
</section>
@endsection