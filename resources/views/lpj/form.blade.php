<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proposal_id') }}
            {{ Form::text('proposal_id', $lpj->proposal_id, ['class' => 'form-control' . ($errors->has('proposal_id') ? ' is-invalid' : ''), 'placeholder' => 'Proposal Id']) }}
            {!! $errors->first('proposal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keberhasilan') }}
            {{ Form::text('keberhasilan', $lpj->keberhasilan, ['class' => 'form-control' . ($errors->has('keberhasilan') ? ' is-invalid' : ''), 'placeholder' => 'Keberhasilan']) }}
            {!! $errors->first('keberhasilan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('kendala') }}
            {{ Form::text('kendala', $lpj->kendala, ['class' => 'form-control' . ($errors->has('kendala') ? ' is-invalid' : ''), 'placeholder' => 'Kendala']) }}
            {!! $errors->first('kendala', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('notes') }}
            {{ Form::text('notes', $lpj->notes, ['class' => 'form-control' . ($errors->has('notes') ? ' is-invalid' : ''), 'placeholder' => 'Notes']) }}
            {!! $errors->first('notes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('link_lampiran') }}
            {{ Form::text('link_lampiran', $lpj->link_lampiran, ['class' => 'form-control' . ($errors->has('link_lampiran') ? ' is-invalid' : ''), 'placeholder' => 'Link Lampiran']) }}
            {!! $errors->first('link_lampiran', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('link_dokumentasi_kegiatan') }}
            {{ Form::text('link_dokumentasi_kegiatan', $lpj->link_dokumentasi_kegiatan, ['class' => 'form-control' . ($errors->has('link_dokumentasi_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Link Dokumentasi Kegiatan']) }}
            {!! $errors->first('link_dokumentasi_kegiatan', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>