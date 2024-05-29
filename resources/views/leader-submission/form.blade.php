<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('previous_leader_id') }}
            {{ Form::text('previous_leader_id', $leaderSubmission->previous_leader_id, ['class' => 'form-control' . ($errors->has('previous_leader_id') ? ' is-invalid' : ''), 'placeholder' => 'Previous Leader Id']) }}
            {!! $errors->first('previous_leader_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $leaderSubmission->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_Approved') }}
            {{ Form::text('is_Approved', $leaderSubmission->is_Approved, ['class' => 'form-control' . ($errors->has('is_Approved') ? ' is-invalid' : ''), 'placeholder' => 'Is Approved']) }}
            {!! $errors->first('is_Approved', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>