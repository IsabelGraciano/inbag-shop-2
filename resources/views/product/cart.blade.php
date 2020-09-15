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
                        <h5 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ $product->getName()}}</a></h5>
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
        {{ __('product.cart.shipping') }} {{ $data["shipping-cost"] }}
        {{ __('product.cart.order') }} {{ $data["total-cart"] }}
        {{ __('product.cart.total') }} {{ $data["total-order"] }}
        {{ __('product.cart.discount') }} {{ $data["discount"] }}

        <div class="col text-center">
            <form action="{{ route('product.buy') }}" method="POST"> </br>
                @csrf
                <button class="btn btn-outline-success mt-5" class="col text-center" type="submit">{{ __('product.cart.buy') }}</button>
            </form>
        </div>
        <div class="col text-center">
            <form action="{{ route('product.removeCart') }}" method="POST"> </br>
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-outline-success mt-5" class="col text-center" type="submit">{{ __('product.cart.delete') }}</button>
            </form>
        </div>


    </div>



</div>

</section>



@endsection