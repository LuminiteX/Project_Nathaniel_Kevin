@extends('layouts/app')

@section('content')
    <h1>Manage Product</h1>
    <table style="width:98%">
        <col style="width:3%">
	    <col style="width:14%">
        <col style="width:9%">
        <col style="width:27%">
        <col style="width:7%">
        <col style="width:10%">
	    <col style="width:20%">
        <tr>
            <th style="width:3%">No</td>
            <th style="width:14%">product Image</td>
            <th style="width:9%">Prdouct Name</td>
            <th style="width:20%">Product Description</td>
            <th style="width:7%">Product Price</td>
            <th style="width:10%">Product Category</td>
            <th style="width:10%">Action</td>
        </tr>
        <tr>
        @forelse ($product as $product)
        <tr>
            <td style="width:3%">{{$product->id}}</td>
            <td style="width:14%"><img src="{{ url('storage/images/products/'. $product->image_path)}}"></td>
            <td style="width:9%">{{$product->name}}</td>
            <td style="width:20%">{{$product->description}}</td>
            <td style="width:7%">{{$product->price}}</td>
            <td style="width:10%">{{$product->category->name}}</td>
            <td style="width:15%">
                <div class="ButtonI">
                    <a href="/product/edit/{{$product->id}}" class="Update">Update</a>
                    <form action="/product/delete/{{$product->id}}" method="POST">
                        @csrf
                        @method("delete")
                        <button type = "submit" class="Delete">Delete</button>
                    </form>
                </div>
                
            </td>
        </tr>
        @empty
            <td>No data</td>
            <td>No data</td>
            <td>No data</td>
            <td>No data</td>
            <td>No data</td>
            <td>No data</td>
            <td>No data</td>
        @endforelse
    </table>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/view_product_list.css") }}">
@endsection