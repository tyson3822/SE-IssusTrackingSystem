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
    <!-- Create Project Modal -->
    <div class="modal fade" id="CreateProjectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Project</h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="/Create_Project">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label class="control-label col-md-3" style="text-align: left;">Project Title : </label>
                        <input class="form-control" style="width:60%" type="text" name="subject">
                        <label class="control-label col-md-4" style="text-align: left;">Project Description : </label>
                        <textarea class="form-control" rows="4" name="description"></textarea>

                        <div class="row">
                            <label>
                                private
                                <input type="radio" name="visible" value="private" checked>
                            </label>
                            <label>
                                public
                                <input type="radio" name="visible" value="public">
                            </label>
                        </div>

                        <div class="row">
                            <label>
                                normal
                                <input type="radio" name="state" value="normal" checked>
                            </label>
                            <label>
                                close
                                <input type="radio" name="state" value="close">
                            </label>
                            <label>
                                disable
                                <input type="radio" name="state" value="disable">
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Close Project Modal -->
    <div class="modal fade" id="CloseProjectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Project</h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="/Create_Project">
                    {{ csrf_field() }}
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    <button type="button" class="btn btn-default col-md-4" data-toggle="modal" data-target="#CloseProjectModal">
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

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>