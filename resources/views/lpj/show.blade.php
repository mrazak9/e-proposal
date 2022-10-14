@extends('layouts.app')

@section('template_title')
    {{ $lpj->name ?? 'Show Lpj' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lpj</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lpjs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $lpj->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Keberhasilan:</strong>
                            {{ $lpj->keberhasilan }}
                        </div>
                        <div class="form-group">
                            <strong>Kendala:</strong>
                            {{ $lpj->kendala }}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {{ $lpj->notes }}
                        </div>
                        <div class="form-group">
                            <strong>Link Lampiran:</strong>
                            {{ $lpj->link_lampiran }}
                        </div>
                        <div class="form-group">
                            <strong>Link Dokumentasi Kegiatan:</strong>
                            {{ $lpj->link_dokumentasi_kegiatan }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
