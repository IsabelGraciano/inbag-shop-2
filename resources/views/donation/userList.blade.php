<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{__('donation.list.title')}}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        <div class="row">
            @foreach($data["donations"] as $donation)

            
            <div class="col-md-6 col-lg-4 pb-5 mb-lg-0">
                <div class="portfolio-item mx-auto" data-toggle="modal">
                    <a href="{{ route('donation.userViewdonation', $donation->getId() ) }}">
                    <img class="img-fluid" src="{{ asset('/donationImages/' . $donation->getImage()) }}">
                    <p> {{ $donation->getName() }} </p>
                </div>
            </div>
            
            @endforeach
        </div>

        

    </div>
</section>
@endsection