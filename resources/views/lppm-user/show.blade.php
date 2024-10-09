@extends('layouts.dashboard')

@section('template_title')
    {{ $lppmUser->name ?? 'Show Lppm User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lppm User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.lppm-users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $lppmUser->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $lppmUser->status }}
                        </div>
                        <div class="form-group">
                            <strong>Nidn:</strong>
                            {{ $lppmUser->nidn }}
                        </div>
                        <div class="form-group">
                            <strong>Affiliation Id:</strong>
                            {{ $lppmUser->affiliation_id }}
                        </div>
                        <div class="form-group">
                            <strong>Academic Grade Id:</strong>
                            {{ $lppmUser->academic_grade_id }}
                        </div>
                        <div class="form-group">
                            <strong>Group Of Work Id:</strong>
                            {{ $lppmUser->group_of_work_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nik:</strong>
                            {{ $lppmUser->nik }}
                        </div>
                        <div class="form-group">
                            <strong>Google Scholar Url:</strong>
                            {{ $lppmUser->google_scholar_url }}
                        </div>
                        <div class="form-group">
                            <strong>Scopus Id:</strong>
                            {{ $lppmUser->scopus_id }}
                        </div>
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $lppmUser->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Handphone:</strong>
                            {{ $lppmUser->handphone }}
                        </div>
                        <div class="form-group">
                            <strong>Place Of Birth:</strong>
                            {{ $lppmUser->place_of_birth }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Birth:</strong>
                            {{ $lppmUser->date_of_birth }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
