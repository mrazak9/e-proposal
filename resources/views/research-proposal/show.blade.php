@extends('layouts.dashboard')

@section('template_title')
    {{ $researchProposal->title ?? 'Show Research Proposal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('admin.research-proposals.index') }}">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <span class="card-title">
                                    <h3><i class="fas fa-eye text-info"></i> Lihat Pengajuan Penelitian |
                                        {{ $researchProposal->title }}</h3>
                                </span>
                                <hr>
                            </div>
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
                                            Identitas Ketua
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penelitian-tab" data-bs-toggle="tab"
                                            data-bs-target="#penelitian" type="button" role="tab" aria-controls="penelitian"
                                            aria-selected="false">
                                            Penelitian
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="anggota-tab" data-bs-toggle="tab"
                                            data-bs-target="#anggota" type="button" role="tab"
                                            aria-controls="anggota" aria-selected="false">
                                            anggota
                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="ketua" role="tabpanel" aria-labelledby="ketua-tab">
                                        @include('research-proposal.show-research.ketua')
                                    </div>
                                    <div class="tab-pane" id="penelitian" role="tabpanel" aria-labelledby="penelitian-tab">
                                        @include('research-proposal.show-research.penelitian')
                                    </div>
                                    <div class="tab-pane" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
                                        anggota
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
