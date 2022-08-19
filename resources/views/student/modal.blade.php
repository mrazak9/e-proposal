<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.students.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Students</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>User ID</label>
                        <div class="mb-3">
                          <select class="form-control" name="user_id" required>
                            <option disabled selected>== Pilih Pengguna ==</option>
                            @foreach ($users as $value => $key )
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                        </div>
                        <label>NIM</label>
                        <input class="form-control" type="number" min="0" minlength="7" name="nim" required>
                        <label>Prodi</label>
                        <div class="mb-3">
                          <select class="form-control" name="prodi" required>
                            <option selected disabled>== Pilih Prodi ==</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                            <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                            <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                          </select>
                        </div>
                        <label>Kelas</label>
                        <input class="form-control" type="text" name="kelas" required>
                        <label>Organization ID</label>
                        <div class="mb-3">
                            <select class="form-control" name="organization_id" required>
                              <option disabled selected>== Pilih Organisasi ==</option>
                              @foreach ($organizations as $value => $key )
                              <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                            </select>
                          </div>
                        <label>Position</label>
                        <div class="mb-3">
                          <select class="form-control" name="position" required>
                            <option selected disabled>== Pilih Posisi ==</option>
                            <option value="Anggota">Anggota</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Lain-lain">Lain-lain</option>
                          </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>                   
                  <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-check"></i> Submit</button>                </div>
            </div>
        </form>
    </div>
</div>