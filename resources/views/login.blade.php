<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">

    <h2>Login</h2><br/>
    <form method="post" action="{{url('login')}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">

                <input type="text" class="form-control" name="email" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">

                <input type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">

                <button type="submit" class="btn btn-success">Login</button>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>

            </div>
        </div>
    </form>
</div>
</body>
</html>

