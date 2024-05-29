@extends('layouts.dashboard')

@section('template_title')
    {{ $leaderSubmission->name ?? 'Show Leader Submission' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Leader Submission</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.leader-submissions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Previous Leader Id:</strong>
                            {{ $leaderSubmission->previous_leader_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $leaderSubmission->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Is Approved:</strong>
                            {{ $leaderSubmission->is_Approved }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
