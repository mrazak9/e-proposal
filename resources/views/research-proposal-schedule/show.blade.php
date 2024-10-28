@extends('layouts.app')

@section('template_title')
    {{ $researchProposalSchedule->name ?? 'Show Research Proposal Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Research Proposal Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('research-proposal-schedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Research Proposals Id:</strong>
                            {{ $researchProposalSchedule->research_proposals_id }}
                        </div>
                        <div class="form-group">
                            <strong>Year At:</strong>
                            {{ $researchProposalSchedule->year_at }}
                        </div>
                        <div class="form-group">
                            <strong>Event Name:</strong>
                            {{ $researchProposalSchedule->event_name }}
                        </div>
                        <div class="form-group">
                            <strong>1:</strong>
                            {{ $researchProposalSchedule->1 }}
                        </div>
                        <div class="form-group">
                            <strong>2:</strong>
                            {{ $researchProposalSchedule->2 }}
                        </div>
                        <div class="form-group">
                            <strong>3:</strong>
                            {{ $researchProposalSchedule->3 }}
                        </div>
                        <div class="form-group">
                            <strong>4:</strong>
                            {{ $researchProposalSchedule->4 }}
                        </div>
                        <div class="form-group">
                            <strong>5:</strong>
                            {{ $researchProposalSchedule->5 }}
                        </div>
                        <div class="form-group">
                            <strong>6:</strong>
                            {{ $researchProposalSchedule->6 }}
                        </div>
                        <div class="form-group">
                            <strong>7:</strong>
                            {{ $researchProposalSchedule->7 }}
                        </div>
                        <div class="form-group">
                            <strong>8:</strong>
                            {{ $researchProposalSchedule->8 }}
                        </div>
                        <div class="form-group">
                            <strong>9:</strong>
                            {{ $researchProposalSchedule->9 }}
                        </div>
                        <div class="form-group">
                            <strong>10:</strong>
                            {{ $researchProposalSchedule->10 }}
                        </div>
                        <div class="form-group">
                            <strong>11:</strong>
                            {{ $researchProposalSchedule->11 }}
                        </div>
                        <div class="form-group">
                            <strong>12:</strong>
                            {{ $researchProposalSchedule->12 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
