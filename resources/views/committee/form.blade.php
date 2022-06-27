<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proposal_id') }}
            {{ Form::text('proposal_id', $committee->proposal_id, ['class' => 'form-control' . ($errors->has('proposal_id') ? ' is-invalid' : ''), 'placeholder' => 'Proposal Id']) }}
            {!! $errors->first('proposal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $committee->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position') }}
            {{ Form::text('position', $committee->position, ['class' => 'form-control' . ($errors->has('position') ? ' is-invalid' : ''), 'placeholder' => 'Position']) }}
            {!! $errors->first('position', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>