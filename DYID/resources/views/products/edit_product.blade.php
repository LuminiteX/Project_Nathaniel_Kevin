@extends('layouts/app')

@section('content')
<div class="edit_product">
    <div class="edit_product-form">
        <p>Edit Product</p>
        <form action="/product/edit/{{$data->id}}" enctype="multipart/form-data" method="POST" >
            {{ csrf_field() }}
            @method('PUT')

            <input type="text" name="name" id="name" value="{{$data->name}}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <textarea name="description" id="description" cols="30" rows="10">{{$data->description}}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="text" name="price" id="" value="{{$data->price}}">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="product_category">Product Category</label>
            <select name="product_category", id="product_category">
                <option value="{{$data->category_id}}">{{$data->category->name}}</option>
                @foreach ($category_data as $Category)
                @if ($Category->id != $data->category->id)
                    <option value="{{ $Category->id }}">  
                    {{ $Category->name }}  
                    </option>
                @endif 
                @endforeach 
            </select>
            @error('product_category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="product_img">Product Image</label>
            <input type="file" name="image_path" id="image_path" accept=".jpg"/>
            <p>Old File: {{$data->image_path}}</p>
            @error('image_path')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <input type="submit" value="Update">
        </form>
    </div>
    
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/edit_product.css")}}">
@endsection