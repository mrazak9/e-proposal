@extends('layouts.app')

@section('template_title')
    {{ $approval->name ?? 'Show Approval' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Approval</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('approvals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $approval->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $approval->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $approval->name }}
                        </div>
                        <div class="form-group">
                            <strong>Approved:</strong>
                            {{ $approval->approved }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $approval->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
