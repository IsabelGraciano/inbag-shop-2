<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])

@section('content')

<!-- Portfolio Section-->
<div class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Give us your donation</h2>
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
                <form method="POST" action="{{ route('donation.save') }}">
                    @csrf
                    <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Size</label>
                                <input class="form-control" id="size" type="text" placeholder="Size" value="{{ old('size') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Use time </label>
                                <input class="form-control" id="usetime" type="text" placeholder="Use time" value="{{ old('usetime') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                                <label>Delivery Type</label>
                                
                                <select name="deliverytype" class="form-control" id="deliverytype" type="text" value="{{ old('deliverytype') }}">
                                    <option value="1">I'll send it to you</option> 
                                    <option value="2">Pick it at my home</option>
                                 </select>

                                <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Date</label>
                                <input class="form-control" id="date" type="date" placeholder="Date" value="{{ old('date') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Description</label>
                                <textarea class="form-control" id="description" rows="5" placeholder="Description" value="{{ old('date') }}" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Photos</label>
                                <input class="form-control" id="photos" type="file" placeholder="Photos" value="{{ old('photos') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="form-group"><input class="btn btn-primary btn-xl" id="sendMessageButton" type="submit"></button></div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>