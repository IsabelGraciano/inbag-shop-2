<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title></head>

<h2>{{ __('product.view.summary') }}</h2>
<b> {{ __('product.cart.shipping') }} {{ $data["shipping-cost"] }} <br />
<b> {{ __('product.cart.total') }} {{ $data["total1"] }} <br />
<b> {{ __('product.cart.with') }} {{ $data["discount"] }} {{ __('product.cart.discount') }}<br /></body></html>