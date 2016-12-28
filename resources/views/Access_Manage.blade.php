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
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-offset-9 col-md-2">
                <button type="button" class="btn btn-default" style="width: 50%" data-toggle="modal" data-target="#AddUserModal">
                    <span class="glyphicon glyphicon-plus-sign"></span>新增使用者
                </button>
            </div>
            <br>
            <div class="col-md-offset-1 col-md-10" style="border-bottom-width: 1px;border-bottom-style: solid;border-color: #bababa;padding: 0px">
                <?php
                    $admin_count = 0;
                ?>
                @foreach($users as $every_user)
                    <?php
                        if($every_user->roleIs('admin')){
                            if($admin_count % 2 == 0){
                    ?>              
                                <div class="col-md-6" style="padding: 0px;">
                                    @include('Access_Manage.Admin')
                                </div> 
                        <?php
                            }else{
                        ?>
                            <div class="col-md-6" style="padding: 0px">
                                @include('Access_Manage.Admin')
                            </div>
                        <?php
                            }
                            $admin_count++;
                        }
                        ?>
                @endforeach
            </div>
            <div class="col-md-offset-1 col-md-10" style="padding: 0px">
                    <?php
                        $user_count = 0;
                    ?>
                    @foreach($users as $every_user)
                        <?php 
                            if($every_user->roleIs('user')){
                                if($user_count % 2 == 0){
                        ?>
                            <div class="col-md-6" style="border-right-width:1px;border-right-style:solid;border-color:#bababa; padding: 0px;">
                                @include('Access_Manage.User')
                            </div>
                        <?php
                                }else{
                        ?>
                            <div class="col-md-6" style="padding: 0px">
                                @include('Access_Manage.User')
                            </div>
                        <?php
                                }
                            $user_count++;
                            }
                        ?>
                    @endforeach
                </div>
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