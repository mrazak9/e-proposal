<div class="row">
    <input type="hidden" name="proposal_id" value="{{ $proposal_id }}">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Keberhasilan</label>
            <textarea class="form-control" name="keberhasilan" rows="5" id="tinymce"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Kendala</label>
            <textarea class="form-control" name="kendala" rows="5" id="tinymce"></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" rows="5" id="tinymce"></textarea>
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
    <div class="col-md-12">
        <div class="alert alert-info text-white" role="alert">
            <strong><i class="fas fa-info-circle"></i> Lampirkan Link LPJ Proposal PDF utuh dari Google
                Drive</strong> Unduh template dibawah ini <br>
            <a class="btn btn-warning"
                href="https://docs.google.com/document/d/1CuvOdqwo19yLiTtMDOSjW7JEiylqY7XC/edit?usp=sharing&ouid=118328583475198669663&rtpof=true&sd=true"
                target="_blank">
                <i class="fas fa-file-word"></i> Unduh Template
            </a>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Link LPJ Proposal GDrive*
            </label>
            <input type="text" class="form-control" name="attachment" placeholder="https://..." required>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Submit</button>
