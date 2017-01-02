<div class="col-md-4">
    <div class="panel panel-info" style="padding-left: 0px;padding-right: 0px;">
        <div class="panel-heading">
            <div class="panel-title clearfix">
                <div class="pull-left">
                    {{$project->subject}}
                </div>
                @if($project->pivot['user_auth'] == 'manager' and $project->state == "normal")
                    <!--<button type="button" class="close" data-toggle="modal" data-target="#CloseProjectModal" data-project_name="{{$project->subject}}">&times;</button>-->

                    <form method="POST" action="{{ route('Close_Project',$project->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="close" style="margin-left: 5px;">&times;</button>
                    </form>
                @endif

                <form method="GET" action="{{ url('/project',['project_id' =>$project->id]) }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default btn-sm pull-right" style="padding: 4px;">Go</button>
                </form>
            </div>
        </div>
        <div class="panel-body">
            @if(count($project->issues) > 4)
                @for($index = 0; $index < 4; $index++)
                    <img src="simple_issue.png" class="col-md-offset-1">
                @endfor
            @else
                @foreach($project->issues as $issue)
                    <img src="simple_issue.png" class="col-md-offset-1">
                @endforeach
            @endif
        </div>
    </div>
</div>