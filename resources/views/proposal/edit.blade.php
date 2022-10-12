@extends('layouts.dashboard')

@section('template_title')
    Update Proposal
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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <h3>Update Proposal</h3>
                            </span>
                            <div class="float-right">
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Back" class="btn btn-sm btn-info"
                                    href="{{ route('admin.proposals.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proposals.update', $proposal->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('proposal.update')
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 1em">
                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <h3>Rincian Proposal</h3>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
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
                                        @include('proposal.editForm.editPenerimaan')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                        @include('proposal.editForm.editPengeluaran')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                        @include('proposal.editForm.editJadwal')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel"
                                        aria-labelledby="ex1-tab-4">
                                        @include('proposal.editForm.editSusunan')
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel"
                                        aria-labelledby="ex1-tab-5">
                                        @include('proposal.editForm.editPeserta')
                                    </div>
                                    <div class="tab-pane fade show active" id="ex1-tabs-6" role="tabpanel"
                                        aria-labelledby="ex1-tab-6">
                                        @include('proposal.editForm.editKepanitiaan')
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
                            @endphp
                            <div class="col-md-4">
                                <h4 class="text-danger">Selisih (Penerimaan - Pengeluaran):</h4><strong><span>Rp.
                                    </span><span>{{ $selisih }}</span><span>,-</span></strong>
                            </div>
                        </div>
                    </div>
                    <p style="margin-left: 1em"><small><em>last updated by: <strong>{{ $proposal->updated_user->name }}
                                </strong></em></small><small><i class="fas fa-clock"></i>
                            {{ $proposal->updated_at }}</small></p>
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
