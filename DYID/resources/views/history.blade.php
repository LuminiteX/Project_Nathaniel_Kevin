@extends('layouts/app')


@section('content')

<div class= "transaction-header">
    <h2>My History Transaction</h2>
</div>


@forelse ($user_history as $transaction_header)
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="panel-heading-accordion">{{$transaction_header->created_at}}</button>
                <div class="panel-heading-accordion-description">
                    @foreach ($transaction_header->products as $product)
                    <div class="table">
                        <div class="image">
                            <img src= "{{ url('storage/images/products/'. $product->image_path)}}" alt="" width="150" height="100">
                        </div>
                        <div class="desc">
                            {{$product->name}}  
                            <sup>
                                (IDR {{number_format($product->price)}})  
                            </sup>
                            <div class="peace">
                                x{{ $product->pivot->quantity}} pcs
                            </div>
                        </div>
                        <div class="price">
                            <span>
                                IDR {{number_format($product->pivot->quantity * $product->price)}}
                            </span>
                        </div>
                    </div>
                    @endforeach
                    <div class="totalprice">
                        <sub>
                            <b>Total Price: IDR {{number_format($transaction_header->total_price)}}</b>
                        </sub>    
                    </div>
                </div>
            </div>
        </div>
    </div>    
         
@empty
    <h1> No data</h1>
@endforelse

<script type="text/javascript" src="{{ URL::asset('js/slider.js') }}"></script>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/history.css") }}">
@endsection