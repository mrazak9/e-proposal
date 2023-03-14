<div class="modal fade" id="dopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.dops.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengajuan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kategori</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="dopradio" name="note"
                                onclick="javascript:activedop();" value="DOP" required>
                            <label class="form-check-label">DOP Bulanan Rutin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pelatihradio" name="note"
                                onclick="javascript:activedop();" value="PENGAJUAN PELATIH" required>
                            <label class="form-check-label">Pengajuan Pelatih</label>
                        </div>
                    </div>
                    <div id="dopdiv" class="form-group" style="display: none">
                        <label>Jumlah</label>
                        <input class="form-control" id="dopamount" type="number" value="100000" name="amount"
                            readonly>
                    </div>
                    <div id="pelatihdiv" class="form-group" style="display: none">
                        <label>Jumlah</label>
                        <input class="form-control" id="pelatihamount" type="number" min="0" value="500000"
                            name="amount">
                        <small class="text-danger">*update nominal, jika ada perubahan</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
