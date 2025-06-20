@extends('layouts.dashboard')

@section('template_title')
    Update Profile
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Profile | <strong>{{ $student->user->name }}</strong></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.students.update', $student->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('student.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
