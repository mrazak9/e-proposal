@extends('layouts.app')

@section('template_title')
    {{ $dedicationProposalSchedule->name ?? 'Show Dedication Proposal Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dedication Proposal Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dedication-proposal-schedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dedication Proposals Id:</strong>
                            {{ $dedicationProposalSchedule->dedication_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Year At:</strong>
                            {{ $dedicationProposalSchedule->year_at }}
                        </div>
                        <div class="form-group">
                            <strong>Event Name:</strong>
                            {{ $dedicationProposalSchedule->event_name }}
                        </div>
                        <div class="form-group">
                            <strong>1:</strong>
                            {{ $dedicationProposalSchedule->1 }}
                        </div>
                        <div class="form-group">
                            <strong>2:</strong>
                            {{ $dedicationProposalSchedule->2 }}
                        </div>
                        <div class="form-group">
                            <strong>3:</strong>
                            {{ $dedicationProposalSchedule->3 }}
                        </div>
                        <div class="form-group">
                            <strong>4:</strong>
                            {{ $dedicationProposalSchedule->4 }}
                        </div>
                        <div class="form-group">
                            <strong>5:</strong>
                            {{ $dedicationProposalSchedule->5 }}
                        </div>
                        <div class="form-group">
                            <strong>6:</strong>
                            {{ $dedicationProposalSchedule->6 }}
                        </div>
                        <div class="form-group">
                            <strong>7:</strong>
                            {{ $dedicationProposalSchedule->7 }}
                        </div>
                        <div class="form-group">
                            <strong>8:</strong>
                            {{ $dedicationProposalSchedule->8 }}
                        </div>
                        <div class="form-group">
                            <strong>9:</strong>
                            {{ $dedicationProposalSchedule->9 }}
                        </div>
                        <div class="form-group">
                            <strong>10:</strong>
                            {{ $dedicationProposalSchedule->10 }}
                        </div>
                        <div class="form-group">
                            <strong>11:</strong>
                            {{ $dedicationProposalSchedule->11 }}
                        </div>
                        <div class="form-group">
                            <strong>12:</strong>
                            {{ $dedicationProposalSchedule->12 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
