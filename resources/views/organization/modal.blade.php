<div class="modal fade" id="orgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.organizations.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Organization</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="name" required>
                        <label>Singkatan</label>
                        <input class="form-control" type="text" name="singkatan" required>
                        <label>Type</label>
                          <select class="form-control" name="type" required>
                            <option selected disabled>== Tipe Organisasi ==</option>
                            <option>BPM</option>
                            <option>BEM</option>
                            <option>HIMA</option>
                            <option>SUBHIMA</option>
                            <option>UKM</option>
                          </select>
                        <label>Head Organization</label>
                        <input class="form-control" type="text" name="head_organization" required>
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