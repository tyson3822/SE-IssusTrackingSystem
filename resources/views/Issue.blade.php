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

        <div class="row col-md-offset-1">
        	<h1 style="color: black;" class="col-md-3">{{$issue->title}}</h1><br>
        	<h3 class="col-md-offset-1 col-md-3">狀態 :　{{$issue->state}}</h3>
        	<h3 class="col-md-offset-1 col-md-3">重要性 : 
        	 	@if($issue->priority == 'low')
        	 		<label style="color:green;">{{$issue->priority}}</label>
        	 	@elseif($issue->priority == 'mid')
        	 		<label style="color:orange;">{{$issue->priority}}</label>
        		@elseif($issue->priority == 'high')
        	 		<label style="color:red;">{{$issue->priority}}</label>
        	 	@endif
        	</h3>
        </div>
    </div>
</body>
</html>