<div class="modal fade" id="penerimaanDanaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.fund.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Revisi</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diterima oleh</label>
                                <select class="form-control" name="user_id" required>
                                    <option value="" disabled selected>== Pilih Panitia ==</option>
                                    @foreach ($committee as $value)
                                        <option value="{{ $value->user_id }}">{{ $value->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pada Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jumlah Penerimaan</label>
                                <input type="number" name="nominal" class="form-control"
                                    max="{{ $sum_budget_receipt - $sum_funds }}" required>
                            </div>
                        </div>

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
