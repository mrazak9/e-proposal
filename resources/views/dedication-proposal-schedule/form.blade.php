<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dedication_proposals_id') }}
            {{ Form::text('dedication_proposals_id', $dedicationProposalSchedule->dedication_proposals_id, ['class' => 'form-control' . ($errors->has('dedication_proposals_id') ? ' is-invalid' : ''), 'placeholder' => 'Dedication Proposals Id']) }}
            {!! $errors->first('dedication_proposals_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('year_at') }}
            {{ Form::text('year_at', $dedicationProposalSchedule->year_at, ['class' => 'form-control' . ($errors->has('year_at') ? ' is-invalid' : ''), 'placeholder' => 'Year At']) }}
            {!! $errors->first('year_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('event_name') }}
            {{ Form::text('event_name', $dedicationProposalSchedule->event_name, ['class' => 'form-control' . ($errors->has('event_name') ? ' is-invalid' : ''), 'placeholder' => 'Event Name']) }}
            {!! $errors->first('event_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('1') }}
            {{ Form::text('1', $dedicationProposalSchedule->1, ['class' => 'form-control' . ($errors->has('1') ? ' is-invalid' : ''), 'placeholder' => '1']) }}
            {!! $errors->first('1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('2') }}
            {{ Form::text('2', $dedicationProposalSchedule->2, ['class' => 'form-control' . ($errors->has('2') ? ' is-invalid' : ''), 'placeholder' => '2']) }}
            {!! $errors->first('2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('3') }}
            {{ Form::text('3', $dedicationProposalSchedule->3, ['class' => 'form-control' . ($errors->has('3') ? ' is-invalid' : ''), 'placeholder' => '3']) }}
            {!! $errors->first('3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('4') }}
            {{ Form::text('4', $dedicationProposalSchedule->4, ['class' => 'form-control' . ($errors->has('4') ? ' is-invalid' : ''), 'placeholder' => '4']) }}
            {!! $errors->first('4', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('5') }}
            {{ Form::text('5', $dedicationProposalSchedule->5, ['class' => 'form-control' . ($errors->has('5') ? ' is-invalid' : ''), 'placeholder' => '5']) }}
            {!! $errors->first('5', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('6') }}
            {{ Form::text('6', $dedicationProposalSchedule->6, ['class' => 'form-control' . ($errors->has('6') ? ' is-invalid' : ''), 'placeholder' => '6']) }}
            {!! $errors->first('6', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('7') }}
            {{ Form::text('7', $dedicationProposalSchedule->7, ['class' => 'form-control' . ($errors->has('7') ? ' is-invalid' : ''), 'placeholder' => '7']) }}
            {!! $errors->first('7', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('8') }}
            {{ Form::text('8', $dedicationProposalSchedule->8, ['class' => 'form-control' . ($errors->has('8') ? ' is-invalid' : ''), 'placeholder' => '8']) }}
            {!! $errors->first('8', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('9') }}
            {{ Form::text('9', $dedicationProposalSchedule->9, ['class' => 'form-control' . ($errors->has('9') ? ' is-invalid' : ''), 'placeholder' => '9']) }}
            {!! $errors->first('9', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('10') }}
            {{ Form::text('10', $dedicationProposalSchedule->10, ['class' => 'form-control' . ($errors->has('10') ? ' is-invalid' : ''), 'placeholder' => '10']) }}
            {!! $errors->first('10', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('11') }}
            {{ Form::text('11', $dedicationProposalSchedule->11, ['class' => 'form-control' . ($errors->has('11') ? ' is-invalid' : ''), 'placeholder' => '11']) }}
            {!! $errors->first('11', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('12') }}
            {{ Form::text('12', $dedicationProposalSchedule->12, ['class' => 'form-control' . ($errors->has('12') ? ' is-invalid' : ''), 'placeholder' => '12']) }}
            {!! $errors->first('12', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>