<!-- Add User Modal-->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新增使用者</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('Add_user') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label for="name" class="control-label">使用者名稱</label>
                    <input id="name" type="text" class="form-control" style="width:90%" name="name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                    <label for="email" class="control-label">E-Mail地址</label>
                    <input id="email" type="email" class="form-control" style="width:90%" name="email" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <label for="password" class="control-label">密碼</label>
                    <input id="password" type="password" class="form-control" style="width:90%" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <label for="password-confirm" class="control-label">再輸入一次密碼</label>
                    <input id="password-confirm" type="password" class="form-control" style="width:90%" name="password_confirmation" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">確定</button>
                </div> 
            </form>
        </div>
    </div>
</div>