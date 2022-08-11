<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="name" required>
                        <label>Notes</label>
                        <input class="form-control" type="text" name="notes" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i>Close</button>                   
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>