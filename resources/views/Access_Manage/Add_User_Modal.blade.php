<!-- Add User Modal-->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label for="name" class="control-label">User Name</label>
                    <input id="name" type="text" class="form-control" style="width:90%" name="name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                    <label for="email" class="control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" style="width:90%" name="email" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" style="width:90%" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" style="width:90%" name="password_confirmation" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div> 
            </form>
        </div>
    </div>
</div>