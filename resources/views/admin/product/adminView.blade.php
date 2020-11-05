<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])
    

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">  

@section('content')
    <div class="row space-column" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2 ml-5"><a>{{ $data["product"]->getName() }}</a></h5>
                            
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                
                                <div class="ml-5">
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.size')}} {{ $data["product"]->getSize() }}</h6> <br /> 
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.description')}} {{ $data["product"]->getDescription() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.category')}} {{ $data["product"]->getCategory() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.color')}} {{ $data["product"]->getColor() }}</h6> <br />
                                <b> <h6 class="font-weight-bold my-2">{{__('product.view.price')}} {{ $data["product"]->getPrice() }}</h6> <br />
                                </div>
                               
                            </div>
                        </div><img src="{{ asset('/img/' . $data["product"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                    <div class="text-center">
                        <form action="{{ route('admin.product.adminDelete', ['id'=> $data['product']['id'], app()->getLocale()]) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-xl btn-outline-dark mt-0"><i class="far fa-trash-alt"></i> {{__('product.view.delete')}} </button>
                            </div>
                            </div>
                        </form>
                    </div>

                </li> <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>

</section>
@endsection
</section>
@endsection