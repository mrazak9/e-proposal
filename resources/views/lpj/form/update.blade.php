<div class="row">
    <input type="hidden" name="id" value="{{ $lpj->id }}">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Keberhasilan</label>
            <textarea class="form-control" name="keberhasilan" rows="5" required>{{ $lpj->keberhasilan }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Kendala</label>
            <textarea class="form-control" name="kendala" rows="5" required>{{ $lpj->kendala }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" rows="5" required>{{ $lpj->notes }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Link Lampiran*</label>
            <input type="text" class="form-control" name="link_lampiran" value="{{ $lpj->link_lampiran }}" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">link Dokumentasi Kegiatan*</label>
            <input type="text" class="form-control" name="link_dokumentasi_kegiatan"
                value="{{ $lpj->link_dokumentasi_kegiatan }}" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
