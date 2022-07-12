<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.planning.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Jadwal Perencanaan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <label>Nama Perencanaan</label>
                        <input type="text" class="form-control" name="kegiatan">
                        <label>PIC</label>
                        <select class="form-control" name="user_id">
                            <option value="" disabled selected>== Pilih Panitia ==</option>
                            @foreach ($student as $value => $key)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="date" placeholder="Tanggal Acara"
                        maxlength="10">
                        <label>Notes</label>
                        <input type="text" class="form-control" name="notes" value="-">
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