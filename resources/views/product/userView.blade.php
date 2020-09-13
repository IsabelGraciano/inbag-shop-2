<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">  

@section('content')
    <div class="row" style="margin-top:20px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ $data["product"]->getName() }}</a></h5>
                            
                            <div class="d-flex align-items-center justify-content-between mt-1 mt-4">
                                
                                <div class="ml-5">
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.size')}} {{ $data["product"]->getSize() }}</h6> <br /> 
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.discount')}} {{ $data["product"]->getDiscount() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.description')}} {{ $data["product"]->getDescription() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.category')}} {{ $data["product"]->getCategory() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.color')}} {{ $data["product"]->getColor() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.price')}} {{ $data["product"]->getPrice() }}</h6> <br />
                                </div>
                                
                                <div>
                                    <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                        <div class="col-md-12">Quantity: 
                                        <input type="number" class="form-control" name="quantity" min="0" style="width: 80px;">
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success mt-3">Add to cart</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>


                                <div>
                                    <form action="{{ route('product.userWishListSave', ['id'=> $data['product']->getId()])}}" method="GET">
                                        @csrf
                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success mt-5">Add to wishlist</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div><img src="{{ asset('/productImages/' . $data["product"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>

</section>
@endsection
</section>
@endsection