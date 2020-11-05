<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')

@section('content')
<!-- Portfolio Section-->
<section class="page-section donation" id="donation">
    <div class="container space-column">
        <ul class="list-group shadow">
            <!-- list group item-->
            <li class="list-group-item">
                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="ml-5 mr-5">
                    <b>{{__('donation.view.name')}}</b> {{ $data["donation"]->getName() }}<br />
                    <b>{{__('donation.view.size')}}</b> {{ $data["donation"]->getSize() }}<br />
                    <b>{{__('donation.view.usetime')}}</b> {{ $data["donation"]->getUsetime() }}<br />
                    <b>{{__('donation.view.description')}}</b> {{ $data["donation"]->getDescription() }}<br />
                    <b>{{__('donation.view.delivery')}}</b> {{ $data["donation"]->getDeliverytype() }}<br />
                    <b>{{__('donation.view.image')}}</b>
                </div>

                <p>
                    <p><img src="{{ asset('/img/' . $data["donation"]->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">

                        <form method="POST" action="{{ route('donation.userDelete', [  'id'=> $data['donation']['id']  ,  app()->getLocale()   ]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="text-center mt-4">

                                <button type="button" class="btn btn-outline-success mt-2" data-toggle="modal" data-target="#myModal1">{{__('donation.view.delete')}}</button>
                                <div class="modal" tabindex="-1" role="dialog" id="myModal1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="text-color">{{__('product.view.notice')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <h2 class="mr-5 ml-5 mt-5 text-center">{{__('donation.view.deleteBtn')}}</h2>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-success mt-5">{{__('product.view.confirm')}}</button>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            </li>
        </ul>

    </div>
</section>
@endsection