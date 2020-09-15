<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])


@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container space-column">
        <ul class="list-group shadow">
            <!-- list group item-->
            <li class="list-group-item">
                <!-- Portfolio Section Heading-->

                <div class="ml-5 mt-5 mr-5">
                    <b>{{__('product.view.name')}}</b> {{ $data["product"]->getName() }}<br />
                    <b>{{__('product.view.size')}}</b> {{ $data["product"]->getSize() }}<br />
                    <b>{{__('product.view.description')}}</b> {{ $data["product"]->getDescription() }}<br />
                    <b>{{__('product.view.category')}}</b> {{ $data["product"]->getCategory() }}<br />
                    <b>{{__('product.view.color')}}</b> {{ $data["product"]->getColor() }}<br />
                    <b>{{__('product.view.price')}}</b> {{ $data["product"]->getPrice() }}<br />
                    <b>{{__('product.view.image')}}</b>
                </div>
                <p>
                    <p>
                        <img src="{{ asset('/productImages/' . $data["product"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">


                        <div class="col text-center">
                            <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">{{ __('product.view.Quantity') }}
                                        <input type="number" class="form-control" name="quantity" min="1" value="1" required style="width: 80px;">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="button" class="btn btn-outline-success mt-5" data-toggle="modal" data-target="#myModal">{{ __('product.view.CartAdd') }}</button>
                                        <div class="modal" tabindex="-1" role="dialog" id="myModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="text-color">{{__('product.view.notice')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <h2 class="mr-5 ml-5 mt-5 text-center">{{ __('product.view.CartAddBtn') }}</h2>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-outline-success mt-5">{{ __('product.view.confirm') }}</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('product.wishListDelete', ['id'=> $data['product']['id']]) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="form-row">
                                    <div class="form-group col-md-12">


                                        <button type="button" class="btn btn-outline-success mt-2" data-toggle="modal" data-target="#myModal2">{{ __('product.view.deleteWishlist') }}</button>
                                        <div class="modal" tabindex="-1" role="dialog" id="myModal2">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="text-color">{{__('product.view.notice')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <h2 class="mr-5 ml-5 mt-5 text-center">{{ __('product.view.CartAddBtn') }}</h2>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-outline-success mt-5">{{ __('product.view.confirm') }}</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>
            </li>

        </ul>
    </div>
</section>
@endsection