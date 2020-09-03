<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Products</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!--Buttons-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="{{ route('admin.product.create') }}">
                <i class="fas fa-hand-holding-heart"></i>
                Create a new product
            </a>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="">
                <i class="far fa-laugh-beam"></i>
                View your created products
            </a>
        </div>
        
    </div>
</section>