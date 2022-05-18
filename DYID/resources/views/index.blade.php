@extends('layouts/app')

@section('content')
    <p class="title">New Products</p>

    <div class="gallery">
        @forelse($data as $product)
            <div class="gallery-item">
                <div class="gallery-item-top">
                    <img src="{{ url('storage/images/products/'. $product->image_path)}}" alt="">
                </div>
                <div class="gallery-item-bot">
                    <div class="gallery-item-bot-title">
                        <p class="gallery-item-bot-title-product">{{$product->name}}</p>
                        <p class="gallery-item-bot-title-category">{{$product->category->name}}</p>
                    </div>
                    <p class="gallery-item-bot-price"> IDR {{number_format($product->price)}} </p>
                    <a class="gallery-item-bot-more" href="/product/{{$product->id}}">More Detail</a>
                </div>
            </div>
        @empty
            <h2>There is no product available</h2>
        @endforelse
    </div>

    {{-- BOOSTRAP ONLY FOR PAGINATION --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="pag">
        {{ $data->links() }}
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/home.css") }}">
@endsection