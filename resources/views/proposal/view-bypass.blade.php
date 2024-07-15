@extends('layouts.dashboard')

@section('template_title')
    Select Proposal to Bypass
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-search"></i> Pilih Proposal
                        </h3>
                        <div class="alert alert-warning" role="alert">
                            <strong><i class="bi bi-info-circle"></i> Perhatian!</strong> Proses ini boleh dilakukan atas persetujuan PEMBINA/WAREK.
                        </div>
                        <hr>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <form action="{{ route('admin.proposals.viewBypass') }}" method="GET">
                                    <div class="form-group">
                                        <input class="form-control" type="search" name="search"
                                            value="{{ request('search') }}"
                                            placeholder="Cari nama proposal dan tekan [ENTER] ...">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No.
                                                </th>
                                                <th>
                                                    Ormawa - Judul
                                                </th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($proposals as $proposal)
                                                <tr>
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            {{ $proposal->org_name }} - {{ $proposal->name }}
                                                        </strong>
                                                        <hr>
                                                        <small>
                                                            {{ date('d F Y', strtotime($proposal->created_at)) }}
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @can('PROCESS_BYPASS')
                                                            <a href="{{ route('admin.proposals.processBypass', $proposal->id) }}"
                                                                class="btn btn-success"
                                                                onclick="return confirm('Proses proposal dengan judul ini {{ $proposal->name }}?')">
                                                                <i class="bi bi-check-circle-fill"></i> Submit
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">
                                                        <span class="badge bg-warning w-100 text-light">
                                                            Tidak ada Proposal
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    No.
                                                </th>
                                                <th>
                                                    Ormawa - Judul
                                                </th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
