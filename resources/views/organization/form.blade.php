<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $organization->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('singkatan') }}
            {{ Form::text('singkatan', $organization->singkatan, ['class' => 'form-control' . ($errors->has('singkatan') ? ' is-invalid' : ''), 'placeholder' => 'Singkatan']) }}
            {!! $errors->first('singkatan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $organization->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('head_organization') }}
            {{ Form::text('head_organization', $organization->head_organization, ['class' => 'form-control' . ($errors->has('head_organization') ? ' is-invalid' : ''), 'placeholder' => 'Head Organization']) }}
            {!! $errors->first('head_organization', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>