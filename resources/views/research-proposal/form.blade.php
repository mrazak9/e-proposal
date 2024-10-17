<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->title }}" required>
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="research_group">Kelompok Skema Penelitian</label>
                    <input type="text" id="research_group" name="research_group"
                        class="form-control{{ $errors->has('research_group') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->research_group }}" required>
                    <div class="invalid-feedback">{{ $errors->first('research_group') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cluster_of_knowledge">Rumpun Ilmu</label>
                    <input type="text" id="cluster_of_knowledge" name="cluster_of_knowledge"
                        class="form-control{{ $errors->has('cluster_of_knowledge') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->cluster_of_knowledge }}" required>
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
                        value="{{ $researchProposal->location }}" required>
                    <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Usulan</label>
                    <input type="text" id="proposed_year" name="proposed_year"
                        class="form-control{{ $errors->has('proposed_year') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->proposed_year }}" required>
                    <div class="invalid-feedback">{{ $errors->first('proposed_year') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Pelaksanaan</label>
                    <input type="text" id="implementation_year" name="implementation_year"
                        class="form-control{{ $errors->has('implementation_year') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->implementation_year }}" required>
                    <div class="invalid-feedback">{{ $errors->first('implementation_year') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="length_of_activity">Tanggal Pelaksanaan</label>
                    <input type="date" id="length_of_activity" name="implementation_date"
                        class="form-control{{ $errors->has('implementation_date') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->implementation_date }}" required>
                    <div class="invalid-feedback">{{ $errors->first('implementation_date') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="length_of_activity">Lama Kegiatan (bulan)</label>
                    <input type="text" id="length_of_activity" name="length_of_activity"
                        class="form-control{{ $errors->has('length_of_activity') ? ' is-invalid' : '' }}"
                        value="{{ $researchProposal->length_of_activity }}" required>
                    <div class="invalid-feedback">{{ $errors->first('length_of_activity') }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="source_of_funds">Sumber Dana: </label>
                    <div class="form-check-inline">
                        <input type="radio" id="mandiri" name="source_of_funds" value="1"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $researchProposal->source_of_funds == 'Mandiri' ? 'checked' : '' }} required>
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
    </div>    
</div>
