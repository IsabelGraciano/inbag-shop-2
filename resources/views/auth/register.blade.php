@extends('layouts.master')


@section('content')
<div class="row" style="margin-top:150px; margin-bottom:20px">
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h1>
                    <p class="card-color">{{ __('Register') }}</p>
                </h1>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="latName" class="col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus>
                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class=" col-form-label ">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-row">
                        <div class="col">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class=" col-form-label ">{{ __('Phone Number') }}</label>
                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <form class="form-inline">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('Country') }}</label>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                                    <option selected>Choose...</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="United States">United States</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="España">Spain</option>
                                    <option value="United kingdom">United Kingdom</option>
                                </select>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="col">
                            <label for="State" class="col-form-label text-md-right">{{ __('State') }}</label>
                            <input id="State" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="city" class="col-form-label text-md-right">{{ __('City') }}</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="neighborhood" class="col-form-label text-md-right">{{ __('Neighborhood') }}</label>
                            <input id="neighborhood" type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" required autocomplete="neighborhood" autofocus>
                            @error('neighborhood')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adress" class=" col-form-label ">{{ __('Adress') }}</label>
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="adress details" class=" col-form-label ">{{ __('Adress Details') }}</label>
                        <input id="adress details" type="text" class="form-control @error('adressDetails') is-invalid @enderror" name="adressDetails" value="{{ old('adressDetails') }}" required autocomplete="adressDetails" autofocus>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    </section>
    @endsection