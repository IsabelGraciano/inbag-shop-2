@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.content1') }}
                        </div>
                    @endif

                    {{ __('auth.content2') }}
                    {{ __('auth.content3') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend', app()->getLocale()) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-success mt-5">{{ __('auth.verify.click') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
