@extends('layouts.dashboard')

@section('template_title')
    {{ $employee->name ?? 'Show Employee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employee->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nip:</strong>
                            {{ $employee->nip }}
                        </div>
                        <div class="form-group">
                            <strong>Department:</strong>
                            {{ $employee->department }}
                        </div>
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $employee->position }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
