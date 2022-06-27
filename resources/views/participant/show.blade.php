@extends('layouts.app')

@section('template_title')
    {{ $participant->name ?? 'Show Participant' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Participant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('participants.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $participant->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Participant Type Id:</strong>
                            {{ $participant->participant_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Participant Total:</strong>
                            {{ $participant->participant_total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
