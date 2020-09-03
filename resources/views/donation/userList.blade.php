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

        
        @foreach($data["donations"] as $donation)

            @if ($loop->index < 2)
                <b>Donation id: {{ $donation->getId() }} </b>
            @else 
                Donation id: {{ $donation->getId() }}
            @endif

            <div class="text-left mt-2 mb-3">
                <a class="btn btn-xl btn-outline-dark" href="{{ route('donation.userViewdonation', $donation->getId() ) }}">
                    <i class="far fa-hand-point-right"></i>
                    Go to this donation
                </a>
            </div>
            
            <p> Image: <p> <img src="{{ asset('/donationImages/' . $donation->getImage()) }}">
            

            <div class="divider-custom">
                <div class="divider-custom-line-long"></div>
            </div>
        @endforeach

        

    </div>
</section>
@endsection