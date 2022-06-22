<div class="modal fade" id="employeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>User ID</label>
                        <input class="form-control" type="text" name="user_id" required>
                        <label>NIP</label>
                        <input class="form-control" type="text" name="nip" required>
                        <label>Department</label>
                        <input class="form-control" type="text" name="department" required>
                        <label>Position</label>
                        <input class="form-control" type="text" name="position" required>
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