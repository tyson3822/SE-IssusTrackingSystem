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
    <link href="/css/app.css" rel="stylesheet">

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
                        <li class="active"><a>ProjectList</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/Setting')}}">Setting</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="{{url('/login')}}">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row col-md-offset-1">
            <h1 style="color: black;" class="col-md-8">Project List</h1>
            <div class="col-md-4">
                <form>
                    <button type="submit" class="btn btn-default col-md-4">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true">Create</span>
                    </button>
                </form>
                <form>
                    <button type="submit" class="btn btn-default col-md-4">
                        <span class="glyphicon glyphicon-minus-sign" aria-hidden="true">Close</span>
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
                    <div class="panel-heading">{{$project->subject}}</div>
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
    <script src="/js/app.js"></script>
</body>
</html>