@extends('layouts.dashboard')

@section('template_title')
    Update Participant Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Participant Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.participant_type.update', $participantType->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('participant-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
