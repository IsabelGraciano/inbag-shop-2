@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:150px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <!-- List group-->
        <ul class="list-group shadow">
            @foreach($data["products"] as $product)
            <!-- list group item-->
            <li class="list-group-item">
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                        <h5 class="mt-0 font-weight-bold mb-2 ml-5"><a href="{{ route('product.userView',['id'=> $product->getId(), app()->getLocale()]) }}">{{ $product->getName()}}</a></h5>
                        <div class="d-flex align-items-center justify-content-between mt-1 mt-4">

                            <div class="ml-5">
                                <b>
                                    <h6 class="font-weight-bold my-2"> {{ __('product.cart.quantity') }} {{ Session::get('products')[$product->getId()] }}</h6>
                                    <h6 class="card-text"> {{ __('product.cart.price') }} {{$product->getPrice()}}</h6></br>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul> <!-- End -->
        <div class="mt-5 ml-5 nextnext">
            <h2>{{ __('product.view.summary') }}</h2>
            <b> {{ __('product.cart.shipping') }} {{ $data["shipping-cost"] }} <br />
            <b> {{ __('product.cart.total') }} {{ $data["total1"] }} <br />
            <b> {{ __('product.cart.with') }} {{ $data["discount"] }} {{ __('product.cart.discount') }}<br />
            <div class="col text-center">
                <form action="{{ route('view.pdf', app()->getLocale()) }}" method="GET" target="_blank"> </br>
                    @csrf
                    <button type="submit" class="btn btn-outline-success mt-2">{{ __('product.cart.pdf') }}</button>
                </form>
            </div>
            <div class="col text-center">
                <form action="{{ route('product.buy', app()->getLocale()) }}" method="POST"> </br>
                    @csrf
    
                    <button type="button" class="btn btn-outline-success mt-2" data-toggle="modal" data-target="#myModal1">{{ __('product.cart.buy') }}</button>                
                    <div class="modal" tabindex="-1" role="dialog" id="myModal1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="text-color">{{ __('product.view.notice') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <h2> {{ __('product.cart.text') }} </h2>
                                <div class="modal-footer">
                                    <button class="btn btn-outline-success mt-5" class="col text-center" type="submit">{{ __('product.cart.confirm') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div>
        
        <div class="col text-center">
            <form action="{{ route('product.removeCart', app()->getLocale()) }}" method="POST"> </br>
                @csrf
                {{ method_field('DELETE') }}

                <button type="button" class="btn btn-outline-success mt-0" data-toggle="modal" data-target="#myModal2">{{ __('product.view.cartDelete') }}</button>
                <a href="{{ route('product.cartlist', app()->getLocale()) }}"><button type="button" class="btn btn-outline-success">{{ __('product.orders.orders') }}</button></a>               
                <div class="modal" tabindex="-1" role="dialog" id="myModal2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="text-color">{{__('product.view.notice')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <h2 class="mr-5 ml-5 mt-5 text-center">{{ __('product.view.cartDeleteBtn') }}</h2>

                            <div class="modal-footer">
                                <button class="btn btn-outline-success mt-5" class="col text-center" type="submit">{{ __('product.view.confirm') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</section>
@endsection