@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:150px; margin-bottom:20px">
    <div class="container">

        <div class="row justify-content-center">
            <div class="card text-center">
                @foreach($data["products"] as $product)
                </br></br>
                <div class="card-header">
                    {{$product->getName()}}
                </div>
                <div class="card-body">

                    <h5 class="card-title">{{ $product->getName()}}</h5>
                    <img src="{{ asset('/productImages/' . $product->getImage()) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </br></br>
                    <p class="card-text">Decripcion: {{$product->getDescription()}}</br>
                        Precio: {{ $product->getPrice() }}</br>
                        Cantidad: {{ Session::get('products')[$product->getId()] }}
                    </p>
                    <br />
                    Total: precio_total
                    </br></br>
                    <form action="{{ route('product.buy') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Buy</button>
                        </from>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</div>


@endsection