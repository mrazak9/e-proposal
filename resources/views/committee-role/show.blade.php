@extends('layouts.dashboard')

@section('template_title')
    {{ $committeeRole->name ?? 'Show Committee Role' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Committee Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.committee-roles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $committeeRole->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
