@extends('layouts.master')

@section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('img/logoinbag.png') }}" alt="" />
                <!-- Masthead Heading-->
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-dark" href="{{ route('admin.product.adminOptions') }}">
                        <i class="far fa-laugh-beam"></i>
                        Go to the options of products 
                    </a>
                </div>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-dark" href="{{ route('admin.product.adminList') }}">
                        <i class="far fa-laugh-beam"></i>
                        Go to the donations 
                    </a>
                </div>

                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-dark" href="">
                        <i class="far fa-laugh-beam"></i>
                        Go to the orders
                    </a>
                </div>
            </div>
        </header>
        
    </div>
</section>
@endsection