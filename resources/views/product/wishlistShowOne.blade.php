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
        

        <div class="text-left">
            <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">{{ __('product.view.Quantity') }}
                    <input type="number" class="form-control" name="quantity" min="1" value="1" required style="width: 80px;">
                </div>
                                        
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-outline-success mt-3 " >{{ __('product.view.CartAdd') }}</button>
                </div>
                </div>
            </form>
        </div>

        <div class="text-left">
            <form action="{{ route('product.wishListDelete', ['id'=> $data['product']['id']]) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <div class="form-row">
                <div class="form-group col-md-12">
                <button type="submit" class="btn btn-outline-success mt-5">{{ __('product.view.deleteWishlist') }}</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection