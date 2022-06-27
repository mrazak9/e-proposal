@extends('layouts.app')

@section('template_title')
    {{ $committee->name ?? 'Show Committee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Committee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('committees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $committee->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $committee->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Position:</strong>
                            {{ $committee->position }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
