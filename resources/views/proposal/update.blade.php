<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Nama Proposal</label>
                    <input type="text" class="form-control" name="name" value="{{ $proposal->name }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Tema Kegiatan</label>
                    <input type="text" class="form-control" name="tema_kegiatan"
                        value="{{ $proposal->tema_kegiatan }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Tempat</label>
                    <select class="form-control" name="id_tempat" required>
                        <option value="{{ $proposal->id_tempat }}" selected>{{ $proposal->place->name }}</option>
                        @foreach ($place as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal" maxlength="10"
                        value="{{ $proposal->tanggal }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tanggal_selesai" maxlength="10"
                        value="{{ $proposal->tanggal_selesai }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Tujuan Kegiatan</label>
                    <textarea class="form-control" name="tujuan_kegiatan" rows="2" id="tinymce">{{ $proposal->tujuan_kegiatan }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Latar Belakang</label>
                    <textarea id="tinymce" class="form-control" name="latar_belakang" rows="5">{{ $proposal->latar_belakang }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Event</label>
                    <select class="form-control" name="id_kegiatan" required>
                        <option selected value="{{ $proposal->id_kegiatan }}">{{ $proposal->event->name }}</option>
                        @foreach ($event as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-info text-white" role="alert">
                    <strong><i class="fas fa-info-circle"></i> Lampirkan Link Proposal PDF utuh dari Google
                        Drive</strong> Unduh template dibawah ini <br>
                    <a class="btn btn-warning"
                        href="https://docs.google.com/document/d/1CuAuD1iCOcH4b4j-qp3414XHcgro1KTL/edit?usp=sharing&ouid=118328583475198669663&rtpof=true&sd=true"
                        target="_blank">
                        <i class="fas fa-file-word"></i> Unduh Template
                    </a>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Link Proposal GDrive
                    </label>
                    <input type="text" class="form-control" name="attachment" placeholder="https://..."
                        value="{{ $proposal->attachment }}">
                    <small class="form-text text-primary">
                        <a href="{{ $proposal->attachment }}" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Klik tautan ini
                        </a>
                    </small>
                </div>
            </div>
            <div class="col-md-12">
                @can('CREATE_PROPOSAL')
                    <button class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
                @endcan
                @if ($isKetua == '{"position":"Ketua Pelaksana"}')
                    <button class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
                @endif
            </div>

            </form>
        </div>
    </div>
