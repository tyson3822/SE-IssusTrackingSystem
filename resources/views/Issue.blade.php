<!DOCTYPE html>
<html>
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
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">ITS</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    	<li><a class="navbar-brand" href="{{route('project_list')}}">專案</a></li>
                        <li class="active"><a href="{{ route('issue_list',['project_id' => $issue->project->id]) }}">議題</a></li>
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

        <div class="row col-md-offset-1 col-md-10">
            <form method="POST" action="{{ route('Change_issue_info') }}">
                {{ csrf_field() }}
                <div>
                    <h1 style="color: black;" class="col-md-3">{{$issue->title}}</h1>
                    @if($issue->user->id == $user->id)
                        <button id="edit_button" type="button" class="btn btn-default col-md-4">
                            <span class="glyphicon glyphicon-pencil">編輯
                        </button>
                    @endif
                    <h2 class="col-md-offset-1 col-md-3">重要性 : 
                        @if($issue->priority == 'low')
                            <label id="priority" style="color:green;">{{$issue->priority}}</label>
                        @elseif($issue->priority == 'mid')
                            <label id="priority" style="color:orange;">{{$issue->priority}}</label>
                        @elseif($issue->priority == 'high')
                            <label id="priority" style="color:red;">{{$issue->priority}}</label>
                        @endif
                        <select id="edit_priority" name="issue_priority" style="display: none;">
                            <option value="high" style="color: red">High</option>
                            <option value="mid" style="color: orange">Mid</option>
                            <option value="low" style="color: green">Low</option>
                        </select>
                    </h2>
                    <h2 class="col-md-offset-1 col-md-3">狀態 :　
                        <label id="state">{{$issue->state}}</label>
                        <select id="edit_state" style="display: none;">
                            <option value="ready">ready</option>
                            <option value="doing">doing</option>
                            <option value="close">close</option>
                        </select>
                    </h2>
                </div>

                <div class="content">
                    <h3 class="col-md-6">建立日期 : </h3>
                    <h3 class="col-md-6">指派日期 : </h3>
                    <h3>負責人 : 
                        <label id="owner">{{$issue->user->name}}</label>
                    </h3>
                    <h3>最後更新日期 : </h3>
                    <h3>描述 : </h3>
                    <p id="description" style="border-style:ridge; border-radius:10px">{{$issue->description}}</p>
                    <textarea id="edit_description" name="issue_description" class="form-control" style="display: none"></textarea>

                    <div id="logs">
                        @foreach($issue->logs as $log)
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">更新日期 : </h3>
                                </div>
                                <div class="panel-body">
                                    <p>{{$issue->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button id="save_button" type="submit" class="btn btn-primary col-md-3" style="display: none;">儲存</button>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#edit_button").click(funtion(){
                $("#edit_button").css("display","none");
                $("#priority").css("display","none");
                $("#edit_priority").css("display","inline");
                $("#state").css("display","none");
                $("#edit_state").css("display","inline");
                $("#owner").css("display","none");
                $("#edit_owner").css("display","inline");
                $("#description").css("display","none");
                $("#edit_description").css("display","inline");
                $("#logs").css("display","none");
                $("#save_button").css("display","inline");
            });
        });
    </script>

</body>
</html>