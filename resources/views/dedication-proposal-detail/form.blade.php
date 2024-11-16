<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dedication_proposals_id') }}
            {{ Form::text('dedication_proposals_id', $dedicationProposalDetail->dedication_proposals_id, ['class' => 'form-control' . ($errors->has('dedication_proposals_id') ? ' is-invalid' : ''), 'placeholder' => 'Dedication Proposals Id']) }}
            {!! $errors->first('dedication_proposals_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keyword') }}
            {{ Form::text('keyword', $dedicationProposalDetail->keyword, ['class' => 'form-control' . ($errors->has('keyword') ? ' is-invalid' : ''), 'placeholder' => 'Keyword']) }}
            {!! $errors->first('keyword', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('background') }}
            {{ Form::text('background', $dedicationProposalDetail->background, ['class' => 'form-control' . ($errors->has('background') ? ' is-invalid' : ''), 'placeholder' => 'Background']) }}
            {!! $errors->first('background', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state_of_the_art') }}
            {{ Form::text('state_of_the_art', $dedicationProposalDetail->state_of_the_art, ['class' => 'form-control' . ($errors->has('state_of_the_art') ? ' is-invalid' : ''), 'placeholder' => 'State Of The Art']) }}
            {!! $errors->first('state_of_the_art', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('road_map_research') }}
            {{ Form::text('road_map_research', $dedicationProposalDetail->road_map_research, ['class' => 'form-control' . ($errors->has('road_map_research') ? ' is-invalid' : ''), 'placeholder' => 'Road Map Research']) }}
            {!! $errors->first('road_map_research', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('method_and_design') }}
            {{ Form::text('method_and_design', $dedicationProposalDetail->method_and_design, ['class' => 'form-control' . ($errors->has('method_and_design') ? ' is-invalid' : ''), 'placeholder' => 'Method And Design']) }}
            {!! $errors->first('method_and_design', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('references') }}
            {{ Form::text('references', $dedicationProposalDetail->references, ['class' => 'form-control' . ($errors->has('references') ? ' is-invalid' : ''), 'placeholder' => 'References']) }}
            {!! $errors->first('references', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('attachment') }}
            {{ Form::text('attachment', $dedicationProposalDetail->attachment, ['class' => 'form-control' . ($errors->has('attachment') ? ' is-invalid' : ''), 'placeholder' => 'Attachment']) }}
            {!! $errors->first('attachment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>