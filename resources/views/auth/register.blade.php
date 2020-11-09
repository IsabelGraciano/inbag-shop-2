@extends('layouts.master')


@section('content')
<div class="row" style="margin-top:150px; margin-bottom:20px">
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h1>
                    <h4 class="card-color">{{ __('auth.register.register') }}</h4>
                </h1>
            </div>

            <div class="card-body">

                @if(Auth::guest())
                <form method="POST" action="{{ route('register', app()->getLocale()) }}">
                    @else
                    <form method="POST" action="{{ route('auth.userUpdate', ['id'=>$data['user']['id'], app()->getLocale()]) }}">
                        @endif
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="name" class="col-form-label text-md-right font-weight-bold" >{{ __('auth.register.name') }}</label>
                                @if(Auth::guest())
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @else
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data['user']['name'] }}" required autocomplete="name" autofocus>
                                @endif

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="lastName" class="col-form-label text-md-right font-weight-bold">{{ __('auth.register.last') }}</label>
                                @if(Auth::guest())
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                                @else
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $data['user']['lastName'] }}" required autocomplete="lastName" autofocus>
                                @endif
                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-right font-weight-bold ">{{ __('auth.mail') }}</label>
                            @if(Auth::guest())
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @else
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['user']['email'] }}" required autocomplete="email" autofocus>
                            @endif

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-row">
                            <div class="col">
                                <label for="password" class="col-form-label text-md-right font-weight-bold">{{ __('auth.password') }}</label>
                                @if(Auth::guest())
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @else
                                <input id="password" type="password" readonly=»readonly» class="form-control @error('password') is-invalid @enderror" value="{{ $data['user']['phone']  }}" name="password" required autocomplete="new-password" />
                                @endif

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="password-confirm" class="col-form-label text-md-right font-weight-bold">{{ __('auth.confirm') }}</label>
                                @if(Auth::guest())
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @else
                                <input id="password-confirm" type="password" readonly=»readonly» class="form-control" name="password_confirmation" value="{{ $data['user']['phone']  }}" required autocomplete="new-password">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class=" col-form-label text-md-right font-weight-bold ">{{ __('auth.register.phone') }}</label>
                            @if(Auth::guest())
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @else
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $data['user']['phone']  }}" required autocomplete="phone" autofocus>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <form class="form-inline">
                                    <label class="my-1 mr-2 col-form-label text-md-right font-weight-bold" for="inlineFormCustomSelectPref">{{ __('auth.register.country') }}</label>
                                    @if(Auth::guest())
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                                        <option selected>Choose...</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="United States">United States</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="España">Spain</option>
                                        <option value="United kingdom">United Kingdom</option>
                                    </select>
                                    @else
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="country" required autocomplete="country" autofocus>
                                        <option selected>{{ $data['user']['country']}}</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="United States">United States</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="España">Spain</option>
                                        <option value="United kingdom">United Kingdom</option>
                                    </select>
                                    @endif

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col">
                                <label for="state" class="col-form-label font-weight-bold">{{ __('auth.register.state') }}</label>
                                @if(Auth::guest())
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>
                                @else
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $data['user']['state']  }}" required autocomplete="state" autofocus>
                                @endif
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="city" class="col-form-label text-md-right font-weight-bold">{{ __('auth.register.city') }}</label>
                                @if(Auth::guest())
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                @else
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $data['user']['city']  }}" required autocomplete="city" autofocus>
                                @endif
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="neighborhood" class="col-form-label text-md-right font-weight-bold">{{ __('auth.register.neighborhood') }}</label>
                                @if(Auth::guest())
                                <input id="neighborhood" type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ old('neighborhood') }}" required autocomplete="neighborhood" autofocus>
                                @else
                                <input id="neighborhood" type="text" class="form-control @error('neighborhood') is-invalid @enderror" name="neighborhood" value="{{ $data['user']['neighborhood']  }}" required autocomplete="neighborhood" autofocus>
                                @endif
                                @error('neighborhood')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adress" class=" col-form-label col-form-label text-md-right font-weight-bold ">{{ __('auth.register.adress') }}</label>
                            @if(Auth::guest())
                            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                            @else
                            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ $data['user']['adress']  }}" required autocomplete="adress" autofocus>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="adressDetails" class=" col-form-label col-form-label text-md-right font-weight-bold">{{ __('auth.register.adressD') }}</label>
                            @if(Auth::guest())
                            <input id="adressDetails" type="text" class="form-control @error('adressDetails') is-invalid @enderror" name="adressDetails" value="{{ old('adressDetails') }}" required autocomplete="adressDetails" autofocus>
                            @else
                            <input id="adressDetails" type="text" class="form-control @error('adressDetails') is-invalid @enderror" name="adressDetails" value="{{ $data['user']['adressDetails']  }}" required autocomplete="adressDetails" autofocus>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                @if(Auth::guest())
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-primary" href="{{ url('/auth/redirect/google') }}">{{ __('auth.register.registerGoogle') }}</a>
                                <hr>
                                @else
                                <button type="submit" class="btn btn-outline-success mt-5">
                                    {{ __('Update') }}
                                </button>
                            </div>
                            @endif

                        </div>
                    </form>
            </div>


        </div>
    </div>
    </section>
    @endsection