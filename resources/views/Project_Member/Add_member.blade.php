<div class="col-md-3">
	<form class="form-horizontal" method="POST" action="{{ route('Add_member',['project_id' => $project->id]) }}">
		{{ csrf_field() }}
		<div class="form-group">
			<input class="form-control col-md-4" type="text" name="email" placeholder="輸入email" style="width: 50%;margin-left: 15px;">	
			<button type="submit" class="col-md-offset-1 btn btn-default">
				<span class="glyphicon glyphicon-plus-sign"></span>新增此使用者
			</button>
		</div>
	</form>
</div>