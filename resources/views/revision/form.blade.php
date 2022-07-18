<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proposal_id') }}
            {{ Form::text('proposal_id', $revision->proposal_id, ['class' => 'form-control' . ($errors->has('proposal_id') ? ' is-invalid' : ''), 'placeholder' => 'Proposal Id']) }}
            {!! $errors->first('proposal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $revision->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('revision') }}
            {{ Form::text('revision', $revision->revision, ['class' => 'form-control' . ($errors->has('revision') ? ' is-invalid' : ''), 'placeholder' => 'Revision']) }}
            {!! $errors->first('revision', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $revision->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>