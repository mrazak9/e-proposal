<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->title }}" required>
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="research_group">Kelompok Skema Penelitian</label>
                    <input type="text" id="research_group" name="research_group"
                        class="form-control{{ $errors->has('research_group') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->research_group }}" required>
                    <div class="invalid-feedback">{{ $errors->first('research_group') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cluster_of_knowledge">Rumpun Ilmu</label>
                    <input type="text" id="cluster_of_knowledge" name="cluster_of_knowledge"
                        class="form-control{{ $errors->has('cluster_of_knowledge') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->cluster_of_knowledge }}" required>
                    <div class="invalid-feedback">{{ $errors->first('cluster_of_knowledge') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type_of_skim">Jenis SKIM</label>
                    <select id="type_of_skim" name="type_of_skim"
                        class="form-select{{ $errors->has('type_of_skim') ? ' is-invalid' : '' }}" required>
                        <option disabled {{ $dedicationProposal->type_of_skim == null ? 'selected' : '' }}>== Pilih SKIM ==
                        </option>
                        <option value="1" {{ $dedicationProposal->type_of_skim == 1 ? 'selected' : '' }}>
                            Digitalisasi Bisnis/Kewirausahaan</option>
                        <option value="2" {{ $dedicationProposal->type_of_skim == 2 ? 'selected' : '' }}>
                            Digitalisasi Akuntansi/Keuangan</option>
                        <option value="3" {{ $dedicationProposal->type_of_skim == 3 ? 'selected' : '' }}>Teknologi
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
                        value="{{ $dedicationProposal->location }}" required>
                    <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Usulan</label>
                    <input type="text" id="proposed_year" name="proposed_year"
                        class="form-control{{ $errors->has('proposed_year') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->proposed_year }}" min="1000" max="9999" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);" 
                        placeholder="Input 4-digit tahun" required>
                    <div class="invalid-feedback">{{ $errors->first('proposed_year') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="proposed_year">Tahun Pelaksanaan</label>
                    <input type="text" id="implementation_year" name="implementation_year"
                        class="form-control{{ $errors->has('implementation_year') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->implementation_year }}" min="0" max="9999" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);" 
                        placeholder="Input 4-digit tahun"  required>
                    <div class="invalid-feedback">{{ $errors->first('implementation_year') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="length_of_activity">Tanggal Pelaksanaan</label>
                    <input type="date" id="length_of_activity" name="implementation_date"
                        class="form-control{{ $errors->has('implementation_date') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->implementation_date }}" required>
                    <div class="invalid-feedback">{{ $errors->first('implementation_date') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="length_of_activity">Tanggal Berkahir</label>
                    <input type="date" id="length_of_activity" name="end_implementation_date"
                        class="form-control{{ $errors->has('end_implementation_date') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->end_implementation_date }}" required>
                    <div class="invalid-feedback">{{ $errors->first('end_implementation_date') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="length_of_activity">Lama Kegiatan (bulan)</label>
                    <input type="text" id="length_of_activity" name="length_of_activity"
                        class="form-control{{ $errors->has('length_of_activity') ? ' is-invalid' : '' }}"
                        value="{{ $dedicationProposal->length_of_activity }}" min="0" max="99" 
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);" 
                        placeholder="Input 2-digit bulan" required>
                    <div class="invalid-feedback">{{ $errors->first('length_of_activity') }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="source_of_funds">Sumber Dana: </label>
                    <div class="form-check-inline">
                        <input type="radio" id="mandiri" name="source_of_funds" value="1"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $dedicationProposal->source_of_funds == 1 ? 'checked' : '' }} required>
                        <label class="form-check-inline-label" for="mandiri">Mandiri</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="dikti" name="source_of_funds" value="2"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $dedicationProposal->source_of_funds == 2 ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="dikti">Dikti</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="perguruan_tinggi" name="source_of_funds" value="3"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $dedicationProposal->source_of_funds == 3 ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="perguruan_tinggi">Perguruan Tinggi</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" id="mitra" name="source_of_funds" value="4"
                            class="form-check-inline-input{{ $errors->has('source_of_funds') ? ' is-invalid' : '' }}"
                            {{ $dedicationProposal->source_of_funds == 4 ? 'checked' : '' }}>
                        <label class="form-check-inline-label" for="mitra">Mitra</label>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('source_of_funds') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
