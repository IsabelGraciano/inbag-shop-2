<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h3 class="page-section-heading text-center text-uppercase text-secondary mb-0 mt-10">{{ $data["title"] }}</h3>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 
        
        <b>{{__('product.view.name')}}</b> {{ $data["product"]->getName() }}<br />
        <b>{{__('product.view.size')}}</b> {{ $data["product"]->getSize() }}<br />
        <b>{{__('product.view.discount')}}</b> {{ $data["product"]->getDiscount() }}<br />
        <b>{{__('product.view.description')}}</b> {{ $data["product"]->getDescription() }}<br />
        <b>{{__('product.view.category')}}</b> {{ $data["product"]->getCategory() }}<br />
        <b>{{__('product.view.color')}}</b> {{ $data["product"]->getColor() }}<br />
        <b>{{__('product.view.price')}}</b> {{ $data["product"]->getPrice() }}<br />
        <b>{{__('product.view.image')}}</b>

        <p>  <p> <img src="{{ asset('/productImages/' . $data["product"]->getImage()) }}">


        <form method="POST" action="{{ route('product.wishlistDelete', ['id'=> $data['product']['id']]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-xl btn-outline-dark">
                <i class="far fa-trash-alt"></i>
                Delete product from my wishlist
                </button>
            </div>
        </form>
        

    </div>
</section>
@endsection