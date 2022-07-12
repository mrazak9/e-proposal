<div class="modal fade" id="pesertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.participant.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Peserta</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <label>Tipe Peserta</label>
                        <select class="form-control" name="participant_type_id" required>
                            <option selected>== Pilih Tipe Peserta ==</option>
                            @foreach ($participantType as $value => $key )
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <label>Total Peserta</label>
                        <input type="number" name='participant_total' min="0" class="form-control" required />
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