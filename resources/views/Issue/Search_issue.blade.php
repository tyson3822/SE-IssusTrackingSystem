<div class="col-md-4">
    <form class="form-horizontal" method="POST" action="{{ route('Search_issue',['project_id' => $project->id]) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control col-md-2" type="text" name="issue_name" placeholder="輸入議題名字" style="width: 50%;margin-left: 15px;"> 
            <button type="submit" class="col-md-offset-1 btn btn-default">
                <span class="glyphicon glyphicon-search"></span>搜尋
            </button>
        </div>
    </form>
</div>