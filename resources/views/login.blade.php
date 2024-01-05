@extends('master.layout')

@section('title', 'Login')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center bg-dark bg-gradient" style="height: 100vh;">
    <div class="container position-absolute bg-white rounded-10" style="width: 400px">
        @error('email')
            <div class="row">
                <div class="col-md-4"></div>
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            </div>
        @enderror
        @error('password')
            <div class="row">
                <div class="col-md-4"></div>
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            </div>
        @enderror
        <form method="post" action="{{url('login')}}">
            @csrf
            <h2 class="text-center">Login</h2>
            <div class="form-outline position-relative">
                <input type="email" name="email" id="email" class="form-control form-control-lg bg-light-subtle @error('email') border border-danger @enderror" placeholder="Email" value="{{old('email')}}">
            </div>

            <div class="form-outline position-relative">
                <input id="password" type="password" name="password" class="form-control form-control-lg bg-light-subtle @error('password') border border-danger @enderror" placeholder="Password" value="{{old('password')}}"/>
                <i class="position-absolute top-50 end-0 pe-3 translate-middle-y bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
            </div>


            <div class="d-flex flex-column justify-content-center">
                <button type="submit" class="btn btn-primary rounded-pill btn-block">Login</button>
                <div>
                    <span class="mx-2">Do not have any account?</span>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
