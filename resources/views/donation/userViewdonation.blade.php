<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3 bt-5">{{ $data["title"] }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        <b>Donation name:</b> {{ $data["donation"]->getName() }}<br />
        <b>Donation size:</b> {{ $data["donation"]->getSize() }}<br />
        <b>Donation use time:</b> {{ $data["donation"]->getUsetime() }}<br />
        <b>Donation description:</b> {{ $data["donation"]->getDescription() }}<br />
        <b>Donation delivery type:</b> {{ $data["donation"]->getDeliverytype() }}<br />
        <b>Donation image:</b> {{ $data["donation"]->getImage() }}<br />

        <b>Donation image:</b> 
        <p> Image: <p> <img src="{{ asset('/donationImages/' . $data["donation"]->getImage()) }}">
        
        

        <form method="POST" action="{{ route('donation.userDelete', ['id'=> $data['donation']['id']]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-xl btn-outline-dark">
                <i class="far fa-trash-alt"></i>
                Delete donation
                </button>
            </div>
        </form>

    </div>
</section>
@endsection