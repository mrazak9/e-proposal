<div class="row">
    <input type="hidden" name="proposal_id" value="{{ $proposal_id }}">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Keberhasilan</label>
            <textarea class="form-control" name="keberhasilan" id="" rows="5" required></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Kendala</label>
            <textarea class="form-control" name="kendala" id="" rows="5" required></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" id="" rows="5" required></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Link Lampiran*</label>
            <input type="text" class="form-control" name="link_lampiran" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">link Dokumentasi Kegiatan*</label>
            <input type="text" class="form-control" name="link_dokumentasi_kegiatan" required>
            <small class="text-danger">
                Lampirkan link lampiran dari google drive
            </small>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
