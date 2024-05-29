@extends('layouts.dashboard')

@section('template_title')
    Update Leader Submission
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Leader Submission</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.leader-submissions.update', $leaderSubmission->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('leader-submission.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
