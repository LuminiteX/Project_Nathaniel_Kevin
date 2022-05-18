@extends('layouts/app')

@section('content')
<div class="login">
    <div class="login-form">
        <p>Welcome Back</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="login-form-group">
                <input type="email" name="email" id="email" placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-form-group">
                <input type="password" name="password" id="password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-form-group">
                <div class="login-form-remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
            </div>
            
            <div class="login-form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection