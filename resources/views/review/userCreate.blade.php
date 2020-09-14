<!-- Camila Barona -->

@extends('layouts.master')
@section("title", $data["title"])

@section('content')

<!-- Portfolio Section-->
<div class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> {{ __('review.give') }} </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>


        <!--Form for the donations-->
        <div class="container">

            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form method="POST" action="{{ route('review.userSave') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <!-- Add icon library -->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <label> {{ __('review.raiting') }} </label>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>



                        <div class="form-group">
                            <label for="description">{{ __('review.insert') }}</label>
                             <!--<input type=text-area value="{{ old('description') }}"><textarea class="form-control" id="description" rows="5"></textarea>-->
                            <input type="text" name="description" cols="40" rows="5" value="{{ old('description') }}">
            
                        </div>

                        <div class="form-group">
                            <label for="ranking">{{ __('review.ranking') }}</label>
                            <input type="number" min="1" max="5" name="ranking" cols="40" rows="5" value="{{ old('ranking') }}">
                        </div>


                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">{{ __('review.send') }}</button>
                        </div>
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</section>