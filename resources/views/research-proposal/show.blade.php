@extends('layouts.dashboard')

@section('template_title')
    {{ $researchProposal->title ?? 'Show Research Proposal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="card-title">
                                <i class="fas fa-eye text-info"></i> Lihat Pengajuan Penelitian |
                                {{ $researchProposal->title }}
                            </h3>
                            <small>
                                <em>
                                    Status Pengajuan Penelitian:
                                    @if ($researchProposal->application_status == 0)
                                        <span class="badge bg-danger text-white">Draf</span>
                                    @elseif ($researchProposal->application_status == 1)
                                        <span class="badge bg-info text-white">Diajukan</span>
                                    @elseif ($researchProposal->application_status == 2)
                                        <span class="badge bg-secondary text-white">Revisi</span>
                                    @elseif ($researchProposal->application_status == 3)
                                        <span class="badge bg-success text-white"><i class="fas fa-check"></i>
                                            Disetujui</span>
                                    @endif |
                                    Status Kontrak:
                                    @if ($researchProposal->contract_status == 0)
                                        <span class="badge bg-danger text-white">Belum Disetujui</span>
                                    @elseif ($researchProposal->contract_status == 1)
                                        <span class="badge bg-success text-white"><i class="fas fa-check-double"></i>
                                            Disetujui</span>
                                    @endif
                                </em>
                            </small>
                        </div>

                        <!-- Dropdown Tools Button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-cogs"></i> Aksi
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-paper-plane"></i> Ajukan</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-check"></i> Setujui
                                        Proposal</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-comment"></i> Revisi</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-check-double"></i> Setujui
                                        Kontrak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="ketua-tab" data-bs-toggle="tab"
                                            data-bs-target="#ketua" type="button" role="tab" aria-controls="ketua"
                                            aria-selected="true">
                                            <i class="fas fa-id-card"></i> Identitas Ketua
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penelitian-tab" data-bs-toggle="tab"
                                            data-bs-target="#penelitian" type="button" role="tab"
                                            aria-controls="penelitian" aria-selected="false">
                                            <i class="fas fa-search-plus"></i> Penelitian
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="anggota-tab" data-bs-toggle="tab"
                                            data-bs-target="#anggota" type="button" role="tab" aria-controls="anggota"
                                            aria-selected="false">
                                            <i class="fas fa-users"></i> Anggota
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                            data-bs-target="#detail" type="button" role="tab" aria-controls="detail"
                                            aria-selected="false">
                                            <i class="fas fa-newspaper"></i> Proposal
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="schedule-tab" data-bs-toggle="tab"
                                            data-bs-target="#schedule" type="button" role="tab"
                                            aria-controls="schedule" aria-selected="false">
                                            <i class="fas fa-calendar"></i> Jadwal
                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="ketua" role="tabpanel"
                                        aria-labelledby="ketua-tab">
                                        @include('research-proposal.show-research.ketua')
                                    </div>
                                    <div class="tab-pane fade" id="penelitian" role="tabpanel"
                                        aria-labelledby="penelitian-tab">
                                        @include('research-proposal.show-research.penelitian')
                                    </div>
                                    <div class="tab-pane fade" id="anggota" role="tabpanel"
                                        aria-labelledby="anggota-tab">
                                        @include('research-proposal.show-research.anggota')
                                    </div>
                                    <div class="tab-pane fade" id="detail" role="tabpanel"
                                        aria-labelledby="detail-tab">
                                        @if (empty($researchProposal->researchProposalsDetail))
                                            <div class="alert alert-info m-3 text-white" role="alert">
                                                <strong>Proposal masih kosong!</strong> Silahkan lengkapi terlebih dahulu.
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="schedule" role="tabpanel"
                                        aria-labelledby="schedule-tab">
                                        @if (empty($researchProposal->researchProposalsSchedule))
                                            <div class="alert alert-info m-3 text-white" role="alert">
                                                <strong>Jadwal masih kosong!</strong> Silahkan lengkapi terlebih dahulu.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
