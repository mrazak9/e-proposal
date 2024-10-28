<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('research_proposals_id') }}
            {{ Form::text('research_proposals_id', $researchProposalDetail->research_proposals_id, ['class' => 'form-control' . ($errors->has('research_proposals_id') ? ' is-invalid' : ''), 'placeholder' => 'Research Proposals Id']) }}
            {!! $errors->first('research_proposals_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keyword') }}
            {{ Form::text('keyword', $researchProposalDetail->keyword, ['class' => 'form-control' . ($errors->has('keyword') ? ' is-invalid' : ''), 'placeholder' => 'Keyword']) }}
            {!! $errors->first('keyword', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('background') }}
            {{ Form::text('background', $researchProposalDetail->background, ['class' => 'form-control' . ($errors->has('background') ? ' is-invalid' : ''), 'placeholder' => 'Background']) }}
            {!! $errors->first('background', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state_of_the_art') }}
            {{ Form::text('state_of_the_art', $researchProposalDetail->state_of_the_art, ['class' => 'form-control' . ($errors->has('state_of_the_art') ? ' is-invalid' : ''), 'placeholder' => 'State Of The Art']) }}
            {!! $errors->first('state_of_the_art', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('road_map_research') }}
            {{ Form::text('road_map_research', $researchProposalDetail->road_map_research, ['class' => 'form-control' . ($errors->has('road_map_research') ? ' is-invalid' : ''), 'placeholder' => 'Road Map Research']) }}
            {!! $errors->first('road_map_research', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('method_and_design') }}
            {{ Form::text('method_and_design', $researchProposalDetail->method_and_design, ['class' => 'form-control' . ($errors->has('method_and_design') ? ' is-invalid' : ''), 'placeholder' => 'Method And Design']) }}
            {!! $errors->first('method_and_design', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('references') }}
            {{ Form::text('references', $researchProposalDetail->references, ['class' => 'form-control' . ($errors->has('references') ? ' is-invalid' : ''), 'placeholder' => 'References']) }}
            {!! $errors->first('references', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>