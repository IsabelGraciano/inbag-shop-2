<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3 bt-5">{{ $data["donation"]->getName() }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        <b>{{__('donation.view.name')}}</b> {{ $data["donation"]->getName() }}<br />
        <b>{{__('donation.view.size')}}</b> {{ $data["donation"]->getSize() }}<br />
        <b>{{__('donation.view.usetime')}}</b> {{ $data["donation"]->getUsetime() }}<br />
        <b>{{__('donation.view.description')}}</b> {{ $data["donation"]->getDescription() }}<br />
        <b>{{__('donation.view.delivery')}}</b> {{ $data["donation"]->getDeliverytype() }}<br />
        <b>{{__('donation.view.image')}}</b>

        <p>  <p> <img src="{{ asset('/donationImages/' . $data["donation"]->getImage()) }}">
    </div>
</section>
@endsection