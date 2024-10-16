<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->title }}">
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="research_group">Kelompok Skema Penelitian</label>
                    <input type="text" id="research_group" name="research_group"
                        class="form-control{{ $errors->has('research_group') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->research_group }}">
                    <div class="invalid-feedback">{{ $errors->first('research_group') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cluster_of_knowledge">Rumpun Ilmu</label>
                    <input type="text" id="cluster_of_knowledge" name="cluster_of_knowledge"
                        class="form-control{{ $errors->has('cluster_of_knowledge') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->cluster_of_knowledge }}">
                    <div class="invalid-feedback">{{ $errors->first('cluster_of_knowledge') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type_of_skim">Jenis SKIM</label>
                    <select id="type_of_skim" name="type_of_skim"
                        class="form-select{{ $errors->has('type_of_skim') ? ' is-invalid' : '' }}" required>
                        <option disabled selected>== Pilih SKIM ==</option>
                        <option value="1"
                            {{ $researchProposal->type_of_skim == 'Digitalisasi Bisnis/Kewirausahaan' ? 'selected' : '' }}>
                            Digitalisasi Bisnis/Kewirausahaan</option>
                        <option value="2"
                            {{ $researchProposal->type_of_skim == 'Digitalisasi Akuntansi/Keuangan' ? 'selected' : '' }}>
                            Digitalisasi Akuntansi/Keuangan</option>
                        <option value="3"
                            {{ $researchProposal->type_of_skim == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi
                            Informasi</option>
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('type_of_skim') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location">Lokasi</label>
                    <input type="text" id="location" name="location"
                        class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->location }}">
                    <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Usulan</label>
                    <input type="text" id="proposed_year" name="proposed_year"
                        class="form-control{{ $errors->has('proposed_year') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->proposed_year }}">
                    <div class="invalid-feedback">{{ $errors->first('proposed_year') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Pelaksanaan</label>
                    <input type="text" id="implementation_year" name="implementation_year"
                        class="form-control{{ $errors->has('implementation_year') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->implementation_year }}">
                    <div class="invalid-feedback">{{ $errors->first('implementation_year') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="length_of_activity">Tanggal Pelaksanaan</label>
                    <input type="text" id="length_of_activity" name="implementation_date"
                        class="form-control{{ $errors->has('implementation_date') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->implementation_date }}">
                    <div class="invalid-feedback">{{ $errors->first('implementation_date') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="length_of_activity">Lama Kegiatan</label>
                    <input type="text" id="length_of_activity" name="length_of_activity"
                        class="form-control{{ $errors->has('length_of_activity') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->length_of_activity }}">
                    <div class="invalid-feedback">{{ $errors->first('length_of_activity') }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="source_of_funds">Sumber Dana: </label>
                    <div class="form-check-inline">
                        <input type="radio" id="mandiri" name="source_of_funds" value="1"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $researchProposal->source_of_funds == 'Mandiri' ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="mandiri">Mandiri</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="dikti" name="source_of_funds" value="2"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $researchProposal->source_of_funds == 'Dikti' ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="dikti">Dikti</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="perguruan_tinggi" name="source_of_funds" value="3"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $researchProposal->source_of_funds == 'Perguruan Tinggi' ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="perguruan_tinggi">Perguruan Tinggi</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="mitra" name="source_of_funds" value="4"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $researchProposal->source_of_funds == 'Mitra' ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="mitra">Mitra</label>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('source_of_funds') }}</div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="table-responsive">
                    <h2>Tambah Anggota Penelitian</h2>
                    <table class="table table-responsive" id="budgetTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Identitas</th>
                                <th>Tipe Identitas</th>
                                <th>Afiliasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><input type="text" class="form-control" name="namaAnggaran[]"></td>
                                <td><input type="number" class="form-control" name="kuantitas[]"></td>
                                <td><input type="number" class="form-control" name="harga[]"></td>
                                <td><input type="text" class="form-control" name="linkLampiran[]"></td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-xs"
                                        onclick="deleteRow(this)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-outline-success" onclick="addRow()">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
