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
