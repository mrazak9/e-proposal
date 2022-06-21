@extends('layouts.app')

@section('template_title')
    {{ $participantType->name ?? 'Show Participant Type' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Participant Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('participant-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $participantType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $participantType->notes }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
