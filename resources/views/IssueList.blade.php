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
   <!-- Add Issue Modal -->
    <div class="modal fade" id="AddIssueModal" tabindex="-1" role="dialog" aria-labelledby="IssueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Issue</h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="/Add_Issue">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label class="control-label col-md-3" style="text-align: left;">Issue Title : </label>
                        <input class="form-control" style="width:60%" type="text" name="Issue_name">
                        <label class="control-label col-md-4" style="text-align: left;">Priority : </label>
                    <!--
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        Extra small button <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                          </ul>
                    </div>
                    -->
                    

                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            High
                                <span class="caret"></span>
                            </button>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                          </ul>
                        </div>


                        <label class="control-label col-md-4" style="text-align: left;">Issue Descript : </label>
                        <textarea class="form-control" rows="4" name="descript"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Close Issue Modal -->
    <div class="modal fade" id="CloseIssueModal" tabindex="-1" role="dialog" aria-labelledby="IssueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Close Issue</h4>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="/Create_Issue">
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

                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('project_list')}}">專案</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a>議題</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('setting')}}">Setting</a></li>
                        <li><label class="navbar-text" style="margin-bottom:0px">{{$user->name}}</label></li>
                        <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="row col-md-offset-1">
            <h1 style="color: black;" class="col-md-8">Project Name</h1>
            <div class="col-md-4">
                <form>
                    <button type="button" class="btn btn-default col-md-4 " data-toggle="modal" data-target="#AddIssueModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>Add Issue
                    </button>
                </form>
                <form>
                    <button type="button" class="btn btn-default col-md-4" data-toggle="modal" data-target="#CloseIssueModal">
                        <span class="glyphicon glyphicon-minus-sign"></span>Close Issue
                    </button>
                </form>
            </div>
        </div>

        <div class="row col-md-offset-1 col-md-10">
            <?php
                $index = 0;
            ?>
            <a href="{{ route('project_member',['project_id' => $project->id]) }}">project member</a>
        </div>




    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>