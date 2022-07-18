@extends('layouts.app')

@section('template_title')
    {{ $revision->name ?? 'Show Revision' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Revision</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('revisions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $revision->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $revision->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Revision:</strong>
                            {{ $revision->revision }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $revision->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
