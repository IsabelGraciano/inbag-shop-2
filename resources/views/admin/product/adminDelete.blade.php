<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h5 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ $data["title"] }}</h3>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="{{ route('donation.view') }}">
                <i class="fas fa-chevron-circle-left"></i>
                Go back to my donations
            </a>
        </div>
    </div>
</section>
@endsection