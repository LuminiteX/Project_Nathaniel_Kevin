@extends('layouts/app')

@section('content')
<div class="insert_product">
    <div class="insert_product-form">
        <p>Insert New Product</p>
        <form action="/product/insert" enctype="multipart/form-data" method="POST" >
            {{ csrf_field() }}
            <input type="text" name="name" id="name" placeholder="Product Name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <textarea name="description" id="description" cols="30" rows="10" placeholder="Product Description"></textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="text" name="price" id="" placeholder="Price">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="product_category">Product Category</label>
            <select name="product_category", id="product_category">
                <option value="option_select" disabled selected>Choose One</option>
                @foreach ($category_data as $Category) 
                <option value="{{ $Category->id }}">  
                    {{ $Category->name }}  
                </option> 
                @endforeach 
            </select>
            @error('product_category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_img">Product Image</label>
            <input type="file" name="image_path" id="image_path" accept=".jpg"/>
            @error('image_path')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="submit" value="Add">
        </form>
    </div>
    
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/insert_new_product.css")}}">
@endsection