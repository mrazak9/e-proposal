<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="place_of_birth"
                        value="{{ $lppmUser->place_of_birth ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Tanggal, bulan, dan Tahun Lahir</label>
                    <input type="date" class="form-control" name="date_of_birth"
                        value="{{ $lppmUser->date_of_birth ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nomor Handphone</label>
                    <input type="tel" class="form-control" name="handphone" id="handphone" maxlength="15"
                        placeholder="+62" value="{{ $lppmUser->handphone ?? '' }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Departemen/Prodi</label>
                    <select class="form-select" name="department_id" required>
                        <option disabled selected>== Pilih Departemen/Prodi ==</option>
                        @foreach ($departments as $value => $key)
                            @if (!empty($key))
                                <option value="{{ $key }}"
                                    {{ $lppmUser->department_id == $key ? 'selected' : '' }}>{{ $value }}
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="form-control" name="nik" value="{{ $lppmUser->nik ?? '' }}" maxlength="16" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">NIP/NIDN</label>
                    <input type="text" class="form-control" value="{{ $lppmUser->nidn ?? '' }}" name="nidn" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Afiliasi/Institusi</label>
                    <input type="text" class="form-control" value="{{ $lppmUser->affiliation ?? '' }}" name="affiliation" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Status Dosen</label>
                    <select class="form-select" name="status" required>
                        <option disabled selected>== Pilih Status ==</option>
                        <option value="1" {{ $lppmUser->status == 1 ? 'selected' : '' }}>Dosen Tetap</option>
                        <option value="2" {{ $lppmUser->status == 2 ? 'selected' : '' }}>Dosen LB</option>
                    </select>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Jabatan Fungsional</label>
                    <select class="form-select" name="academic_grade_id" required>
                        <option disabled selected>== Pilih Jabatan ==</option>
                        <option value="1" {{ $lppmUser->academic_grade_id == 1 ? 'selected' : '' }}>Tenaga Pengajar</option>
                        <option value="2" {{ $lppmUser->academic_grade_id == 2 ? 'selected' : '' }}>Asisten Akhli</option>
                        <option value="3" {{ $lppmUser->academic_grade_id == 3 ? 'selected' : '' }}>Lektor</option>
                        <option value="4" {{ $lppmUser->academic_grade_id == 4 ? 'selected' : '' }}>Lektor Kepala</option>
                        <option value="5" {{ $lppmUser->academic_grade_id == 5 ? 'selected' : '' }}>Guru Besar</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Golongan/Pangkat</label>
                    <select class="form-select" name="group_of_work_id" required>
                        <option disabled selected>== Pilih Golongan/Pangkat ==</option>
                        <option value="1" {{ $lppmUser->group_of_work_id == 1 ? 'selected' : '' }}>IIIa</option>
                        <option value="2" {{ $lppmUser->group_of_work_id == 2 ? 'selected' : '' }}>IIIb</option>
                        <option value="3" {{ $lppmUser->group_of_work_id == 3 ? 'selected' : '' }}>IIIc</option>
                        <option value="4" {{ $lppmUser->group_of_work_id == 4 ? 'selected' : '' }}>IIId</option>
                        <option value="5" {{ $lppmUser->group_of_work_id == 5 ? 'selected' : '' }}>IVa</option>
                        <option value="6" {{ $lppmUser->group_of_work_id == 6 ? 'selected' : '' }}>IVb</option>
                        <option value="7" {{ $lppmUser->group_of_work_id == 7 ? 'selected' : '' }}>IVc</option>
                        <option value="8" {{ $lppmUser->group_of_work_id == 8 ? 'selected' : '' }}>IVd</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Google Scholar URL</label>
                    <input type="text" class="form-control" value="{{ $lppmUser->google_scholar_url ?? '' }}" name="google_scholar_url" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Scopus ID</label>
                    <input type="text" class="form-control" value="{{ $lppmUser->scopus_id ?? '' }}" name="scopus_id" placeholder="kosongkan jika tidak ada">
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
