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
    <nav class="navbar navbar-default navbar-static-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">ITS</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a>Project List</a></li>
                    <li class="active">Issue List</li>
                    @include('layouts.AccountList_navbar')
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/Setting')}}">Setting</a></li>
                    <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                    <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Project Manager</h3>
        </div>
        <div class="panel-body">
            @foreach($project->users as $member)
                @if($member->pivot['user_auth'] == 'manager')
                    <label name="">prject manager name</label>
                    @if($user->projects[$project->submit]->pivot['user_auth'] == 'manager')
                        <form method="POST" action="{{ url('/Change_project_member_role/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="selectpicker col-md-offset-1" style="width:30%" name="role">
                                <option value="manager" selected="selected">Manager</option>
                                <option value="developer">Developer</option>
                                <option value="general">General</option>
                            </select>
                        </form>
                        <form method="POST" action="{{ url('/Delete_project_member/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">剔除</button>
                        </form>
                    @endif
                @endif
            @endforeach
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Developer</h3>
        </div>
        <div class="panel-body">
            @foreach($project->users as $member)
                @if($member->pivot['user_auth'] == 'manager')
                    <label name="">Developer name</label>
                    @if($user->projects[$project->submit]->pivot['user_auth'] == 'manager')
                        <form method="POST" action="{{ url('/Change_project_member_role/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="selectpicker col-md-offset-1" style="width:30%" name="role">
                                <option value="manager">Manager</option>
                                <option value="developer" selected="selected">Developer</option>
                                <option value="general">General</option>
                            </select>
                        </form>
                        <form method="POST" action="{{ url('/Delete_project_member/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">剔除</button>
                        </form>
                    @endif
                @endif
            @endforeach
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">General</h3>
        </div>
        <div class="panel-body">
            @foreach($project->users as $member)
                @if($member->pivot['user_auth'] == 'general')
                    <label name="">General name</label>
                    @if($user->projects[$project->submit]->pivot['user_auth'] == 'manager')
                        <form method="POST" action="{{ url('/Change_project_member_role/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="selectpicker col-md-offset-1" style="width:30%" name="role">
                                <option value="manager">Manager</option>
                                <option value="developer">Developer</option>
                                <option value="general" selected="selected">General</option>
                            </select>
                        </form>
                        <form method="POST" action="{{ url('/Delete_project_member/{project_id}') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">剔除</button>
                        </form>
                    @endif
                @endif
            @endforeach
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>