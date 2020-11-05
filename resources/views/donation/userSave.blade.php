<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
   

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation space-column-style2" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <b><h5 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{__('donation.save.title')}}</h3><br />
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>  
        
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="{{ route('donation.userCreate', app()->getLocale()) }}">
                <i class="fas fa-chevron-circle-left"></i>
                {{__('donation.save.text')}}
            </a>
        </div>
    </div>
</section>
@endsection