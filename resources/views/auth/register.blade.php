@extends('layouts.welcome_navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p class="text-align:center"><strong><h1>If you join us</h1></strong></p>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label class="control-label" style="font-size:18px;color:#636b6f">Sign Up</label>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-offset-1 control-label">User Name</label>

                            <div class="col-md-offset-1">
                                <input id="name" type="text" class="form-control" style="width:90%" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-offset-1 control-label">E-Mail Address</label>

                            <div class="col-md-offset-1">
                                <input id="email" type="email" class="form-control" style="width:90%" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-offset-1 control-label">Password</label>

                            <div class="col-md-offset-1">
                                <input id="password" type="password" class="form-control" style="width:90%" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-offset-1 control-label">Confirm Password</label>

                            <div class="col-md-offset-1">
                                <input id="password-confirm" type="password" class="form-control" style="width:90%" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
