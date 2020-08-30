<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <b><h5 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ $data["title"] }}</h3><br />
        <b><h5 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ $data["info"] }}</h5><br />
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>        
    </div>
</section>
@endsection