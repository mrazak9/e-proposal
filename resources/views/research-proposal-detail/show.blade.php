@extends('layouts.app')

@section('template_title')
    {{ $researchProposalDetail->name ?? 'Show Research Proposal Detail' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Research Proposal Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('research-proposal-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Research Proposals Id:</strong>
                            {{ $researchProposalDetail->research_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Keyword:</strong>
                            {{ $researchProposalDetail->keyword }}
                        </div>
                        <div class="form-group">
                            <strong>Background:</strong>
                            {{ $researchProposalDetail->background }}
                        </div>
                        <div class="form-group">
                            <strong>State Of The Art:</strong>
                            {{ $researchProposalDetail->state_of_the_art }}
                        </div>
                        <div class="form-group">
                            <strong>Road Map Research:</strong>
                            {{ $researchProposalDetail->road_map_research }}
                        </div>
                        <div class="form-group">
                            <strong>Method And Design:</strong>
                            {{ $researchProposalDetail->method_and_design }}
                        </div>
                        <div class="form-group">
                            <strong>References:</strong>
                            {{ $researchProposalDetail->references }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
