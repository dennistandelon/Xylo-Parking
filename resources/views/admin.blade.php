@extends('master.layout')

@section('title', 'Admin')

@section('content')
    <nav>
        <div>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Parking ID</th>
                    <th scope="col">Police Number</th>
                    <th scope="col">Enter Date</th>
                    <th scope="col">Exit Date</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Total Hour</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction as $tr)
                    <tr>
                        <th scope="row">{{$tr->parking_id}}</th>
                        <td>{{$tr->police_number}}</td>
                        <td>{{$tr->in_date}}</td>
                        <td>{{$tr->out_date}}</td>
                        <td>{{$tr->total_price}}</td>
                        <td>{{$tr->total_hours}}</td>
                        <td>
                            <form action="/admin/delete/{{$tr->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button button-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </section>

@endsection
