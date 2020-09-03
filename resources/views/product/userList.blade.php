<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ $data["title"] }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        
        @foreach($data["products"] as $product)

            <b>product id: {{ $product->getId() }} </b>

            <div class="text-left mt-2 mb-3">
                <a class="btn btn-xl btn-outline-dark" href="">
                    <i class="far fa-hand-point-right"></i>
                    Go to this product
                </a>
            </div>
            
            
            <p> Image: <p> <img src="{{ asset('/productImages/' . $product->getImage()) }}">
            
            
            <!--ESTA ES LA RUTA A LA QUE VA PRODUCT SPECIFIC--> {{ route('product.list', $product->getId() ) }}
            

            <div class="divider-custom">
                <div class="divider-custom-line-long"></div>
            </div>
        @endforeach

        

    </div>
</section>
@endsection