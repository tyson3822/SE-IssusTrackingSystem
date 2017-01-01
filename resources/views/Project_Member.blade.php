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
    <style id="my-search">
        .wrap:not([data-index*=""]){
            display: none;
        }
    </style>

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
                    <li><a href="{{route('project_list')}}">專案</a></li>
                    <li class="active"><a href="{{route('issue_list',['project_id' => $project->id])}}">議題</a></li>
                    @include('layouts.AccountList_navbar')
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('setting')}}">設定</a></li>
                    <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                    <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a></li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <h1 class="col-md-offset-2 col-md-2" style="margin-top: 0px;">專案成員</h1>
        @include('Project_Member.search_member')
        @include('Project_Member.Add_member')
    </div>
    @include('Project_Member.project_manager')
    @include('Project_Member.project_developer')
    @include('Project_Member.project_tester')
    @include('Project_Member.project_general')

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Scripts -->
    <!--<script src="/js/app.js"></script>-->
    <script type="text/javascript">
        var that = $(this);
        var mSearch = $("#my-search");
        $("#search-input").bind("change paste keyup", function(){
            var value = $(this).val();
            if (!value) {
                mSearch.html("");
                return;
            }
            mSearch.html('.wrap:not([data-index*="' + value.toLowerCase() + '"]) {display: none;}');
        });
    </script>
    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>

</body>
</html>