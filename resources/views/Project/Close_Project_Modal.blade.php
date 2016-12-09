<!-- Close Project Modal -->
<div class="modal fade" id="CloseProjectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Project</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="/Create_Project">
                {{ csrf_field() }}
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>