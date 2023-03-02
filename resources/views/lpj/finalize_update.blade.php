@extends('layouts.dashboard')

@section('template_title')
    LPJ - {{ $lpj->proposal->name }}
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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h4><i class="fas fa-search"></i> {{ $lpj->proposal->name }} | {{ $lpj->proposal->org_name }}</h4>
                        <h3>Update Laporan</h3>
                        <h4>Lembar Pertanggung Jawaban</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.lpj.update') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('lpj.form.update')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content container-fluid" style="margin-bottom: 1em">
        @can('CREATE_REVISION')
            <a href="#" class="float btn-warning" data-bs-toggle="modal" data-bs-target="#revisiModal"
                title="Add Revisi/Komentar">
                <i class="fa fa-pencil my-float"></i>
            </a>
            <a href="#approval" class="float-secondary btn-primary" title="Setuju/Tolak LPJ Proposal">
                <i class="fas fa-check-circle my-float"></i>
            </a>
            @include('lpj.modal.revisiModal')
        @endcan
        <div class="card">
            <div class="card-header">
                <h3 class="display-6">Log Revisi/Komentar</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                                <form action="{{ route('admin.lpj_revision.done', $r->id) }}" method="POST">
                                                    @csrf

                                                    <button class="btn btn-sm btn-danger">
                                                        <input type="hidden" value="{{ $lpj->id }}" name="lpj_id">
                                                        <i class="bi bi-x-lg" style="color: white"></i>
                                                    </button>


                                                </form>
                                            @else
                                                <form action="{{ route('admin.lpj_revision.undone', $r->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-info">
                                                        <input type="hidden" value="{{ $lpj->id }}" name="lpj_id">
                                                        <i class="bi bi-check-circle" style="color: white"></i>
                                                    </button>

                                                </form>
                                            @endif
                                        </td>
                                    @endcan
                                    @can('UPDATE_REVISION')
                                        <td>
                                            <form action="{{ route('admin.lpj_revisions.destroy', $r->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $lpj->id }}" name="proposal_id">
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
        </div>
    </section>
    <hr>
    <section class="content container-fluid" id="approval">
        <div class="card">
            <div class="card-body">
                <h3>Setujui?</h3>
                @include('lpj.approval')
            </div>
        </div>
    </section>
    <hr>
    <section class="content container-fluid">
        <div class="card">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Update Realisasi</h3>
                        <h4>Anggaran di Proposal sebelumnya</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
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
                                            role="tab" aria-controls="ex1-tabs-4" aria-selected="false">Susunan
                                            Acara</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex1-tab-5" data-bs-toggle="tab" href="#ex1-tabs-5"
                                            role="tab" aria-controls="ex1-tabs-5" aria-selected="false">Peserta</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->

                                <!-- Tabs content -->
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade" id="ex1-tabs-1" role="tabpanel"
                                        aria-labelledby="ex1-tab-1">
                                        @include('lpj.editForm.penerimaan')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel"
                                        aria-labelledby="ex1-tab-2">
                                        @include('lpj.editForm.pengeluaran')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel"
                                        aria-labelledby="ex1-tab-3">
                                        @include('lpj.editForm.jadwal')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel"
                                        aria-labelledby="ex1-tab-4">
                                        @include('lpj.editForm.susunan')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel"
                                        aria-labelledby="ex1-tab-5">
                                        @include('lpj.editForm.peserta')
                                    </div>

                                </div>
                                <!-- Tabs content -->
                                <script type="text/javascript">
                                    $(document).ready(function() {

                                        // Format mata uang.
                                        $('.uang').mask('000.000.000', {
                                            reverse: true
                                        });

                                        var pathname = window.location.pathname; //get the path of current page
                                        $('.navbar-nav > li > a[href="' + pathname + '"]').parent().addClass('active');
                                    })
                                </script>
                            </div>
                            <div class="col-md-12">
                                <h3 style="text-align: center">Sebelum Realisasi</h3>
                            </div>
                            <div class="col-md-4">
                                <h3>Penerimaan:</h3><strong><span>Rp. </span><span
                                        class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
                            </div>
                            <div class="col-md-4">
                                <h3>Pengeluaran:</h3><strong><span>Rp. </span><span
                                        class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card" style="margin-top: 1em">
        <div class="card-header">
            <div class="card-header">
                <h3>Update Realisasi</h3>
                <h4>Anggaran di Proposal setelah Acara</h4>
            </div>
        </div>
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#penerimaan"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Penerimaan
                        Anggaran</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pengeluaran"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Pengeluaran
                        Anggaran</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#jadwal"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">Jadwal
                        Perencanaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#susunan"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">Susunan
                        Acara</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#peserta"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">Peserta</button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="penerimaan" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table table-sm table-responsive">
                        @include('lpj.realize.penerimaan')
                    </div>

                </div>
                <div class="tab-pane" id="pengeluaran" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane active" id="pengeluaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table table-sm table-responsive">
                            @include('lpj.realize.pengeluaran')
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="jadwal" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane active" id="pengeluaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table table-sm table-responsive">
                            @include('lpj.realize.jadwal')
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="susunan" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane active" id="pengeluaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table table-sm table-responsive">
                            @include('lpj.realize.susunan')
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="peserta" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane active" id="pengeluaran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table table-sm table-responsive">
                            @include('lpj.realize.peserta')
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 style="text-align: center">Setelah Realisasi</h3>
                </div>
                <div class="col-md-4">
                    <h3>Penerimaan:</h3><strong><span>Rp. </span><span
                            class="uang">{{ $sum_realize_budget_receipt }}</span><span>,-</span></strong>
                </div>
                <div class="col-md-4">
                    <h3>Pengeluaran:</h3><strong><span>Rp. </span><span
                            class="uang">{{ $sum_realize_budget_expenditure }}</span><span>,-</span></strong>
                </div>
                <div class="col-md-4">
                    <h4>Selisih (Penerimaan - Pengeluaran):</h4>
                    @if ($selisih_akhir < 0)
                        <strong>
                            <span class="text-danger">
                                Rp. {{ $hasil_selisih_akhir }} <i class="fas fa-arrow-down"></i>
                            </span>
                        </strong>
                    @else
                        <strong>
                            <span class="text-success">
                                Rp. {{ $hasil_selisih_akhir }} <i class="fas fa-arrow-up"></i>
                            </span>
                        </strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
