<!-- Create Project Modal -->
<div class="modal fade" id="CreateProjectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Project</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="/Create_Project">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label class="control-label col-md-3" style="text-align: left;">Project Title : </label>
                    <input class="form-control" style="width:60%" type="text" name="subject">
                    <label class="control-label col-md-4" style="text-align: left;">Project Description : </label>
                    <textarea class="form-control" rows="4" name="description"></textarea>
                    
                    <div>
                        <label>visible : </label>
                        <label>
                            private
                            <input type="radio" name="visible" value="private" checked>
                        </label>
                        <label>
                            public
                            <input type="radio" name="visible" value="public">
                        </label>
                    </div>
                    <div>
                        <label>state : </label>
                        <label>
                            normal
                            <input type="radio" name="state" value="normal" checked>
                        </label>
                        <label>
                            close
                            <input type="radio" name="state" value="close">
                        </label>
                        <label>
                            disable
                            <input type="radio" name="state" value="disable">
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>