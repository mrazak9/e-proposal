@extends('layouts.dashboard')

@section('template_title')
    {{ $dop->name ?? 'Show Dop' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Dop</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.dops.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $dop->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Organization Id:</strong>
                            {{ $dop->organization_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $dop->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $dop->note }}
                        </div>
                        <div class="form-group">
                            <strong>Isapproved:</strong>
                            {{ $dop->isApproved }}
                        </div>
                        <div class="form-group">
                            <strong>Attachment:</strong>
                            {{ $dop->attachment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
