<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section('content')


<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5 mt-5">{{ __('product.options.title') }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!--Buttons-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="{{ route('admin.product.adminCreate') }}">
                <i class="fas fa-plus-square"></i>
                {{ __('product.options.create') }}
            </a>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="{{ route('admin.product.adminList') }}">
                <i class="far fa-laugh-beam"></i>
                {{ __('product.options.list') }}
            </a>
        </div>
        
    </div>
</section>