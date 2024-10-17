@extends('layouts.app')

@section('template_title')
    {{ $researchProposalsMember->name ?? 'Show Research Proposals Member' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Research Proposals Member</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('research-proposals-members.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Research Proposals Id:</strong>
                            {{ $researchProposalsMember->research_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $researchProposalsMember->name }}
                        </div>
                        <div class="form-group">
                            <strong>Identity Number:</strong>
                            {{ $researchProposalsMember->identity_number }}
                        </div>
                        <div class="form-group">
                            <strong>Affiliation:</strong>
                            {{ $researchProposalsMember->affiliation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
