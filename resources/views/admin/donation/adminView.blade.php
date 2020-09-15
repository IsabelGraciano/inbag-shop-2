<!--Santiago Moreno Rave-->

@extends('layouts.master')
@section('title', $data["donation"]->getName())

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container space-column" >
    <ul class="list-group shadow">
            <!-- list group item-->
            <li class="list-group-item">
        <!-- Portfolio Section Heading-->
        <!-- Icon Divider-->

                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="ml-5 mr-5">
                    <b>{{__('donation.view.nameCustomer')}}</b> {{ $data["donation"]->customer->getName() }}<br />
                    <b>{{__('donation.view.name')}}</b> {{ $data["donation"]->getName() }}<br />
                    <b>{{__('donation.view.size')}}</b> {{ $data["donation"]->getSize() }}<br />
                    <b>{{__('donation.view.usetime')}}</b> {{ $data["donation"]->getUsetime() }}<br />
                    <b>{{__('donation.view.description')}}</b> {{ $data["donation"]->getDescription() }}<br />
                    <b>{{__('donation.view.delivery')}}</b> {{ $data["donation"]->getDeliverytype() }}<br />
                    <b>{{__('donation.view.image')}}</b>
                </div>
                
                <p> 
                    <img src="{{ asset('/donationImages/' . $data["donation"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">

            </li>
        </ul>

    </div>
</section>
@endsection