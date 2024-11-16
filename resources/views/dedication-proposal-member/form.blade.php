<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dedication_proposals_id') }}
            {{ Form::text('dedication_proposals_id', $dedicationProposalMember->dedication_proposals_id, ['class' => 'form-control' . ($errors->has('dedication_proposals_id') ? ' is-invalid' : ''), 'placeholder' => 'Dedication Proposals Id']) }}
            {!! $errors->first('dedication_proposals_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $dedicationProposalMember->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identity_number') }}
            {{ Form::text('identity_number', $dedicationProposalMember->identity_number, ['class' => 'form-control' . ($errors->has('identity_number') ? ' is-invalid' : ''), 'placeholder' => 'Identity Number']) }}
            {!! $errors->first('identity_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('affiliation') }}
            {{ Form::text('affiliation', $dedicationProposalMember->affiliation, ['class' => 'form-control' . ($errors->has('affiliation') ? ' is-invalid' : ''), 'placeholder' => 'Affiliation']) }}
            {!! $errors->first('affiliation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>