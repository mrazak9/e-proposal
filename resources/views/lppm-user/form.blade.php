<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nomor Handphone</label>
                    <input type="tel" class="form-control" name="handphone" id="handphone" maxlength="15" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Departemen/Prodi</label>
                    <select class="form-select" name="department_id" required>
                        <option disabled selected>== Pilih Departemen/Prodi ==</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="form-control" name="nik" maxlength="16" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">NIP/NIDN</label>
                    <input type="text" class="form-control" name="nidn" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Afiliasi/Institusi</label>
                    <input type="text" class="form-control" name="affiliation" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status Dosen</label>
                    <select class="form-select" name="status" required>
                        <option disabled selected>== Pilih Status ==</option>
                        <option value="1">Dosen Tetap</option>
                        <option value="2">Dosen LB</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Jabatan Fungsional</label>
                    <select class="form-select" name="academic_grade_id" required>
                        <option disabled selected>== Pilih Jabatan ==</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Golongan/Pangkat</label>
                    <select class="form-select" name="group_of_work_id" required>
                        <option disabled selected>== Pilih Golongan/Pangkat ==</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Google Scholar URL</label>
                    <input type="text" class="form-control" name="google_scholar_url" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Scopus ID</label>
                    <input type="text" class="form-control" name="scopus_id" placeholder="kosongkan jika tidak ada">
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Submit
        </button>
    </div>
</div>
