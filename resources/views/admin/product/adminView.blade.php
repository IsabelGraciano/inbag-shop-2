<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <b><h5 class="page-section-heading text-center text-uppercase text-secondary mt-10">{{ $data["title"] }}</h3><br />
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> 

        <b> Product name:</b> {{ $data["product"]->getName() }}<br />
        <b> Product size:</b> {{ $data["product"]->getSize() }}<br />
        <b> Product use time:</b> {{ $data["product"]->getDiscount() }}<br />
        <b> Product description:</b> {{ $data["product"]->getDescription() }}<br />
        <b> Product category:</b> {{ $data["product"]->getCategory() }}<br />
        <b> Product color:</b> {{ $data["product"]->getColor() }}<br />
        <b> Product price:</b> {{ $data["product"]->getPrice() }}<br />
        <b> Product image:</b> {{ $data["product"]->getImage() }}<br />

        <b> Product image:</b> 
        <p> Image: <p> <img src="{{ asset('/productImages/' . $data["product"]->getImage()) }}">
        
        

        <form method="POST" action="{{ route('admin.product.adminDelete', ['id'=> $data['product']['id']]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-xl btn-outline-dark">
                <i class="far fa-trash-alt"></i>
                Delete product
                </button>
            </div>
        </form>

    </div>
</section>
@endsection