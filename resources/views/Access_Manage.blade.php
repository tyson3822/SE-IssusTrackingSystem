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
    <!--<link href="/css/app.css" rel="stylesheet">-->

    <!-- Referencing Bootstrap CSS that is hosted locally -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('Access_Manage.Add_User_Modal')

    <div>
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('project_list')}}">專案</a></li>
                        <li class="active"><a>帳號管理</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('setting')}}">設定</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="{{url('/logout')}}">登出</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <form id="save" class="form-horizontal" role="form" method="POST" action="{{route('Change_user_auth')}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-offset-1 col-md-5">
                    <button type="submit" class="btn btn-primary" style="width: 20%" onclick="event.preventDefault();document.getElementById('save').submit();">儲存</button>
                </div>
                <div class="col-md-offset-4 col-md-2">
                    <button type="button" class="btn btn-default" style="width: 50%" data-toggle="modal" data-target="#AddUserModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>新增使用者
                    </button>
                </div>
                <br>
                <div class="col-md-offset-1 col-md-10" style="border-bottom-width:1px;border-bottom-style:solid;border-color:#bababa">
                    <?php
                        $admin_count = 0;
                    ?>
                    @foreach($users as $every_user)
                        <?php
                            if($every_user->role == 'admin'){
                                if($admin_count % 2 == 0){
                        ?>              
                            <div class="col-md-offset-1 col-md-5">
                                <div class="col-md-offset-1">
                                    <img src="person.png" class="img-circle">
                                    <label class="col-md-offset-1">{{$every_user->name}}</label>
                                    <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                        <option value="admin" selected="selected">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <form method="POST" action="{{ route('Delete_user',['user_id' => $every_user->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger col-md-offset-1">刪除</button>
                                    </form>
                                </div>
                            </div> 
                        <?php
                                }else{
                        ?>
                            <div class="col-md-offset-1 col-md-5">
                                <img src="person.png" class="img-circle">
                                <label class="col-md-offset-1">{{$every_user->name}}</label>
                                <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                    <option value="admin" selected="selected">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <form method="POST" action="{{ route('Delete_user',['user_id' => $every_user->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger col-md-offset-1">刪除</button>
                                </form>
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
                    @foreach($users as $every_user)
                        <?php 
                            if($every_user->role == 'user'){
                                if($user_count % 2 == 0){
                        ?>
                            <div class="col-md-offset-1 col-md-5" style="border-right-width:1px;border-right-style:solid;border-color:#bababa">
                                <div class="col-md-offset-1">
                                    <img src="person.png" class="img-circle">
                                    <label class="col-md-offset-1">{{$every_user->name}}</label>
                                    <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                        <option value="admin">Admin</option>
                                        <option value="user" selected="selected">User</option>
                                    </select>
                                    <form method="POST" action="{{ route('Delete_user',['user_id' => $every_user->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger col-md-offset-1">刪除</button>
                                    </form>
                                </div>
                            </div>
                        <?php
                                }else{
                        ?>
                            <div class="col-md-offset-1 col-md-5">
                                <img src="person.png" class="img-circle">
                                <label class="col-md-offset-1">{{$every_user->name}}</label>
                                <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
                                    <option value="admin">Admin</option>
                                    <option value="user" selected="selected">User</option>
                                </select>
                                <form method="POST" action="{{ route('Delete_user',['user_id' => $every_user->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger col-md-offset-1">刪除</button>
                                </form>
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

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- BootStrap.js -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>