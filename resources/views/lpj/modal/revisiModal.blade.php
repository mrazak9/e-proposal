<div class="modal fade" id="revisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj_revision.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Revisi</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $lpj->id }}" name="lpj_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                        <label>Revisi</label>
                        <textarea class="form-control" name="revision" rows="3" required> </textarea>
                        <input type="hidden" value="0" name="isDone">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
