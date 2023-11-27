<div class="row">
    <input type="hidden" name="id" value="{{ $lpj->id }}">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Keberhasilan</label>
            <textarea class="form-control" name="keberhasilan" rows="5" id="tinymce">{{ $lpj->keberhasilan }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Kendala</label>
            <textarea class="form-control" name="kendala" rows="5" id="tinymce">{{ $lpj->kendala }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" rows="5" id="tinymce">{{ $lpj->notes }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Link Lampiran*</label>
            <a class="btn btn-sm btn-info" href="{{ $lpj->link_lampiran }}" target="_blank"><i
                    class="fas fa-file-alt"></i></a><input type="text" class="form-control" name="link_lampiran"
                value="{{ $lpj->link_lampiran }}" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>

        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">link Dokumentasi Kegiatan*</label>
            <a class="btn btn-sm btn-success" href="{{ $lpj->link_dokumentasi_kegiatan }}" target="_blank"><i
                    class="fas fa-camera"></i></a>
            <input type="text" class="form-control" name="link_dokumentasi_kegiatan"
                value="{{ $lpj->link_dokumentasi_kegiatan }}" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>

        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">
                Link LPJ Proposal GDrive*
            </label>
            <input type="text" class="form-control" name="attachment" value="{{ $lpj->attachment }}"
                placeholder="link masih kosong">
        </div>
        <div class="alert alert-info text-white" role="alert">
            <strong><i class="fas fa-info-circle"></i> Lampiran Link LPJ Proposal PDF utuh</strong><br>
            @if ($lpj->attachment == null)
                <a class="btn btn-danger" href="#">
                    <i class="fas fa-times-circle    "></i> LPJ Proposal masih kosong
                </a>
            @else
                <a class="btn btn-warning" href="{{ $lpj->attachment }}" target="_blank">
                    <i class="fas fa-download"></i> Unduh LPJ Proposal
                </a>
            @endif


        </div>
    </div>
</div>
@can('PANITIA_UPDATE_PROPOSAL')
    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
@endcan
