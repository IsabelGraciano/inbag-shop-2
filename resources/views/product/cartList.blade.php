<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", __('product.userList.title'))


@section('content')
<div class="space-column">
    <div class="col-lg-8 mx-auto">
        <!-- List group-->
        @if (count($data)==0)
            <h2>pruebita</h2>
            <center class="mt-5">
                <a href="{{ route('product.cartlist', app()->getLocale()) }}"><button type="button" class="btn btn-outline-success">{{ __('product.orders.orders') }}</button></a>               
            </center>
        @else
            <ul class="mt-0 font-weight-bold mb-2 ml-5">
                @for($i=1; $i<= count($data["orders"]); $i++)
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-lg-row p-3" >
                    <h5 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.order') }}{{$data["orders"][$i-1]["id"]}}</a></h5>
                    <div class="d-flex align-items-center justify-content-between mt-1">
                                <ul class="list-inline small">
                                <h6 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.total') }} {{$data["orders"][$i-1]["total"]}}</a></h6>
                                <h6 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ __('product.orders.date') }} {{$data["dates"][$i-1]}}</a></h6>
                                </ul>
                            <b class="mt-0 font-weight-bold mb-2 ml-5">
                                <div><a method="POST" href="{{ route('product.orderView',['id'=> $data['orders'][$i-1]['id'], app()->getLocale()]) }}​​"> {{ __('product.orders.details') }} ​​​​​</a><br /></div>
                            </b>
                    </div> <!-- End -->
                </li> <!-- End -->
                @endfor
            </ul> <!-- End -->
        @endif      
    </div>
</div>

</section>
@endsection