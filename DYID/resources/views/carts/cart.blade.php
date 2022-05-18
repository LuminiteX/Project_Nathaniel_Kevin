@extends('layouts/app')

@section('content')
   <div class="mycart">
       <p class="mycart-title">My Cart</p>
        <div class="mycart-gallery">
            @forelse($user_cart->products as $product)
                <div class="mycart-gallery-item">
                    <div class="mycart-gallery-item-left">
                        <img src="{{ url('storage/images/products/'. $product->image_path)}}" alt="">
                    </div>
                    <div class="mycart-gallery-item-right">
                        <div class="mycart-gallery-item-right-product">
                            <p class="mycart-gallery-item-right-product-name">{{$product->name}}</p>
                            <p class="mycart-gallery-item-right-product-value">IDR {{number_format($product->price)}}</p>
                        </div>
                        <p  class="mycart-gallery-item-right-quantity">{{ $product->pivot->quantity }} pcs</p>
                        <p  class="mycart-gallery-item-right-subtotal">IDR {{number_format($product->pivot->quantity * $product->price)}}</p>

                        <div class="mycart-gallery-item-right-button">
                            <button class="mycart-gallery-item-right-button-edit"><a href="/cart/edit/{{ $product->id }}">Edit</a></button> 

                            <form action="/cart/delete/{{ $product->id }}" method="POST">
                                @csrf
                                @method("delete")

                                <button type = "submit" class="mycart-gallery-item-right-button-del">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h2>The cart is empty</h2>
            @endforelse
        </div>

        <strong>Total Price:</strong>
        <div class="mycart-price">
            <p class="mycart-price-val">IDR {{number_format($total_price)}}</p>

            <form action="/cart/checkout/{{ $user_cart->id }}" method="POST">
                @csrf
                <input type="hidden" id="total_price" name="total_price" value={{$total_price}}>
                <button type="submit">Checkout({{$user_cart->products->sum('pivot.quantity')}})</button>
            </form>
        </div>
   </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/cart.css")}}">
@endsection