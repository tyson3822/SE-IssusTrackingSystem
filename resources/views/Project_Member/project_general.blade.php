<div class="col-md-6 col-md-offset-2">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">一般人</h3>
    	</div>
    	<div class="panel-body">
        	@foreach($user->projects as $user_project)
        		@if($user_project->subject == $project->subject)
        			@if($user_project->pivot['user_auth'] == 'manager')
        				@foreach($members as $member)
        					@if($member->pivot['user_auth'] == 'general')
                                <div class="row" style="margin: 5px;">
                                    <label class="col-md-3" style="padding: 7px; margin: 0px;">{{$member->name}}</label>
                                    <form method="POST" action="{{ route('Change_project_member_auth',['project_id' => $project->id,'member_id' => $member->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <select class="selectpicker col-md-3" style="width:33%; padding: 7px;" name="user_auth">
                                            <option value="manager">Manager</option>
                                     		<option value="developer">Developer</option>
                                    		<option value="tester">Tester</option>
                                    		<option value="general" selected="selected">General User</option>
                                		</select>
                                		<button type="submit" class="btn btn-primary col-md-2 col-md-offset-1" style="margin-right: 2px">儲存</button>
                            		</form>
                            		<form method="POST" action="{{ route('Delete_project_member',['project_id'=> $project->id,'member_id' => $member->id]) }}">
                                   		{{ csrf_field() }}
                                		{{ method_field('DELETE') }}
                                		<button type="button" class="btn btn-danger col-md-2">剔除</button>
                            		</form>
                                </div>
        					@endif
        				@endforeach
        			@else
        				@foreach($members as $member)
        					@if($member->pivot['user_auth'] == 'general')
        						<label class="col-md-3" style="padding: 7px; margin: 0px;">{{$member->name}}</label>
        						<label class="col-md-3" style="padding: 7px; margin: 0px;">General</label>
        					@endif
        				@endforeach
        			@endif
        			@break
        		@endif
        	@endforeach
    	</div>
	</div>
</div>