<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $student->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nim') }}
            {{ Form::text('nim', $student->nim, ['class' => 'form-control' . ($errors->has('nim') ? ' is-invalid' : ''), 'placeholder' => 'Nim']) }}
            {!! $errors->first('nim', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prodi') }}
            {{ Form::text('prodi', $student->prodi, ['class' => 'form-control' . ($errors->has('prodi') ? ' is-invalid' : ''), 'placeholder' => 'Prodi']) }}
            {!! $errors->first('prodi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('kelas') }}
            {{ Form::text('kelas', $student->kelas, ['class' => 'form-control' . ($errors->has('kelas') ? ' is-invalid' : ''), 'placeholder' => 'Kelas']) }}
            {!! $errors->first('kelas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('organization_id') }}
            {{ Form::text('organization_id', $student->organization_id, ['class' => 'form-control' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => 'Organization Id']) }}
            {!! $errors->first('organization_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position') }}
            {{ Form::text('position', $student->position, ['class' => 'form-control' . ($errors->has('position') ? ' is-invalid' : ''), 'placeholder' => 'Position']) }}
            {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>