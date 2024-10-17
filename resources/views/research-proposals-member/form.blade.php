<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('research_proposals_id') }}
            {{ Form::text('research_proposals_id', $researchProposalsMember->research_proposals_id, ['class' => 'form-control' . ($errors->has('research_proposals_id') ? ' is-invalid' : ''), 'placeholder' => 'Research Proposals Id']) }}
            {!! $errors->first('research_proposals_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $researchProposalsMember->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identity_number') }}
            {{ Form::text('identity_number', $researchProposalsMember->identity_number, ['class' => 'form-control' . ($errors->has('identity_number') ? ' is-invalid' : ''), 'placeholder' => 'Identity Number']) }}
            {!! $errors->first('identity_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('affiliation') }}
            {{ Form::text('affiliation', $researchProposalsMember->affiliation, ['class' => 'form-control' . ($errors->has('affiliation') ? ' is-invalid' : ''), 'placeholder' => 'Affiliation']) }}
            {!! $errors->first('affiliation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>