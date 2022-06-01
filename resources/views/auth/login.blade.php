<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('styles/bootstrap-3.1.1/css/bootstrap.min.css')}}">
    
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:8%">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login</h4>
                <hr>
                <form action="{{route('auth.check')}}" method="POST">
                    @csrf
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}" required="required">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required="required">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <br>
                    <a href="register">Create an new Account now!</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>