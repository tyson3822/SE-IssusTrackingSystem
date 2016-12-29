<!-- Add Issue Modal -->
<div class="modal fade" id="AddIssueModal" tabindex="-1" role="dialog" aria-labelledby="IssueModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Issue</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('Add_issue',['project_id' => $project->id]) }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align: left;">Issue Title : </label>
                        <input class="form-control" style="width:60%" type="text" name="title">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align: left;">Priority : </label>
                        <select name="priority" style="width:12%; padding-top: 10px;">
                            <option value="High" style="color:red;">High</option>
                            <option value="Mid" style="color:orange;">Mid</option>
                            <option value="Low" style="color:green;">Low</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align: left;">Issue Descript : </label>
                        <textarea class="form-control" rows="4" name="description" style="width: 95%;margin-left: 13px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>