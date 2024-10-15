<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $researchProposal->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $researchProposal->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('research_group') }}
            {{ Form::text('research_group', $researchProposal->research_group, ['class' => 'form-control' . ($errors->has('research_group') ? ' is-invalid' : ''), 'placeholder' => 'Research Group']) }}
            {!! $errors->first('research_group', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cluster_of_knowledge') }}
            {{ Form::text('cluster_of_knowledge', $researchProposal->cluster_of_knowledge, ['class' => 'form-control' . ($errors->has('cluster_of_knowledge') ? ' is-invalid' : ''), 'placeholder' => 'Cluster Of Knowledge']) }}
            {!! $errors->first('cluster_of_knowledge', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_of_skim') }}
            {{ Form::text('type_of_skim', $researchProposal->type_of_skim, ['class' => 'form-control' . ($errors->has('type_of_skim') ? ' is-invalid' : ''), 'placeholder' => 'Type Of Skim']) }}
            {!! $errors->first('type_of_skim', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::text('location', $researchProposal->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proposed_year') }}
            {{ Form::text('proposed_year', $researchProposal->proposed_year, ['class' => 'form-control' . ($errors->has('proposed_year') ? ' is-invalid' : ''), 'placeholder' => 'Proposed Year']) }}
            {!! $errors->first('proposed_year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('length_of_activity') }}
            {{ Form::text('length_of_activity', $researchProposal->length_of_activity, ['class' => 'form-control' . ($errors->has('length_of_activity') ? ' is-invalid' : ''), 'placeholder' => 'Length Of Activity']) }}
            {!! $errors->first('length_of_activity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('source_of_funds') }}
            {{ Form::text('source_of_funds', $researchProposal->source_of_funds, ['class' => 'form-control' . ($errors->has('source_of_funds') ? ' is-invalid' : ''), 'placeholder' => 'Source Of Funds']) }}
            {!! $errors->first('source_of_funds', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>