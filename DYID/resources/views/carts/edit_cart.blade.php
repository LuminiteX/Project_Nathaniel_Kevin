@extends('layouts/app')

@section('content')
<div class="container">
    <div class="edit_cart">
        <div class="edit_cart-left">
            <img src="{{ url('storage/images/products/'. $cart_item->image_path)}}" alt=""></th>
        </div>
        <div class="edit_cart-right">
            <h1 class="edit_cart-right-title">{{$cart_item->name}}</h1>
            <hr>
            <h1 class="edit_cart-right-subtitle">Price:</h1>
            <p>IDR {{number_format($cart_item->price)}}</p>
            <hr>
            <h1 class="edit_cart-right-subtitle">Description:</h1>
            <p>{{$cart_item->description}}</p>
            <hr>
    
            <form action="/cart/edit/{{$cart_item->id}}" class="edit_cart-right-form" method='POST'>
                @csrf
    
                <label for="item_quantity">Qty:</label>
                <input type="number" name='quantity' id='quantity' value={{$cart_item->pivot->quantity}}>
                <input type="submit" value="Save">
    
                @error('quantity')
                        <div class="alert" style="color: red" role='alert'><strong>{{$message}}</strong></div>
                @enderror
            </form>
        </div>
    </div>
</div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/edit_cart.css")}}">
@endsection