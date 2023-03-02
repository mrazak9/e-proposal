@extends('layouts.app')

@section('template_title')
    {{ $lpjRevision->name ?? 'Show Lpj Revision' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lpj Revision</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lpj-revisions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lpj Id:</strong>
                            {{ $lpjRevision->lpj_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $lpjRevision->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Revision:</strong>
                            {{ $lpjRevision->revision }}
                        </div>
                        <div class="form-group">
                            <strong>Isdone:</strong>
                            {{ $lpjRevision->isDone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
