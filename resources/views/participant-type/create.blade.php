@extends('layouts.dashboard')

@section('template_title')
    Create Participant Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Participant Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.participant_type.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('participant-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
