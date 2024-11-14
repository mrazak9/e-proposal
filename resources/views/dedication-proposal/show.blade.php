@extends('layouts.dashboard')

@section('template_title')
    {{ $dedicationProposal->name ?? 'Show Dedication Proposal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dedication Proposal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.dedication-proposals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $dedicationProposal->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $dedicationProposal->title }}
                        </div>
                        <div class="form-group">
                            <strong>Research Group:</strong>
                            {{ $dedicationProposal->research_group }}
                        </div>
                        <div class="form-group">
                            <strong>Cluster Of Knowledge:</strong>
                            {{ $dedicationProposal->cluster_of_knowledge }}
                        </div>
                        <div class="form-group">
                            <strong>Type Of Skim:</strong>
                            {{ $dedicationProposal->type_of_skim }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $dedicationProposal->location }}
                        </div>
                        <div class="form-group">
                            <strong>Proposed Year:</strong>
                            {{ $dedicationProposal->proposed_year }}
                        </div>
                        <div class="form-group">
                            <strong>Length Of Activity:</strong>
                            {{ $dedicationProposal->length_of_activity }}
                        </div>
                        <div class="form-group">
                            <strong>Source Of Funds:</strong>
                            {{ $dedicationProposal->source_of_funds }}
                        </div>
                        <div class="form-group">
                            <strong>Application Status:</strong>
                            {{ $dedicationProposal->application_status }}
                        </div>
                        <div class="form-group">
                            <strong>Contract Status:</strong>
                            {{ $dedicationProposal->contract_status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
