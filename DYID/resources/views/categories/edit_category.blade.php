@extends('layouts/app')

@section('content')
<div class="edit">
    <div class="edit-form">
        <p>Edit Category</p>
        <form action="/category/edit/{{$data->id}}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" id="" value="{{$data->name}}">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    
            <button class="edit-form-btn" type="submit">update</button>
        </form>
    </div>
</div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset("css/edit_category.css") }}">
@endsection