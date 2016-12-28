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
   @include('Issue.Add_issue_modal')
   @include('Issue.Close_issue_modal')
    
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('project_list')}}">專案</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('issue_list',['project_id' => $project->id]) }}">議題</a></li>
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

        <div class="row col-md-offset-1">
            <h1 style="color: black;" class="col-md-3">{{$project->subject}}</h1><br>
            <a class="col-md-2" href="{{ route('project_member', ['project_id' => $project->id]) }}" style="margin-top: 15px">專案成員</a>
            <div class="col-md-3 col-md-offset-4">
                <form>
                    <button type="button" class="btn btn-default col-md-6" data-toggle="modal" data-target="#AddIssueModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>Add Issue
                    </button>
                </form>
                <!--<form>
                    <button type="button" class="btn btn-default col-md-4" data-toggle="modal" data-target="#CloseIssueModal">
                        <span class="glyphicon glyphicon-minus-sign"></span>Close Issue
                    </button>
                </form>-->
            </div>
            <!-- <br> -->
        </div>

        <div class="row col-md-offset-1 col-md-10">
            <?php
                $index = 0;
            ?>
            @foreach ($project->issues as $issue)
            <div class="col-md-4">
                <div class="panel panel-primary" style="padding-left: 0px;padding-right: 0px;">
                    <div class="panel-heading">
                        <div class="panel-title  clearfix">
                            <div class="pull-left">
                                {{$issue->title}}
                            </div>
                            
                            @if($project->pivot['user_auth'] == 'manager')
                                <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project_name="{{$project->subject}}">&times;</button>-->

                                <form method="POST" action="{{ route('Delete_issue',['project_id' => $project->id,'issue_id' => $issue->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="close">&times;</button>
                                </form>
                            @endif
                            <div class="pull-right">
                                <form id= method="GET" action="{{ route('issue',['project_id' => $project->id,'issue_id' => $issue->id]) }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-default btn-xs">Descript</button>
                                </form> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div> 
                            <p>Priority: {{$issue->priority}}</p>
                            <p>State: {{$issue->state}}</p>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>