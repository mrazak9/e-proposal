@extends('layouts.app')

@section('template_title')
    Update Research Proposal Schedule
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Research Proposal Schedule</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('research-proposal-schedules.update', $researchProposalSchedule->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('research-proposal-schedule.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
