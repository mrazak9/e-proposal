@extends('layouts.app')

@section('template_title')
    {{ $researchProposalRevision->name ?? 'Show Research Proposal Revision' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Research Proposal Revision</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('research-proposal-revisions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Research Proposals Id:</strong>
                            {{ $researchProposalRevision->research_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $researchProposalRevision->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Revision:</strong>
                            {{ $researchProposalRevision->revision }}
                        </div>
                        <div class="form-group">
                            <strong>Isdone:</strong>
                            {{ $researchProposalRevision->isDone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
