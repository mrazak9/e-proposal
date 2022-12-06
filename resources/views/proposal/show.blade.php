@extends('layouts.dashboard')

@section('template_title')
    {{ $proposal->name ?? 'Show Proposal' }}
@endsection
@push('custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#ex1 a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
@endpush
@section('content')
    <section class="content container-fluid">
        @can('CREATE_REVISION')
            <a href="#" class="float btn-warning" data-bs-toggle="modal" data-bs-target="#revisiModal"
                title="Add Revisi/Komentar">
                <i class="fa fa-pencil my-float"></i>
            </a>
            <a href="#" class="float-secondary btn-info" data-bs-toggle="modal" data-bs-target="#paguModal"
                title="Aturan PAGU">
                <i class="fas fa-dollar-sign my-float"></i>
            </a>
            <a href="#approval" class="float-third btn-primary" title="Setuju/Tolak Proposal">
                <i class="fas fa-check-circle my-float"></i>
            </a>
            @include('proposal.pagu')
        @endcan
        @hasrole('BAS')
            <a href="#" data-bs-toggle="modal" data-bs-target="#penerimaanDanaModal" class="float-fourth btn-success"
                title="Pencairan Dana">
                <i class="fas fa-hand-holding-usd my-float"></i>
            </a>
            @include('proposal.modal.penerimaanDanaModal')
        @endhasrole
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        <h3 class="display-5">Show Proposal</h3>
                    </span>

                    <div class="float-right">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Back" class="btn btn-sm btn-info"
                            href="{{ route('admin.proposals.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Proposal"
                                class="btn btn-sm btn-success"
                                href="{{ route('admin.proposals.edit', Crypt::encrypt($proposal->id)) }}"><i
                                    class="bi bi-pen"></i></a>
                        @endcan


                        @can('CREATE_REVISION')
                            <a title="Add Revisi/Komentar" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#revisiModal"><i class="bi bi-pencil"></i></a>
                            @include('proposal.modal.revisiModal')
                        @endcan


                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Nama Proposal</label>
                            <input type="text" class="form-control" name="name" value="{{ $proposal->name }}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Tema Kegiatan</label>
                            <input type="text" class="form-control" name="tema_kegiatan"
                                value="{{ $proposal->tema_kegiatan }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Tempat</label>
                            <select class="form-control" name="id_tempat" disabled>
                                <option value="{{ $proposal->id_tempat }}">{{ $proposal->place->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal" maxlength="10"
                                value="{{ $proposal->tanggal }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal" maxlength="10"
                                value="{{ $proposal->tanggal_selesai }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Tujuan Kegiatan</label>
                            <textarea class="form-control" name="tujuan_kegiatan" rows="3" disabled>{{ $proposal->tujuan_kegiatan }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Latar Belakang</label>
                            <textarea class="form-control" name="latar_belakang" rows="5" disabled>{{ $proposal->latar_belakang }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Event</label>
                            <select class="form-control" name="id_kegiatan" disabled>
                                <option value="{{ $proposal->id_kegiatan }}">{{ $proposal->event->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Organisasi</label>
                            <input type="text" class="form-control" name="org_name" value="{{ $proposal->org_name }}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jenis Organisasi</label>
                            <input type="text" class="form-control" name="owner" value="{{ $proposal->owner }}"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="card h-100 mb-4">
                            <div class="card-header pb-0 px-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Pencairan Dana</h6>
                                    </div>
                                    <div
                                        class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    @php
                                        $indexFund = 0;
                                        $cekRole = Auth::user()
                                            ->getRoleNames()
                                            ->first();
                                    @endphp
                                    @forelse ($receipt_of_funds as $penerimaan_dana)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('admin.fund.destroy', $penerimaan_dana->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    @if ($cekRole == 'BAS')
                                                        <button
                                                            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"
                                                            type="submit">{{ ++$indexFund }}
                                                        </button>
                                                    @else
                                                        <button
                                                            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"
                                                            disabled>{{ ++$indexFund }}
                                                        </button>
                                                    @endif

                                                </form>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Sudah diterima oleh:
                                                        <span
                                                            class="badge bg-success text-white">{{ $penerimaan_dana->user->name }}</span>
                                                    </h6>
                                                    <span class="text-xs">Pada tanggal: <i class="fa fa-calendar"
                                                            aria-hidden="true"></i> {{ $penerimaan_dana->tanggal }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                <span>+ Rp.</span><span class="uang">
                                                    {{ $penerimaan_dana->nominal }}</span>
                                            </div>
                                        </li>
                                    @empty
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-times"></i>
                                                </button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm"> </h6>
                                                    <h6 class="mb-1 text-dark text-sm">Belum melakukan pencairan dana</h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforelse

                                </ul>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Dana telah dicairkan senilai:</h6>
                                    </div>
                                    <div
                                        class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                                        <i class="fa fa-money p-3 text-success" aria-hidden="true"></i>
                                        <strong class="text-success"><span>Rp.</span> <span
                                                class="uang">{{ $sum_funds }}</span> dari <span>Rp. </span>
                                            <span class="uang">{{ $sum_budget_receipt }}</span></strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <br />
    <section class="content container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="display-6">Rincian Proposal</h3>
                    <div class="alert alert-info alert-dismissible fade show text-white" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                        <strong>Klik Header Tabel !</strong> Untuk sortir tampilan data
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-6" data-bs-toggle="tab" href="#ex1-tabs-6"
                                    role="tab" aria-controls="ex1-tabs-6" aria-selected="false">Kepanitiaan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1"
                                    role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Penerimaan
                                    Anggaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2"
                                    role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Pengeluaran
                                    Anggaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3"
                                    role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Jadwal
                                    Perencanaan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-4" data-bs-toggle="tab" href="#ex1-tabs-4"
                                    role="tab" aria-controls="ex1-tabs-4" aria-selected="false">Susunan Acara</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-5" data-bs-toggle="tab" href="#ex1-tabs-5"
                                    role="tab" aria-controls="ex1-tabs-5" aria-selected="false">Peserta</a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                @include('proposal.showForm.showPenerimaan')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                @include('proposal.showForm.showPengeluaran')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                @include('proposal.showForm.showJadwal')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                @include('proposal.showForm.showSusunan')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                                @include('proposal.showForm.showPeserta')
                            </div>
                            <div class="tab-pane fade show active" id="ex1-tabs-6" role="tabpanel"
                                aria-labelledby="ex1-tab-6">
                                @include('proposal.showForm.showKepanitiaan')
                            </div>

                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {

                                // Format mata uang.
                                $('.uang').mask('000,000,000', {
                                    reverse: true
                                });

                            })
                        </script>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Penerimaan:</h3><strong><span>Rp. </span><span
                                class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
                    </div>
                    <div class="col-md-4">
                        <h3>Pengeluaran:</h3><strong><span>Rp. </span><span
                                class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
                    </div>
                    @php
                        $selisih = $sum_budget_receipt - $sum_budget_expenditure;
                        $hasil_selisih = number_format($selisih);
                    @endphp

                    <div class="col-md-4">
                        <h4>Selisih (Penerimaan - Pengeluaran):</h4>
                        @if ($selisih < 0)
                            <strong>
                                <span class="text-danger">
                                    Rp. {{ $hasil_selisih }} <i class="fas fa-arrow-down"></i>
                                </span>
                            </strong>
                        @else
                            <strong>
                                <span class="text-success">
                                    Rp. {{ $hasil_selisih }} <i class="fas fa-arrow-up"></i>
                                </span>
                            </strong>
                        @endif
                    </div>
                    <hr style="margin-top: 1em">
                    @canany('CREATE_REVISION')
                        <div id="approval" class="col-md-12">
                            <h3>Setujui?</h3>
                        </div>
                    @endcanany


                    @include('proposal.approval')
                    <div class="col-md-12">
                        <h3>Status Proposal</h3>
                        @forelse ($approved as $appList)
                            <span class="badge bg-success" style="color: white">{{ $appList->name }} <i
                                    class="bi bi-check"></i></span>
                        @empty
                            <span class="badge bg-danger" style="color: white">Belum disetujui<i
                                    class="bi bi-x"></i></span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content container-fluid" style="margin-top: 1em">
        <div class="card">
            <div class="card-header">
                <h3 class="display-6">Log Revisi/Komentar</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Revisi/Komentar</th>
                            <th>Tanggal</th>
                            @can('PANITIA_UPDATE_PROPOSAL')
                                <th>Selesai?</th>
                            @endcan
                            @can('CREATE_REVISION')
                                <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @php($indexRevision = 0)
                        @forelse ($revisions as $r)
                            <tr class="align-middle">
                                <td>{{ ++$indexRevision }}</td>
                                <td><strong>{{ $r->user->name }}</strong></td>
                                <td>
                                    @if ($r->isDone == 1)
                                        <textarea class="form-control text-success" rows="3" disabled>{{ $r->revision }}
                                        </textarea>
                                    @else
                                        <textarea class="form-control" rows="3" readonly>{{ $r->revision }}
                                    </textarea>
                                    @endif
                                </td>
                                <td><i class="fas fa-clock"></i> {{ $r->created_at }}</td>
                                @can('PANITIA_UPDATE_PROPOSAL')
                                    <td>
                                        @if ($r->isDone == 0)
                                            <form action="{{ route('admin.revision.done', $r->id) }}" method="POST">
                                                @csrf

                                                <button class="btn btn-sm btn-danger">
                                                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                                    <i class="bi bi-x-lg" style="color: white"></i>
                                                </button>


                                            </form>
                                        @else
                                            <form action="{{ route('admin.revision.undone', $r->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-info">
                                                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                                    <i class="bi bi-check-circle" style="color: white"></i>
                                                </button>

                                            </form>
                                        @endif
                                    </td>
                                @endcan
                                @can('UPDATE_REVISION')
                                    <td>
                                        <form action="{{ route('admin.revisions.destroy', $r->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                            @if (Auth::user()->id != $r->user_id)
                                                <span class="btn btn-sm btn-secondary"><i class="fas fa-ban"></i></span>
                                            @else
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            @endif
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada data revisi</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
        <div class="card" style="margin-top: 1em">
            <div class="card-header">
                <h3 class="display-6">Log Persetujuan</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($indexApproval = 0)
                        @foreach ($approvals as $app)
                            <tr>
                                <td>{{ ++$indexApproval }}</td>
                                <td>
                                    @switch($app->approved)
                                        @case(0)
                                            <span class="badge bg-danger" style="color: white">Need Approved</span>
                                            <span class="badge bg-warning" style="color: white">by {{ $app->name }}</span>
                                        @break

                                        @case(1)
                                            <span class="badge bg-info" style="color: white">Approved</span>
                                            <span class="badge bg-success" style="color: white">by {{ $app->name }}</span>
                                        @break

                                        @default
                                    @endswitch

                                </td>
                                <td>{{ $app->date }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript" src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
@endsection
