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
    @include('Project.Create_Project_Modal')
    @include('Project.Close_Project_Modal')

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url('project_list')}}">專案</a></li>
                        @include('layouts.AccountList_navbar')
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('setting')}}">設定</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row col-md-offset-1">
            <h1 style="color: black;" class="col-md-8">專案列表</h1>
            <div class="col-md-4">
                <form>
                    <button type="button" class="btn btn-default col-md-4 " data-toggle="modal" data-target="#CreateProjectModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>建立專案
                    </button>
                </form>
            </div>
        </div>
        <div class="row col-md-offset-1 col-md-10">
            <?php
                $index = 0;
            ?>
            @foreach ($user->projects as $project)
            <div class="col-md-4">
                <div class="panel panel-info" style="padding-left: 0px;padding-right: 0px;">
                    <div class="panel-heading">
                        <div class="panel-title">
                            {{$project->subject}}
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-sm" role="button" onclick="event.preventDefault();document.getElementById('GotoProject').submit();">Go</a>
                                <form id="GotoProject" action="{{ url('/project/{project->id}') }}" method="GET" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @if($project->pivot['user_auth'] == 'manager')
                                    <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project_name="{{$project->subject}}">&times;</button>-->

                                    <button type="submit" class="close" onclick="event.preventDefault();document.getElementById('CloseProject').submit();">&times;</button>
                                    <form id="CloseProject" action="{{ url('Close_Project',$project->id) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        {{--@for ($count = 0; $count < $project_issue_count[$index]; $count++)--}}
                            {{--<img src="simple_issue.png" class="col-md-offset-1">--}}
                        {{--@endfor--}}
                    </div>
                </div>
            </div>
            <?php
//                $index++;
            ?>
            @endforeach
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#CloseProjectModal').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var button = $(e.relatedTarget);
            var project_name = button.data('project_name');
            
            var modal = $(this);
            //modal.find('.modal-body label').text(project);
            //populate the textbox
            $(e.currentTarget).find('label[name="project"]').text(project_name);
        });
    </script>
</body>
</html>