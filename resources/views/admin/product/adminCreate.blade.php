<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", $data["title"])

@section('content')

<!-- Portfolio Section-->
<div class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $data["title"] }}</h2>
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
                <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Name your product item" value="{{ old('name') }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="control-group">
                                <label>Size</label>
                                <select name="size" class="form-control" id="size" type="text" value="{{ old('size') }}">
                                    <option value="none">none</option> 
                                    <option value="XS">XS</option> 
                                    <option value="S">S</option>
                                    <option value="M">M</option> 
                                    <option value="L">L</option>
                                    <option value="XL">XL</option> 
                                    <option value="XXL">XXL</option>
                                 </select>
                                <p class="help-block text-danger"></p>
                    </div>
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Use time </label>
                                <input class="form-control" id="usetime" type="text" name="usetime" placeholder="Use time (in months)" value="{{ old('usetime') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                                <label>Delivery Type</label>
                                
                                <select name="deliveryType" class="form-control" id="deliveryType" name="deliveryType" type="text" value="{{ old('deliveryType') }}">
                                    <option value="I will send it to you">I will send it to you</option> 
                                    <option value="Pick it at my home">Pick it at my home</option>
                                 </select>

                                <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description" value="{{ old('date') }}" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Photos</label>
                                <input class="form-control" id="image" name="file" type="file" placeholder="Photos" />
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