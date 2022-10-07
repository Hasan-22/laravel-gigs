@extends('layout')

@section('content')

<div class="container mt-5">
    <form class="row g-3 d-flex justify-content-center" action="/user" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Enter your name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Hasan" value="{{old('name')}}">
            @error('name')
                <span style="color: rebeccapurple">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="xyz@gmail.com" value="{{old('email')}}">
            @error('email')
                <span style="color: rebeccapurple">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Enter password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4"
                placeholder="Password" value="{{old('password')}}">
            @error('password')
                <span style="color: rebeccapurple">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword5" class="form-label">Enter password</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputPassword5"
                placeholder="Password Confirmation" value="{{old('password_confirmation')}}">
            @error('password_confirmation')
                <span style="color: rebeccapurple">{{ $message }}</span>
            @enderror
        </div>
       


        <div class="col-12">
            <button type="submit" class="btn btn-warning mt-3 mb-2">Register</button>
        </div>
    </form>

    <p class="fw-bold">Already have an account? <a href="/login">Login</a></p>
</div>
    
@endsection