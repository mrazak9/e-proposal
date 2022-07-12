<div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.budgetexpenditure.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengeluaran Anggaran</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <label>Nama Anggaran</label>
                        <input type="text" class="form-control" name="name" required>
                        <label>Qty</label>
                        <input type="number" class="form-control" min="0" name="qty" required>
                        <label>Price</label>
                        <input type="number" class="form-control" min="0" name="price" required>
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