@extends('layouts.dashboard')

@section('template_title')
    {{ $organization->name ?? 'Show Organization' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Organization</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.organizations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $organization->name }}
                        </div>
                        <div class="form-group">
                            <strong>Singkatan:</strong>
                            {{ $organization->singkatan }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $organization->type }}
                        </div>
                        <div class="form-group">
                            <strong>Head Organization:</strong>
                            {{ $organization->head_organization }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
