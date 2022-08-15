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
                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                    <div class="form-group">
                        <label>Nama Panitia</label>                        
                            <select class="form-control" name="user_id">
                                <option value="" disabled selected>== Pilih Panitia ==</option>
                                @foreach ($user as $value => $key)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        <label>Posisi</label>
                        <select class="form-control" name="position">
                            <option value="" disabled selected>== Pilih Peran Panitia ==</option>
                            <option value="Acara">Acara</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                            <option value="Konsumsi">Konsumsi</option>
                            <option value="Logistik">Logistik</option>
                            <option value="Penanggung Jawab">Penanggung Jawab</option>
                            <option value="Publikasi dan Dokumentasi">Publikasi dan Dokumentasi</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                        </select>
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
