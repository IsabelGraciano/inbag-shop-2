<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ __('product.list.title') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        
        <div class="row">
            @foreach($data["products"] as $product)

            
            <div class="col-md-6 col-lg-4 pb-5 mb-lg-0">
                <div class="portfolio-item mx-auto" data-toggle="modal">
                    <a href="{{ route('admin.product.adminView', ['id'=>$product->getId()]) }}">
                    <img class="img-fluid" src="{{ asset('/productImages/' . $product->getImage()) }}">
                    <p> {{ $product->getName() }} </p>
                </div>
            </div>
            
            @endforeach
        </div>

        

    </div>



    <div class="row" style="margin-top:20px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> 
            @foreach($data["products"] as $product)
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <div class="d-flex align-items-center justify-content-between mt-1">

                                @foreach($data["products"] as $product)
                                    <h5 class="mt-0 font-weight-bold mb-2"><a href="{{ route('product.userView',['id'=> $product->getId()]) }}">{{ $product->getName() }}</a></h5>
                                    <h6 class="font-weight-bold my-2">{{ $product->getPrice() }}</h6>
                                @endforeach
                                <br /><br />
                                Total: precio_total

                                <h5 class="mt-0 font-weight-bold mb-2"><a href="{{ route('product.userView',['id'=> $product->getId()]) }}">{{ $product->getName() }}</a></h5>
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