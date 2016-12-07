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
    <div>
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/projectlist')}}">ProjectList</a></li>
                        <li class="active"><a>AccountList</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/Setting')}}">Setting</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user_name}}</label></li>
                        <li><a href="{{url('/login')}}">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-offset-1 col-md-10">
                    <button type="submit" class="btn btn-primary" style="width:10%">Save</button>
                </div>
                <br>
                <div class="col-md-offset-1 col-md-10" style="border-bottom-width:1px;border-bottom-style:solid;border-color:#bababa">
                    <?php
                        $admin_count = 0;
                    ?>
                    @foreach($users as $user)
                        <?php
                            if($user['access'] == 'admin'){
                                if($admin_count % 2 == 0){
                        ?>              
                            <div class="col-md-offset-1 col-md-5">
                                <div class="col-md-offset-1">
                                    <img src="person.png" class="img-circle">
                                    <label class="col-md-offset-1">{{$user['name']}}</label>
                                    <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                        <option value="admin" selected="selected">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div> 
                        <?php
                                }else{
                        ?>
                            <!--<?php echo $admin_count;?>-->
                            <div class="col-md-offset-1 col-md-5">
                                <img src="person.png" class="img-circle">
                                <label class="col-md-offset-1">{{$user['name']}}</label>
                                <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                    <option value="admin" selected="selected">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        <?php
                            }
                            $admin_count++;
                        }
                        ?>
                    @endforeach
                </div>

                <div class="col-md-offset-1 col-md-10">
                    <?php
                        $user_count = 0;
                    ?>
                    @foreach($users as $user)
                        <?php 
                            if($user['access'] == 'user'){
                                if($user_count % 2 == 0){
                        ?>
                            <div class="col-md-offset-1 col-md-5" style="border-right-width:1px;border-right-style:solid;border-color:#bababa">
                                <div class="col-md-offset-1">
                                    <img src="person.png" class="img-circle">
                                    <label class="col-md-offset-1">{{$user['name']}}</label>
                                    <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                        <option value="admin">Admin</option>
                                        <option value="user" selected="selected">User</option>
                                    </select>
                                </div>
                            </div>
                        <?php
                                }else{
                        ?>
                            <div class="col-md-offset-1 col-md-5">
                                <img src="person.png" class="img-circle">
                                <label class="col-md-offset-1">{{$user['name']}}</label>
                                <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                    <option value="admin">Admin</option>
                                    <option value="user" selected="selected">User</option>
                                </select>
                            </div>
                        <?php
                                }
                            $user_count++;
                            }
                        ?>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</body>
</html>