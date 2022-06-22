@extends('layouts.dashboard')

@section('template_title')
    {{ $student->name ?? 'Show Student' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.students.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $student->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nim:</strong>
                            {{ $student->nim }}
                        </div>
                        <div class="form-group">
                            <strong>Prodi:</strong>
                            {{ $student->prodi }}
                        </div>
                        <div class="form-group">
                            <strong>Kelas:</strong>
                            {{ $student->kelas }}
                        </div>
                        <div class="form-group">
                            <strong>Organization Id:</strong>
                            {{ $student->organization_id }}
                        </div>
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $student->position }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
