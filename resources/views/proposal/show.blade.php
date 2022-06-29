@extends('layouts.dashboard')

@section('template_title')
    {{ $proposal->name ?? 'Show Proposal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proposal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.proposals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $proposal->name }}
                        </div>
                        <div class="form-group">
                            <strong>Latar Belakang:</strong>
                            {{ $proposal->latar_belakang }}
                        </div>
                        <div class="form-group">
                            <strong>Tujuan Kegiatan:</strong>
                            {{ $proposal->tujuan_kegiatan }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tempat:</strong>
                            {{ $proposal->id_tempat }}
                        </div>
                        <div class="form-group">
                            <strong>Tanggal:</strong>
                            {{ $proposal->tanggal }}
                        </div>
                        <div class="form-group">
                            <strong>Id Kegiatan:</strong>
                            {{ $proposal->id_kegiatan }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
