@extends('layouts.dashboard')

@section('template_title')
    {{ $researchProposal->name ?? 'Show Research Proposal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Research Proposal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.research-proposals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $researchProposal->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $researchProposal->title }}
                        </div>
                        <div class="form-group">
                            <strong>Research Group:</strong>
                            {{ $researchProposal->research_group }}
                        </div>
                        <div class="form-group">
                            <strong>Cluster Of Knowledge:</strong>
                            {{ $researchProposal->cluster_of_knowledge }}
                        </div>
                        <div class="form-group">
                            <strong>Type Of Skim:</strong>
                            {{ $researchProposal->type_of_skim }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $researchProposal->location }}
                        </div>
                        <div class="form-group">
                            <strong>Proposed Year:</strong>
                            {{ $researchProposal->proposed_year }}
                        </div>
                        <div class="form-group">
                            <strong>Length Of Activity:</strong>
                            {{ $researchProposal->length_of_activity }}
                        </div>
                        <div class="form-group">
                            <strong>Source Of Funds:</strong>
                            {{ $researchProposal->source_of_funds }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
