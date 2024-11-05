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
                                        <span class="badge bg-warning text-white">Revisi</span>
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
                                @can('AJUKAN_PENELITIAN')
                                    <li>
                                        <form action="{{ route('admin.research-proposals.submit') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $researchProposal->id }}">
                                            @if ($researchProposal->application_status == 0)
                                                <button type="submit" class="dropdown-item"><i class="fas fa-paper-plane"></i>
                                                    Ajukan
                                                </button>
                                            @elseif ($researchProposal->application_status == 1)
                                                <button type="submit" class="dropdown-item"><i class="fas fa-undo"></i>
                                                    Batalkan Pengajuan
                                                </button>
                                            @endif

                                        </form>
                                    </li>
                                @endcan
                                @can('SETUJUI_PENELITIAN')
                                    <li>
                                        <form action="{{ route('admin.research-proposals.approve') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $researchProposal->id }}">
                                            <button type="submit" class="dropdown-item"><i class="fas fa-check"></i> Setujui
                                                Proposal</button>
                                        </form>
                                    </li>
                                @endcan
                                @can('REVISI_PENELITIAN')
                                    <li>
                                        <form action="{{ route('admin.research-proposals.revise') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $researchProposal->id }}">
                                            <button type="submit" class="dropdown-item"><i class="fas fa-comment"></i>
                                                Revisi</button>
                                        </form>
                                    </li>
                                @endcan
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @can('SETUJUI_KONTRAK')
                                    <li>
                                        <form action="{{ route('admin.research-proposals.approve-contract') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $researchProposal->id }}">
                                            <button type="submit" class="dropdown-item"><i class="fas fa-check-double"></i>
                                                Setujui
                                                Kontrak</button>
                                        </form>
                                    </li>
                                @endcan
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
                                            data-bs-target="#detail" type="button" role="tab"
                                            aria-controls="detail" aria-selected="false">
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
                                        @include('research-proposal.show-research.detail')
                                    </div>
                                    <div class="tab-pane fade" id="schedule" role="tabpanel"
                                        aria-labelledby="schedule-tab">
                                        @include('research-proposal.show-research.jadwal')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info text-white" role="alert">
                                    <strong><i class="fas fa-info-circle"></i> Tekan tombol <i
                                            class="fas fa-check text-success"></i></strong> Jika revisi sudah selesai!
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr align="middle">
                                                <th>#</th>
                                                <th>Revisi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $indexRevision = 0;
                                            @endphp
                                            @forelse ($researchProposal->researchProposalsRevision as $revision)
                                                <tr align="middle" style="vertical-align: middle;">
                                                    <td>{{ ++$indexRevision }}</td>
                                                    <td>
                                                        <p>{{ $revision->revision }}
                                                            <hr>
                                                            <small class="text-muted">
                                                                <em><i class="fas fa-user"></i>
                                                                    {{ $revision->lppmUser->user->name }} |
                                                                    {{ $revision->created_at }}</em>
                                                            </small>
                                                        </p>
                                                    </td>
                                                    <td align="middle">
                                                        @if ($revision->isDone == 0)
                                                            <span class="badge bg-danger text-white"><i
                                                                    class="fas fa-times-circle"></i> Belum selesai</span>
                                                        @else
                                                            <span class="badge bg-success text-white"><i
                                                                    class="fas fa-check-circle"></i> selesai</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.research-proposal-revisions.destroy', $revision->id) }}" method="POST">
                                                            <div class="btn-group">
                                                                @if ($revision->isDone == 0)
                                                                    <a href="{{ route('admin.research-proposal-revisions.status', ['revision' => $revision->id, 'status' => 1]) }}"
                                                                        class="btn btn-success btn-sm"
                                                                        title="Set revisi selesai">
                                                                        <i class="fas fa-check-circle"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('admin.research-proposal-revisions.status', ['revision' => $revision->id, 'status' => 0]) }}"
                                                                        class="btn btn-danger btn-sm"
                                                                        title="Set revisi belum selesai">
                                                                        <i class="fas fa-times-circle"></i>
                                                                    </a>
                                                                @endif

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-outline-danger btn-sm"
                                                                    type="submit" title="Batalkan kirim revisi ini"
                                                                    {{ $revision->user_id != Auth::user()->id ? 'disabled' : '' }}
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus revisi ini?');">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>

                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @can('REVISI_PENELITIAN')
                                <form action="{{ route('admin.research-proposal-revisions.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="research_proposals_id" value="{{ $researchProposal->id }}">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="revision"
                                            placeholder="tulis revisi disini dan tekan [ENTER] untuk submit..." required>
                                    </div>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
