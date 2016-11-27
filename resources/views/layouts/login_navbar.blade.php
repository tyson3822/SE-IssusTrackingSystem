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
                    <p class="navbar-text" style="margin-bottom:0px"><a class="navbar-link">ITS</a></p>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <p class="navbar-text" style="margin-bottom:0px">test</p>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text" style="margin-bottom:0px">Setting</p>
                        <p class="navbar-text" style="margin-bottom:0px">User Name</p>
                        <p class="navbar-text" style="margin-bottom:0px">Log Out</p>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>