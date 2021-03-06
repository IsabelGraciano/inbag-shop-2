<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section('content')


    <div class="row space-column-style2">
        <div class="col-lg-8 mx-auto">

                <!-- List group-->
                <ul class="list-group shadow">
                    <div style="color: white">{{ $cont = 0 }}</div>
                    
                    @foreach($data["donations"] as $donation)
                    @if($donation->getCustomerId() == Auth::user()->id)
                        <!-- list group item-->
                        <li class="list-group-item">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2"><a href="{{ route('donation.userViewdonation',    ['id'=>$donation->getId(), app()->getLocale()]) }}">{{ $donation->getName() }}</a></h5>
                                    
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                    
                                    </div>
                                </div><img src="{{ asset('/img/' . $donation->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            </div> <!-- End -->
                        </li> <!-- End -->
                        @else 
                            @if ($cont==0 && $loop->last)
                                <center>
                                    <h2>{{ __('donation.view.nodonation') }}</h2>
                                    <img class="img-my-img" src="{{ asset('img/static-img/empty-donation.jpeg') }}" alt="" />
                                </center>
                                <div style="color: white">{{ $cont = $cont + 1 }}</div>
                            @endif
                        @endif

                        @endforeach
                    </ul> <!-- End -->
            
            
        </div>
    </div>

</section>
@endsection