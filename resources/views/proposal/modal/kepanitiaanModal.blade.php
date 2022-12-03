<div class="modal fade" id="kepanitiaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.committee.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Kepanitiaan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                    <div class="form-group">
                        <label>Nama Panitia</label>
                        <select class="form-control" name="user_id">
                            <option value="" disabled selected>== Pilih Panitia ==</option>
                            @foreach ($user as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Posisi</label>
                        <select class="form-control" name="position">
                            <option value="" disabled selected>== Pilih Peran Panitia ==</option>
                            @foreach ($committeeRoles as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach

                        </select>
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
