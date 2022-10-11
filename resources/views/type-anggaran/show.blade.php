@extends('layouts.app')

@section('template_title')
    {{ $typeAnggaran->name ?? 'Show Type Anggaran' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Anggaran</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-anggarans.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeAnggaran->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
