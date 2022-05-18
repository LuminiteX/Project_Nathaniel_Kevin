@extends('layouts/app')

@section('content')
<div class="insert">
    <div class="insert-form">
        <p class="insert-form-name">Insert New Category</p>
        <form action="/category/insert" method="POST">
            @csrf

            <input type="text" name="name" id="" placeholder="Category name">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="submit" value="add">
        </form>
    </div>
</div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/insert_category.css") }}">
@endsection