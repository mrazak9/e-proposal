@extends('layouts.app')

@section('template_title')
    {{ $dedicationProposalRevision->name ?? 'Show Dedication Proposal Revision' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dedication Proposal Revision</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dedication-proposal-revisions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dedication Proposals Id:</strong>
                            {{ $dedicationProposalRevision->dedication_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $dedicationProposalRevision->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Revision:</strong>
                            {{ $dedicationProposalRevision->revision }}
                        </div>
                        <div class="form-group">
                            <strong>Isdone:</strong>
                            {{ $dedicationProposalRevision->isDone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
