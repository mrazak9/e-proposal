<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label>User ID</label>
            <div class="mb-3">
              <select class="form-control" name="user_id" required>
                <option value="{{ $student->user_id }}" selected>{{ $student->user->name }}</option>
                @foreach ($users as $value => $key )
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            <label>NIM</label>
            <input class="form-control" type="number" min="0" minlength="7" name="nim" value="{{ $student->nim }}">
            <label>Prodi</label>
            <div class="mb-3">
              <select class="form-control" name="prodi" required>
                <option value="{{ $student->prodi }}" selected>{{ $student->prodi }}</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
                <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
              </select>
            </div>
            <label>Kelas</label>
            <input class="form-control" type="text" name="kelas" value="{{ $student->kelas }}">
            <label>Organization ID</label>
            <div class="mb-3">
                <select class="form-control" name="organization_id">
                  <option value="{{ $student->organization_id }}" selected>{{ $student->organization->name }}</option>
                  @foreach ($organizations as $value => $key )
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            <label>Position</label>
            <div class="mb-3">
              <select class="form-control" name="position">
                <option value="{{ $student->position }}" selected>{{ $student->position }}</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Koordinator">Koordinator</option>
                <option value="Anggota">Anggota</option>
              </select>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>