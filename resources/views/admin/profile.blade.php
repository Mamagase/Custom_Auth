<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('styles/bootstrap-3.1.1/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:8%">
            <div class="col-md-6 col-md-offset-3">
                <h4>Profile</h4>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td>{{$LoggedUserInfo->name}}</td>
                        <td>{{$LoggedUserInfo->email}}</td>
                        <td><a href="logout">Logout</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>