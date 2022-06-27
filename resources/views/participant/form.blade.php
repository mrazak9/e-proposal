<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proposal_id') }}
            {{ Form::text('proposal_id', $participant->proposal_id, ['class' => 'form-control' . ($errors->has('proposal_id') ? ' is-invalid' : ''), 'placeholder' => 'Proposal Id']) }}
            {!! $errors->first('proposal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('participant_type_id') }}
            {{ Form::text('participant_type_id', $participant->participant_type_id, ['class' => 'form-control' . ($errors->has('participant_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Participant Type Id']) }}
            {!! $errors->first('participant_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('participant_total') }}
            {{ Form::text('participant_total', $participant->participant_total, ['class' => 'form-control' . ($errors->has('participant_total') ? ' is-invalid' : ''), 'placeholder' => 'Participant Total']) }}
            {!! $errors->first('participant_total', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>