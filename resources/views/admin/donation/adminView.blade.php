<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        
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