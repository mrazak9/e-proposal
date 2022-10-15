@extends('layouts.dashboard')

@section('template_title')
    {{ $lpj->name ?? 'Show Lpj' }}
@endsection

@section('content')
    <section class="content container-fluid">

        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <span class="card-title">
                        <h3>Show LPJ - {{ $lpj->proposal->name }}</h3>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="padding: 1em">
                        <label>Keberhasilan</label>
                        <textarea name="keberhasilan" class="form-control" rows="10" disabled>{{ $lpj->keberhasilan }}</textarea>
                    </div>
                    <div class="col-md-6" style="padding: 1em">
                        <label>Kendala</label>
                        <textarea name="kendala" class="form-control" rows="10" disabled>{{ $lpj->kendala }}</textarea>
                    </div>
                    <div class="col-md-12" style="padding: 1em">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control" rows="10" disabled>{{ $lpj->notes }}</textarea>
                    </div>
                    <div class="col-md-6" style="padding: 1em">
                        <label>Link Lampiran</label>
                        <input type="text" class="form-control" name="link_lampiran" value="{{ $lpj->link_lampiran }}"
                            disabled>
                    </div>
                    <div class="col-md-6" style="padding: 1em">
                        <label>Link Dokumentasi Kegiatan</label>
                        <input type="text" class="form-control" name="link_dokumentasi_kegiatan"
                            value="{{ $lpj->link_dokumentasi_kegiatan }}" disabled>
                    </div>
                </div>
                @if ($lpj->is_approved == 0)
                    <form action="{{ route('admin.lpj.approve') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lpj_id" value="{{ $lpj->id }}">
                        <button type="submit" class="btn btn-sm btn-success" title="Setujui?" style="padding-left: 1em"><i
                                class="fas fa-check"></i> Setujui Proposal</button>
                    </form>
                @else
                    <form action="{{ route('admin.lpj.revoke') }}" method="POST">
                        @csrf
                        <input type="hidden" name="lpj_id" value="{{ $lpj->id }}">
                        <button type="submit" class="btn btn-sm btn-danger" title="Batalkan?" style="padding-left: 1em"><i
                                class="fas fa-times"></i> Revoke Proposal</button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection
