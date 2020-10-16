<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])


@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">

    @section('content')
    <div class="row" style="margin-top:150px; margin-bottom:20px">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h1 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ $data["product"]->getName() }}</a></h1>

                            <div class="d-flex align-items-center justify-content-between mt-1 mt-4">

                                <div class="ml-5">
                                    <b>
                                        <h6 class="font-weight-bold my-2">{{__('product.view.size')}} {{ $data["product"]->getSize() }}</h6> <br />
                                        <b>
                                            <b>
                                                <h6 class="font-weight my-2 mr-5 mt-5">{{__('product.view.description')}} {{ $data["product"]->getDescription() }}</h6> <br />
                                                <b>
                                                    <h6 class="font-weight-bold my-2">{{__('product.view.category')}} {{ $data["product"]->getCategory() }}</h6> <br />
                                                    <b>
                                                        <h6 class="font-weight-bold my-2">{{__('product.view.color')}} {{ $data["product"]->getColor() }}</h6> <br />
                                                        <b>
                                                            <h6 class="font-weight-bold my-2">{{__('product.view.price')}} ${{ $data["product"]->getPrice() }}</h6> <br />
                                </div>

                                <div>
                                    <form action="{{ route('product.addToCart',['id'=> $data['product']->getId()]) }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">{{ __('product.view.Quantity') }}
                                                <input type="number" class="form-control" name="quantity" value="1" min="1" required style="width: 80px; ">
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
                                </div>

                                @if(!$data['wishlist']->isEmpty())
                                <div>
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
                                @else 
                                <div>
                                    <form action="{{ route('product.userWishListSave', ['id'=> $data['product']->getId()])}}" method="GET">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="button" class="btn btn-outline-success mt-5" data-toggle="modal" data-target="#myModal1">{{__('product.view.Wishlist')}}</button>


                                                <div class="modal" tabindex="-1" role="dialog" id="myModal1">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="text-color">{{__('product.view.notice')}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <h2 class="mr-5 ml-5 mt-5 text-center">{{ __('wishlist.WishlistBtn') }}</h2>

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
                                @endif


                            </div>


                        </div><img src="{{ asset('/img/' . $data["product"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">

                    </div> <!-- End -->
                    <div class="row justify-content-center">

                        <div class="card review">
                            <div class="card-header">
                                {{ __('product.view.Review') }}
                            </div>

                            @foreach($data["product"]->reviews as $comment)

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <b> {{ $comment->customer->getName() }} {{ $comment->customer->getLastName() }} </b> </br>
                                    <b> {{ $comment->getDescription() }} </b></br>
                                    {{ $comment->getRanking() }} <i class="fa fa-star" aria-hidden="true"></i><br />

                                    @if($comment->getCustomerId() == Auth::user()->id)
                                    <form method="POST" action="{{ route('product.userDeleteReview', ['id'=> $comment->getId()]) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="input" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                    @endif
                                </li>
                            </ul>

                            @endforeach

                        </div>
                    </div>
                    <form class="mt-5" method="POST" action="{{ route('product.userSaveReview', ['id'=>$data['product']->getId()]) }}">
                        @csrf


                        <div class="form-group">
                            <label for="inputPhone">{{ __('product.view.Review') }}</label>
                            <input type="text" class="form-control" id="inputPhone" placeholder="Enter your review" name="review"><br /><br />
                        </div>
                        <h3 class ="mt-3">{{ __('product.view.Star') }}</h3>
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>

                        <div class="col text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('product.view.sendComment') }}</button>
                        </div>
                    </form>
                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>

</section>
@endsection
</section>
@endsection