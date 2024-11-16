@extends('layouts.app')

@section('template_title')
    {{ $dedicationProposalDetail->name ?? 'Show Dedication Proposal Detail' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dedication Proposal Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dedication-proposal-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dedication Proposals Id:</strong>
                            {{ $dedicationProposalDetail->dedication_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Keyword:</strong>
                            {{ $dedicationProposalDetail->keyword }}
                        </div>
                        <div class="form-group">
                            <strong>Background:</strong>
                            {{ $dedicationProposalDetail->background }}
                        </div>
                        <div class="form-group">
                            <strong>State Of The Art:</strong>
                            {{ $dedicationProposalDetail->state_of_the_art }}
                        </div>
                        <div class="form-group">
                            <strong>Road Map Research:</strong>
                            {{ $dedicationProposalDetail->road_map_research }}
                        </div>
                        <div class="form-group">
                            <strong>Method And Design:</strong>
                            {{ $dedicationProposalDetail->method_and_design }}
                        </div>
                        <div class="form-group">
                            <strong>References:</strong>
                            {{ $dedicationProposalDetail->references }}
                        </div>
                        <div class="form-group">
                            <strong>Attachment:</strong>
                            {{ $dedicationProposalDetail->attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
