<!-- Isabel Graciano Vasquez -->

@extends('layouts.master')

@section('content')

<!-- Portfolio Section-->
<div class="page-section donation" id="donation">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5 mt-5">{{__('product.title')}}</h2>
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
                    
                    <form method="POST" action="{{ route('admin.product.adminSave') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('product.form.name')}}</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="{{__('product.form.name')}}" value="{{ old('name') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label>{{__('product.form.size')}}</label>
                            <select name="size" class="form-control" id="size" type="text" value="{{ old('size') }}">
                                <option value="none">{{__('product.form.NONE')}}</option> 
                                <option value="XS">{{__('product.form.XS')}}</option> 
                                <option value="S">{{__('product.form.S')}}</option>
                                <option value="M">{{__('product.form.M')}}</option> 
                                <option value="L">{{__('product.form.L')}}</option>
                                <option value="XL">{{__('product.form.XL')}}</option> 
                                <option value="XXL">{{__('product.form.XXL')}}</option>
                                </select>
                            <p class="help-block text-danger"></p>
                        </div>
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('product.form.color')}}</label>
                                <input class="form-control" id="color" type="text" name="color" placeholder="{{__('product.form.color')}}" value="{{ old('color') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('product.form.price')}}</label>
                                <input class="form-control" id="price" type="text" name="price" placeholder="{{__('product.form.price')}}" value="{{ old('price') }}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label>{{__('product.form.category')}}</label>
                            
                            <select name="category" class="form-control" id="category" name="category" type="text" value="{{ old('category') }}">
                                <option value="Man">{{__('product.form.man')}}</option> 
                                <option value="Woman">{{__('product.form.woman')}}</option>
                                <option value="Kids">{{__('product.form.kids')}}</option>
                                <option value="Shoes">{{__('product.form.shoes')}}</option>
                                <option value="Accessories">{{__('product.form.accessories')}}</option>
                            </select>

                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('product.form.description')}}</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="{{__('product.form.description')}}" value="{{ old('date') }}" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{__('product.form.photos')}}</label>
                                <input class="form-control" id="image" name="file" type="file" placeholder="{{__('product.form.photos')}}" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="form-group"><input class="btn btn-primary btn-xl" id="sendMessageButton" value="{{__('product.submit')}}" type="submit"></button></div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>