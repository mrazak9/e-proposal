@extends('layouts.app')

@section('template_title')
    {{ $planningSchedule->name ?? 'Show Planning Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Planning Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('planning-schedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $planningSchedule->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $planningSchedule->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Kegiatan:</strong>
                            {{ $planningSchedule->kegiatan }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $planningSchedule->notes }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $planningSchedule->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
