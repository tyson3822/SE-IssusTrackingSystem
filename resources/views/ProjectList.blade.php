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
                        <li class="active"><a href="{{route('project_list')}}">專案</a></li>
                        @include('layouts.AccountList_navbar')
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
           <h1 class="col-md-offset-1 col-md-2" style="color: black;margin-top: 0px">專案列表</h1>
            @include('Project.Search_project')
            @include('Project.Create_project') 
        </div>

        <div class="row col-md-offset-1 col-md-10">
            <?php
                $index = 0;
            ?>
            @foreach ($user->projects as $project)
            <div class="col-md-4">
                <div class="panel panel-info" style="padding-left: 0px;padding-right: 0px;">
                    <div class="panel-heading">
                        <div class="panel-title clearfix">
                            <div class="pull-left">
                                {{$project->subject}}
                            </div>
                            @if($project->pivot['user_auth'] == 'manager')
                                <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project_name="{{$project->subject}}">&times;</button>-->

                                <form method="POST" action="{{ route('Close_Project',$project->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="close" style="margin-left: 5px;">&times;</button>
                                </form>
                            @endif

                            <form method="GET" action="{{ url('/project',['project_id' =>$project->id]) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-sm pull-right" style="padding: 4px;">Go</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($project->issues as $issue)
                            <img src="simple_issue.png" class="col-md-offset-1">
                        @endforeach
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