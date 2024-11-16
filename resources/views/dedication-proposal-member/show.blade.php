@extends('layouts.app')

@section('template_title')
    {{ $dedicationProposalMember->name ?? 'Show Dedication Proposal Member' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dedication Proposal Member</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dedication-proposal-members.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dedication Proposals Id:</strong>
                            {{ $dedicationProposalMember->dedication_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $dedicationProposalMember->name }}
                        </div>
                        <div class="form-group">
                            <strong>Identity Number:</strong>
                            {{ $dedicationProposalMember->identity_number }}
                        </div>
                        <div class="form-group">
                            <strong>Affiliation:</strong>
                            {{ $dedicationProposalMember->affiliation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
