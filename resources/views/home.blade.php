@extends('master.layout')

@section('title', 'Home')

@section('content')
    <nav>
        <div>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <input type="text" name="locale" id="" value="{{app()->getLocale()}}" hidden>
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>
    @if($transaction)
        <h1>{{__("home.title.checkedin")}}{{$transaction["police_number"]}}</h1>
        <form action="{{url('update')}}" method="post">
            @csrf
            <input type="text" name="id" id="park_id" value="{{$transaction["id"]}}" hidden>
            <input type="text" name="police_number" id="police_number">
            @error('police_number')
                {{$message}}
            @endisset
            <button type="submit">Check Out</button>
        </form>
    @else
        <h1>{{__("home.title.new")}}</h1>
        <form action="{{url('create')}}" method="post">
            @csrf
            <input type="text" name="police_number" id="police_number">
            @error('police_number')
                {{$message}}
            @endisset
            <button type="submit">Check In</button>
        </form>
    @endif

@endsection
