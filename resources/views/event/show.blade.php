@extends('layouts.dashboard')

@section('template_title')
    {{ $event->name ?? 'Show Event' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Event</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $event->name }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $event->notes }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
