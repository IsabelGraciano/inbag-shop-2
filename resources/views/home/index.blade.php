@extends('layouts.master')

@section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Masthead-->
        <header class="masthead bg-primary-content text-black  text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('img/logoinbag.png') }}" alt="" />
                <!-- Masthead Heading-->
                <!-- Icon Divider-->
                <div class="divider-custom divider-dark">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                
                <p class="masthead-subheading font-weight-light mb-0">{{ __('home.user.site') }}</p>
            </div>
        </header>
        
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 mt-5">{{ __('home.user.trend') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
        
            @foreach($data["products"] as $product)
            <!-- list group item-->
            
                <!-- Custom content-->

                
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-4 pb-5 mb-lg-0">
                <div class="portfolio-item mx-auto" data-toggle="modal">
             <a  href="{{ route('product.userView',['id'=> $product->getId(), app()->getLocale()]) }}">
            
                <img src="{{ asset('/img/' . $product->getImage()) }}" alt="Generic placeholder image" width="300" class="ml-lg-5 order-1 order-lg-2">
            </a>
            </div>
            </div>



           
            @endforeach
   
        </div>
    </div>
</section>
</section>
<section class="page-section text-white mb-0" id="about">
<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 mt-5">{{ __('product.api.allies') }}</h2>
<div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
<div class="container">
<a href="{{ route('product.productsApi',app()->getLocale()) }}">
<img class="img-fluid"  src="{{ asset('img/static-img/Logo-Agricolae.png') }} " />
</a>
</div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-black mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-black">{{ __('home.user.about') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-dark">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto"><p class="lead">{{ __('master.user.aboutP') }}</p></div>
            <div class="col-lg-4 mr-auto"><p class="lead">{{ __('master.user.aboutP2') }}</p></div>
            <div class="col-lg-4 mr-auto"><p class="lead">{{ __('master.user.aboutP3') }}</p></div>
        </div>
    </div>
</section>
@endsection