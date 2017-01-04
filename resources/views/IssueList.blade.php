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
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <a class="navbar-brand" href="{{route('project_list')}}">專案</a>
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
            <a class="col-md-1" href="{{ route('project_member', ['project_id' => $project->id]) }}" style="margin-top: 15px">專案成員</a>
            @include('Issue.Search_issue')
            <div class="col-md-offset-1 col-md-3">
                @if($project->state == 'normal')
                    <button type="button" class="btn btn-default col-md-6" data-toggle="modal" data-target="#AddIssueModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>Add Issue
                    </button>
                @endif
                <!--<form>
                    <button type="button" class="btn btn-default col-md-4" data-toggle="modal" data-target="#CloseIssueModal">
                        <span class="glyphicon glyphicon-minus-sign"></span>Close Issue
                    </button>
                </form>-->
            </div>
            <!-- <br> -->
        </div>

        <div class="container">
            <div class="row col-md-offset-1 col-md-9"><br>
                <div class="table-responsive">
                    <table class="table table-hover">

                        <tr>
                            <th>#</th>
                            <th>標題</th>
                            <th>嚴重程度</th>
                            <th>狀態</th>
                            <th>建立時間</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $index = 0;
                        ?>
                        @foreach ($issues as $issue)
                        <tr>
                            <td>{{$issue->id}}</td>
                            <td>{{$issue->title}}</td>
                            <td>{{$issue->priority}}</td>
                            <td>{{$issue->state}}</td>
                            <td>{{$issue->created_at}}</td>
                            <td>
                                <div class="pull-right">
                                    <form id= method="GET" action="{{ route('issue',['project_id' => $project->id,'issue_id' => $issue->id]) }}">
                                    {{ csrf_field() }}
                                        <button type="submit" class="btn btn-default btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>
                                    </form>             
                                </div> 
                            </td>
                            <td>
                                @if(($issue->user_id == $user->id or $project->pivot['user_auth'] == 'manager') and $project->state =='normal')
                                    <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project_name="{{$project->subject}}">&times;</button>-->

                                <form method="POST" action="{{ route('Delete_issue',['project_id' => $project->id,'issue_id' => $issue->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="close">&times;</button>
                                </form>
                                @endif                      
                            </td>
                        </tr>      
                        @endforeach
                    </table>
                </div>   
            </div>

            <div class="col-md-offset-1 col-md-1" style="padding: 0px">
                <h3>狀態 : {{$project->state}}
                </h3>
            </div>

            <div class="row" style="padding: 0px">
                <div class="row">
                    <br>
                    <button id="pei_chart_button" type="button" class="btn btn-success col-md-offset-5 col-md-1">圓餅圖</button>
                    <button id="column_chart_button" type="button" class="btn btn-info col-md-1" style="margin-left: 5px">長條圖</button>
                </div>
                
                <div id="pie_chart" class="col-md-offset-1 col-md-5">
                    <div id="issue_state_pie" style="min-width: 100px; height: 300px; max-width: 600px; padding: 0px;"></div>
                    <div id="issue_priority_pie" style="min-width: 100px; height: 300px; max-width: 600px;padding: 0px;"></div>
                    <div id="project_member_pie"  style="min-width: 100px; height: 300px; max-width: 600px;padding: 0px;"></div>
                </div>
                <div id="column_chart" class="col-md-offset-1 col-md-5">
                    <div id="issue_state_column" style="min-width: 100px; height: 300px; max-width: 600px; padding: 0px;"></div>
                    <div id="issue_priority_column" style="min-width: 100px; height: 300px; max-width: 600px;padding: 0px;"></div>
                    <div id="project_member_column" style="min-width: 100px; height: 300px; max-width: 600px;padding: 0px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Highcharts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#pei_chart_button").click(function(){
                $("#pie_chart").toggle();
            });
            $("#column_chart_button").click(function(){
                $("#column_chart").toggle();
            });
        });
    </script>

    @include('Issue.state_pie_chart')
    @include('Issue.priority_pie_chart')
    @include('Issue.member_pie_chart')
    @include('Issue.state_column_chart')
    @include('Issue.priority_column_chart')
    @include('Issue.member_column_chart')
</body>
</html>