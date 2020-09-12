@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<section class="page-section order" id="order">
<div class="col text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">Add order description</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('order.save') }}">
                    @csrf
                   
                    <input type="number" placeholder="Enter totalPay" name="totalPay" value="{{ old('totalPay') }}" /> </br>
                    <input type="date"   placeholder="Enter date" name="date" value="{{ old('date') }}" /></br>
                    <input type="number" placeholder="Enter discountOrder" name="discountOrder" value="{{ old('discountOrder') }}" /></br>
                    <input type="number" placeholder="Enter shippingCost" name="shippingCost" value="{{ old('shippingCost') }}" /></br>
                    
                   
                   
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

