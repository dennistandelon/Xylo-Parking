@extends('master.layout')

@section('title', __("form.register.title"))

@section('content')
    <form action="{{url('newaccount')}}" method="POST">
        @csrf
        <div>
            <label for="name">{{__("form.register.label.name")}}</label>
            <input type="text" name="name" id="name">
            @error('name')
                <div class="text-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div>
            <label for="email">{{__("form.register.label.email")}}</label>
            <input type="email" name="email" id="email">
            @error('email')
                <div class="text-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div>
            <label for="password">{{__("form.register.label.password")}}</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="text-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit">{{__("form.register.input.button")}}</button>
    </form>
@endsection
