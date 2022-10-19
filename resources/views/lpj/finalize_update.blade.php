@extends('layouts.dashboard')

@section('template_title')
    Update Laporan Lembar Pertanggung Jawaban
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
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
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
                                    <div class="tab-pane fade" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                        @include('lpj.editForm.penerimaan')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                        {{-- @include('proposal.editForm.editPengeluaran') --}}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                        {{-- @include('proposal.editForm.editJadwal') --}}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                        {{-- @include('proposal.editForm.editSusunan') --}}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                                        {{-- @include('proposal.editForm.editPeserta') --}}
                                    </div>
                                    <div class="tab-pane fade show active" id="ex1-tabs-6" role="tabpanel"
                                        aria-labelledby="ex1-tab-6">
                                        {{-- @include('proposal.editForm.editKepanitiaan') --}}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="penerimaan" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table table-sm table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="align-middle">
                                        <th>#</th>
                                        <th>Nama Anggaran</th>
                                        <th>Tipe Anggaran</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($indexBudget_receipt = 0)
                                    @forelse ($budget_receipt as $br)
                                        @php($total_receipt = $br->qty * $br->price)
                                        <tr class="align-middle">
                                            <form action="{{ route('admin.budgetreceipt.update', $br->id) }}"
                                                method="POST">
                                                @csrf
                                                <td scope="row">{{ ++$indexBudget_receipt }}</td>
                                                <td><input type="hidden" name="lpj_id"
                                                        value="{{ Crypt::encrypt($lpj->id) }}">
                                                    <input type="text" class="form-control" name="name[]"
                                                        value="{{ $br->name }}">
                                                </td>
                                                <td>
                                                    <select class="form-control" name="type_anggaran_id[]" required>
                                                        <option value="{{ $br->type_anggaran->id }}" selected>
                                                            {{ $br->type_anggaran->name }}
                                                        </option>
                                                        @foreach ($type_anggaran as $value => $key)
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="number" class="form-control" min="0"
                                                        name="qty[]" value="{{ $br->qty }}"></td>
                                                <td><input type="number" class="form-control" min="0"
                                                        name="price[]" value="{{ $br->price }}"></td>
                                                <td><input type="text" class="form-control uang"
                                                        value="{{ $total_receipt }}" disabled></td>
                                                @can('PANITIA_UPDATE_PROPOSAL')
                                                    <td><span class="align-middle"><input type="hidden"
                                                                value="{{ Crypt::encrypt($lpj->id) }}" name="lpj_id[]">
                                                            <button type="submit" class="btn btn-warning btn-sm"><i
                                                                    class="bi bi-pencil"></i></button></span>
                                                    </td>
                                                </form>
                                                <td>
                                                    <form action="{{ route('admin.budgetreceipt.destroy', $br->id) }}"
                                                        method="GET">
                                                        <input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                                            name="lpj_id">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            @endcan
                                        </tr>
                                    @empty
                                        <span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran,
                                            silahkan lengkapi dahulu</span>
                                    @endforelse
                                    <tr class="table table-secondary">
                                        <td colspan="5"><strong>Total Penerimaan Anggaran:</strong></td>
                                        <td><strong><span>Rp. </span><span
                                                    class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="pengeluaran" role="tabpanel" aria-labelledby="profile-tab"> profile </div>
                    <div class="tab-pane" id="jadwal" role="tabpanel" aria-labelledby="messages-tab"> messages </div>
                </div>
            </div>
        </div>
    </section>
@endsection
