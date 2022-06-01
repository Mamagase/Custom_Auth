<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="{{asset('styles/bootstrap-3.1.1/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:4%">
            <div class="col-md-4 col-md-offset-4">
                <h4>Register your Account</h4>
                <hr>
                <form action="{{route('auth.create')}}" method="POST">
                    @csrf
                    <div class="results">
                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your full name..." value="{{old('name')}}" required="required">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter your phone..." value="{{old('phone')}}" required="required">
                        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email..." value="{{old('email')}}" required="required">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password..." required="required">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Enter your password again..." required="required">
                        <span class="text-danger">@error('confirmPassword'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary">Sign up</button>
                    </div>
                    <a href="login">Already have an Account?Sign in</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>