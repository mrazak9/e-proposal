@extends('layouts.app')

@section('template_title')
    {{ $schedule->name ?? 'Show Schedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Schedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $schedule->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $schedule->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Kegiatan:</strong>
                            {{ $schedule->kegiatan }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $schedule->notes }}
                        </div>
                        <div class="form-group">
                            <strong>Times:</strong>
                            {{ $schedule->times }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
