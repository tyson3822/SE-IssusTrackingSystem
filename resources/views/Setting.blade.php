<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/ProjectList')}}">ProjectList</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{url('/Setting')}}">Setting</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user_name}}</label></li>
                        <li><a href="{{url('/login')}}">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="border-bottom-width:1px;border-bottom-style:solid;border-color:#bababa">
                <div class="col-md-offset-1">
                    <p style="font-size:50px;color:black;">Setting-</p>
                </div>
            </div>     
        </div>
        <div class="row">
            <div class="container col-md-offset-1 col-md-5" style="border-right-width:1px;border-right-style:solid;border-color:#bababa">
                <label class="col-md-offset-2" style="font-size:30px; color:black;">Personal information</label>
                @if($access === 'admin')
                    <a class="col-md-offset-1" style="font-size: 15px" href="{{url('/Access_Manage')}}">Change access</a>
                @endif
                
                <p class="col-md-offset-1" style="font-size:18px;color: black">
                    <label>User Name : {{$user_name}}</label><br>
                    <label>Email : {{$email}}</label><br>
                    <label>Password : {{$password}}</label><br>
                    <label>access : {{$access}}</label>
                </p>
            </div>
            <div class="container col-md-5" style="border-left-width:1px;border-left-style:solid;border-color:#bababa">
                <label class="col-md-offset-2" style="font-size:30px; color:black;">Edit personal information</label>
                <form class="form-horizontal" role="form" method="POST" action="/Setting/{{$email}}/{{$user_name}}/{{$password}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-offset-1">
                        <label class="col-md-4" style="font-size:18px;color: black">User Name : </label>
                        <input type="text" name="user_name" class="form-control" style="width:60%">  
                    </div>
                    <br>
                    <div class="col-md-offset-1">
                        <label class="col-md-4" style="font-size:18px;color: black">Password : </label>
                        <input id="password" type="password" class="form-control" name="password" style="width:60%">  
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary col-md-offset-9" style="width:20%">Save</button>
                </form>      
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>