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
                        <li><a href="{{route('project_list')}}">專案</a></li>
                        @include('layouts.AccountList_navbar')
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{route('setting')}}">設定</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="border-bottom-width:1px;border-bottom-style:solid;border-color:#bababa">
                <div class="col-md-offset-1">
                    <p style="font-size:50px;color:black;">設定-</p>
                    @include('flash::message')
                </div>
            </div>     
        </div>
        <div class="row">
            <div class="container col-md-offset-1 col-md-5" style="border-right-width:1px;border-right-style:solid;border-color:#bababa">
                <label class="col-md-offset-2" style="font-size:30px; color:black;">Personal information</label>
                <p class="col-md-offset-1" style="font-size:18px;color: black">
                    <label>使用者名稱 : {{$user->name}}</label><br>
                    <label>Email : {{$user->email}}</label><br>
                    <label>權限 : {{$user->role}}</label>
                </p>
            </div>
            <div class="container col-md-5" style="border-left-width:1px;border-left-style:solid;border-color:#bababa">
                <label class="col-md-offset-2" style="font-size:30px; color:black;">Edit personal information</label>

                {!! Form::open(array('url' => 'setting/update', 'method' => 'put')) !!}
                    {{ csrf_field() }}

                    <div class="col-md-offset-1">
                        {{Form::label('name', '使用者名稱',[
                            'class' => 'col-md-4' ,
                            'style' => 'font-size:18px;color: black'])}}

                        {{Form::text('name',null,[
                            'class' => 'form-control',
                            'style' => 'width:60%'])}}

                        <br>
                    </div>

                    <div class="col-md-offset-1">
                        {{Form::label('password', '密碼',[
                            'class' => 'col-md-4', 
                            'style' => 'font-size:18px;color: black'])}}

                        {{Form::password('password',[
                            'class' => 'form-control',
                            'style' => 'width:60%'])}}

                        {{Form::label('password_confirmation', '再次輸入密碼',[
                            'class' => 'col-md-4', 
                            'style' => 'font-size:18px;color: black'])}}

                        {{Form::password('password_confirmation',[
                            'class' => 'form-control',
                            'style' => 'width:60%'])}}

                        <br>
                    </div>                    
                    {{Form::submit('儲存',[
                        'class' => 'btn btn-primary col-md-offset-9',
                        'style' => 'width:20%'])}}
                    
                {!! Form::close() !!}   
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>