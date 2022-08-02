<div class="modal fade" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.revision.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Revisi</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        
                        <label>Revisi</label>
                        <input class="form-control" type="text" name="revision" required>
                        <input type="hidden" value="0" name="isDone">                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>