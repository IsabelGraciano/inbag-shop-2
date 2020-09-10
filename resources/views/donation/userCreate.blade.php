<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')
@section("title", __('donation.title'))
@section('content')

<!-- Portfolio Section-->
<div class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5 mt-5">{{__('donation.title')}}</h2>
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

                    <form method="POST" action="{{ route('donation.userSave') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>{{__('donation.form.name')}}</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="{{__('donation.form.name')}}" value="{{ old('name') }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <label>{{__('donation.form.size')}}</label>
                        <select name="size" class="form-control" id="size" type="text" value="{{ old('size') }}">
                            <option value="none">{{__('donation.form.NONE')}}</option> 
                            <option value="XS">{{__('donation.form.XS')}}</option> 
                            <option value="S">{{__('donation.form.S')}}</option>
                            <option value="M">{{__('donation.form.M')}}</option> 
                            <option value="L">{{__('donation.form.L')}}</option>
                            <option value="XL">{{__('donation.form.XL')}}</option> 
                            <option value="XXL">{{__('donation.form.XXL')}}</option>
                            </select>
                        <p class="help-block text-danger"></p>
                    </div>
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('donation.form.usetime')}}</label>
                                <input class="form-control" id="usetime" type="text" name="usetime" placeholder="{{__('donation.form.usetime')}}" value="{{ old('usetime') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                                <label>{{__('donation.form.delivery')}}</label>
                                
                                <select class="form-control" id="deliveryType" name="deliveryType" type="text" value="{{ old('deliveryType') }}">
                                    <option value="I will send it to you">{{__('donation.form.send')}}</option> 
                                    <option value="Pick it at my home">{{__('donation.form.pick')}}</option>
                                 </select>

                                <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('donation.form.description')}}</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="{{__('donation.form.description')}}" value="{{ old('date') }}" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('donation.form.photos')}}</label>
                                <input class="form-control" id="image" name="file" type="file" placeholder="{{__('donation.form.photos')}}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="form-group"><input class="btn btn-primary btn-xl" id="sendMessageButton" type="submit" value="{{__('donation.submit')}}"></button></div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>