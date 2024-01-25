@extends('master.layout')

@section('title', __("form.login.title"))

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center bg-dark bg-gradient" style="height: 100vh;">
    <div class="container position-absolute bg-white rounded-10" style="width: 400px">
        <form method="post" action="{{url('login')}}">
            @csrf
            <h2 class="text-center">{{__("form.login.title")}}</h2>
            <div class="form-outline position-relative">
                <input type="email" name="email" id="email" class="form-control form-control-lg bg-light-subtle @error('email') border border-danger @enderror" placeholder="{{__("form.login.input.email")}}" value="{{old('email')}}">
                @error('email')
                    <div class="text text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-outline position-relative">
                <input id="password" type="password" name="password" class="form-control form-control-lg bg-light-subtle @error('password') border border-danger @enderror" placeholder="{{__("form.login.input.password")}}" value="{{old('password')}}"/>
                <i class="position-absolute top-50 end-0 pe-3 translate-middle-y bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                @error('password')
                    <div class="text text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>


            <div class="d-flex flex-column justify-content-center">
                <button type="submit" class="btn btn-primary rounded-pill btn-block">{{__("form.login.input.button")}}</button>
                <div>
                    <span class="mx-2">{{__("form.login.message")}}</span>
                    <a href="{{ route('register') }}">{{__("form.login.anchor")}}</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
