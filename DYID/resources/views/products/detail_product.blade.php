@extends('layouts/app')

@section('content')

<div class="container">
    <div class="product">
        <div class="product-left">
            <img src="{{ url('storage/images/products/'. $data->image_path)}}" alt=""></th>
        </div>
        <div class="product-right">
            <h1 class="product-right-title">{{$data->name}}</h1>
            <hr>
            <h1 class="product-right-subtitle">Category:</h1>
            <p>{{$data->category->name}}</p>
            <hr>
            <h1 class="product-right-subtitle">Price:</h1>
            <p>IDR {{number_format($data->price)}}</p>
            <hr>
            <h1 class="product-right-subtitle">Description:</h1>
            <p>{{$data->description}}</p>
            <hr>
    
            @guest
                <a href="/login" class="login">Login to buy</a>
            @elseif(isset(Auth::user()->id) && (Auth::user()->role == 0))
                <form action="/cart/add/{{ $data->id }}" class="product-right-form" method="POST">
                    @csrf

                    <label for="quantity">Qty:</label>
                    <input type="number" name="quantity">
                    <input type="submit" value="Add To Cart">

                    @error('quantity')
                        <div class="alert" style="color: red" role='alert'><strong>{{$message}}</strong></div>
                    @enderror
                </form>
            @endguest
        </div>
    </div>
</div>
    
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset("css/detail_product_page.css") }}">
@endsection