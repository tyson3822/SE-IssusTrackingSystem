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
            <div class="container">
                <div class="navbar-header">
                    <p class="navbar-brand">Welcome!</p>
                </dvi>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-align:center"><strong><h1>Issue Tracking System</h1></strong></p>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <label class="control-label" style="font-size:18px;color:#636b6f">Sign In</label>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">        
                                    <label for="email" class="col-md-4 control-label">User Name</label>
                                    <div class="col-md-offset-1">
                                        <input id="email" type="email" class="form-control" style="width:90%" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label" style="text-align:center">Password</label>

                                    <div class="col-md-offset-1">
                                        <input id="password" type="password" class="form-control" style="width:90%" name="password" required>
                                    </div>
                                </div>

                                @if ($errors->has('email') || $errors->has('password'))
                                    <div class="form-group">
                                        <div class="col-md-offset-1">
                                            <p style="font-size:18px;color:#FF0000">Wrong account or password!<br>Please try another</control-label>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="col-md-offset-1">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="border-bottom-width:1px;border-bottom-style:solid;border-color:#d3e0e9">
                                    <div class="col-md-offset-1">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                        <div class=row>
                                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-offset-1 control-label">New User</label>

                                    <div class="row col-md-offset-1">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
