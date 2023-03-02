<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lpj_id') }}
            {{ Form::text('lpj_id', $lpjRevision->lpj_id, ['class' => 'form-control' . ($errors->has('lpj_id') ? ' is-invalid' : ''), 'placeholder' => 'Lpj Id']) }}
            {!! $errors->first('lpj_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $lpjRevision->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('revision') }}
            {{ Form::text('revision', $lpjRevision->revision, ['class' => 'form-control' . ($errors->has('revision') ? ' is-invalid' : ''), 'placeholder' => 'Revision']) }}
            {!! $errors->first('revision', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('isDone') }}
            {{ Form::text('isDone', $lpjRevision->isDone, ['class' => 'form-control' . ($errors->has('isDone') ? ' is-invalid' : ''), 'placeholder' => 'Isdone']) }}
            {!! $errors->first('isDone', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>