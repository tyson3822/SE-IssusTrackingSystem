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
                        <li class="active"><a>ProjectList</a></li>
                        @include('layouts.AccountList_navbar')
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/Setting')}}">Setting</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row col-md-offset-1">
            <h1 style="color: black;" class="col-md-8">Project List</h1>
            <div class="col-md-4">
                <form>
                    <button type="button" class="btn btn-default col-md-4 " data-toggle="modal" data-target="#CreateProjectModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>Create Project
                    </button>
                </form>
                <form>
                    <button type="button" class="btn btn-default col-md-4" data-toggle="modal" data-target="#CloseProjectModal" data-project="test">
                        <span class="glyphicon glyphicon-minus-sign"></span>Close Project
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
                        <div class="panel-heading">{{$project->subject}}</div>
                        <div class="panel-title pull-right">
                            <a href="#" class="btn btn-default btn-sm" role="button" onclick="event.preventDefault();document.getElementById('GotoProject').submit();">Go</a>
                            <form id="GotoProject" action="{{ url('/IssueList/{project}') }}" method="GET" style="display: none;">{{ csrf_field() }}</form>
                            @if($project->role == 'manager')
                                <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project="{{$project}}">&times;</button>-->

                                <button type="submit" class="close" onclick="event.preventDefault();document.getElementById('CloseProject').submit();">&times;</button>
                                <form id="CloseProject" action="{{ url('/Close_Project/{project->id}') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                </form>
                            @endif
                        </div>
                        <div class="clearfix"></div>
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
            var project = button.data('project');
            
            var modal = $(this);
            //modal.find('.modal-body label').text(project);
            //populate the textbox
            $(e.currentTarget).find('label[name="project"]').text(project->subject);
        });
    </script>
</body>
</html>