<div class="col-md-offset-2">
    <form class="form-horizontal col-md-8" method="POST" action="{{ route('Change_user_auth') }}" style="padding: 0px">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <img src="person.png" class="img-circle">
        <label class="col-md-offset-1">{{$every_user->name}}</label>
        <select class="selectpicker col-md-offset-1" style="width:30%" name="access">
            <option value="admin">系統管理者</option>
            <option value="user" selected="selected">系統成員</option>
        </select>
        <button type="submit" class="btn btn-primary col-md-offset-3" style="margin-left: 7%">儲存</button>
    </form>
    <form class="col-md-2" method="POST" action="{{ route('Delete_user',['user_id' => $every_user->id]) }}" style="padding: 0px;margin-top: 4px">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger col-md-offset-1">刪除</button>
    </form>
</div>