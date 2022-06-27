<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $proposal->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('latar_belakang') }}
            {{ Form::text('latar_belakang', $proposal->latar_belakang, ['class' => 'form-control' . ($errors->has('latar_belakang') ? ' is-invalid' : ''), 'placeholder' => 'Latar Belakang']) }}
            {!! $errors->first('latar_belakang', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tujuan_kegiatan') }}
            {{ Form::text('tujuan_kegiatan', $proposal->tujuan_kegiatan, ['class' => 'form-control' . ($errors->has('tujuan_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Tujuan Kegiatan']) }}
            {!! $errors->first('tujuan_kegiatan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_tempat') }}
            {{ Form::text('id_tempat', $proposal->id_tempat, ['class' => 'form-control' . ($errors->has('id_tempat') ? ' is-invalid' : ''), 'placeholder' => 'Id Tempat']) }}
            {!! $errors->first('id_tempat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal') }}
            {{ Form::text('tanggal', $proposal->tanggal, ['class' => 'form-control' . ($errors->has('tanggal') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal']) }}
            {!! $errors->first('tanggal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_kegiatan') }}
            {{ Form::text('id_kegiatan', $proposal->id_kegiatan, ['class' => 'form-control' . ($errors->has('id_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Id Kegiatan']) }}
            {!! $errors->first('id_kegiatan', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>