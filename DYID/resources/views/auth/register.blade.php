@extends('layouts/app')

@section('content')
<div class="register">
    <div class="register-form">
        <p>Join With Us</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="register-form-group">
                <input type="text" name="name" id="name" placeholder="Full Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="register-form-group">
                <label>Gender</label>
                <div class="register-form-group-gender">
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female">Female</label>
                </div>

                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="register-form-group">
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Address"></textarea>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="register-form-group">
                <input type="email" name="email" id="" placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="register-form-group">
                <input type="password" name="password" id="" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="register-form-group">
                <input type="password" name="password_confirmation" id="" placeholder="Confirm password">
            </div>


            <div class="register-form-group">
                <div class="register-form-agree">
                    <input type="checkbox" name="agree" id="agree">
                    <label for="reg_agree">I agree with terms & conditions</label>
                </div>

                @error('agree')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="register-form-group">
                <input type="submit" value="Register Now">
            </div>
            
        </form>
    </div>
    
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection