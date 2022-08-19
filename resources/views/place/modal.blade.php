<div class="modal fade" id="placeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.places.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Place</h5>
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
                    <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>                   
                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-check"></i> Submit</button>                </div>
            </div>
        </form>
    </div>
</div>