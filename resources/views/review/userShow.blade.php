@extends('layouts.master')
@section("title", $data["title"])
@section('content')

<section class="page-section customer" id="customer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        @foreach($data["reviews"] as $review)
                        <li>{{ $review->getDescription() }}<br />
                            @endforeach

                        </li>

                    </div>
                </div>
                </br></br>

            </div>
        </div>
    </div>
    </div>
</section>

@endsection