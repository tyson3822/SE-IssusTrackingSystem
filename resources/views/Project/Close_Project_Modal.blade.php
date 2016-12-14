<!-- Close Project Modal -->
<div class="modal fade" id="CloseProjectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Close Project</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/Close_Project/{project->id}') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <p>你想關掉
                        <label name="project"></label>
                        這個專案嗎?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>