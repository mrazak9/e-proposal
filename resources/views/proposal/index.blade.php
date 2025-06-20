@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                @can('CREATE_PROPOSAL')
                    @if (is_null($isExist))
                        <a href="#" class="float btn-primary" data-bs-toggle="modal" data-bs-target="#createProposalModal"
                            title="Create Proposal" style="height: 60px; width:60px">
                            <i class="fa fa-plus my-float" style="margin-top: 20px"></i>
                        </a>
                    @else
                        <a href="#" class="float btn-secondary" title="Lengkapi Dahulu LPJ, sebelum Ajukan Proposal Baru"
                            style="height: 60px; width:60px">
                            <i class="fa fa-plus my-float" style="margin-top: 20px"></i>
                        </a>
                    @endif
                @endcan
                <span id="card_title">
                    <h3>Daftar Proposal
                    </h3>
                </span>

                <div class="float-right">

                    <form action="{{ route('admin.search.proposal') }}" method="GET">
                        <input type="text" class="btn btn-sm btn-outline-info" name="search"
                            value="{{ request('search') }}" placeholder="Cari proposal">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                </div>
                @include('proposal.modal.createProposalModal')
            </div>
        </div>
        <div class="card-body">

            <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#panduan"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-info"></i> Keterangan
            </button>
            <div class="collapse" id="panduan">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <p><span class="badge bg-success text-white"><i class="fas fa-check"></i></span></p>
                            <p><span class="badge bg-danger text-white"><i class="fas fa-times"></i></span></p>
                        </div>
                        <div class="col-md-2">
                            <p>Proposal Telah disetujui</p>
                            <p>Proposal Belum disetujui</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        @forelse ($proposals as $proposal)
            <div class="col-sm-4" style="margin-bottom: 5px; margin-top: 5px">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h5 class="card-title">{{ ++$i }}. {{ $proposal->event->name }} |
                                    {{ $proposal->org_name }}
                                </h5>
                            </span>

                            <div class="float-right">
                                <!-- Example split danger button -->
                                <div class="dropdown">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    @php
                                        $cekLPJ = \App\Models\Approval::select('approved')
                                            ->where('name', 'BAS')
                                            ->where('proposal_id', $proposal->id)
                                            ->first();
                                    @endphp



                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.proposals.show', Crypt::encrypt($proposal->id)) }}">Show</a>
                                            </li>
                                        @endcanany

                                        @canany(['PANITIA_UPDATE_PROPOSAL', 'CREATE_PROPOSAL'])
                                            <li>
                                                @if ($cekLPJ == '{"approved":1}')
                                                    <a class="dropdown-item" href="#" onclick="return false;">Tidak Bisa
                                                        Edit</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.proposals.edit', Crypt::encrypt($proposal->id)) }}">Edit</a>
                                                @endif
                                            </li>
                                        @endcanany
                                        @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.print.proposal', Crypt::encrypt($proposal->id)) }}">Print</a>
                                            </li>
                                        @endcanany
                                        @can('CREATE_PROPOSAL')
                                            <li>
                                                <form
                                                    action="{{ route('admin.proposals.destroy', Crypt::encrypt($proposal->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('{{ trans('global.areYouSure') }}');">Delete</button>
                                                </form>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <strong>Nama Kegiatan:</strong>
                        <p class="card-text">{{ $proposal->name }}</p>
                        <strong>Tema Kegiatan:</strong>
                        <p class="card-text">{{ $proposal->tema_kegiatan }}</p>
                        <hr>
                        <i class="bi bi-clock"> created at: {{ $proposal->created_at }} </i> by
                        <strong>{{ $proposal->user->name }}</strong> |
                        <strong>Revisi</strong> <span class="badge bg-warning"
                            style="color: white">{{ $proposal->revision->count() }}</span>
                    </div>
                    <div class="card-body">
                        <hr>
                        <strong>Status Pengajuan</strong> <br />
                        @foreach ($proposal->approval as $app)
                            @if ($app->approved == 0)
                                <span class="badge bg-danger" style="color: white; margin-top: 5px; margin-bottom: 5px">
                                    @if ($app->name === 'REKTOR')
                                        Wk. Rektor <i class="fa fa-times faa-pulse animated"></i>
                                    @else
                                        {{ $app->name }} <i class="fa fa-times faa-pulse animated"></i>
                                    @endif
                                </span>
                            @else
                                <span class="badge bg-success" style="color: white; margin-top: 5px; margin-bottom: 5px">
                                    @if ($app->name === 'REKTOR')
                                        Wk. Rektor <i class="fa fa-check faa-pulse animated"></i>
                                    @else
                                        {{ $app->name }} <i class="fa fa-check faa-pulse animated"></i>
                                    @endif
                                </span>
                            @endif
                        @endforeach
                        @php
                            $indexDana = 0;
                        @endphp
                        @foreach ($proposal->receipt_of_fund as $penerimaanDana)
                            @if ($penerimaanDana->count() < 0)
                                <span class="badge bg-warning text-white" style="width: 100%"><i
                                        class="fas fa-dollar-sign"></i>
                                    Belum melakukan pencairan dana</span>
                            @else
                                <span class="badge bg-info text-white" style="width: 100%"><i
                                        class="fas fa-dollar-sign"></i>
                                    Sudah melakukan pencairan dana ke. {{ $indexDana + 1 }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <center>
                            <hr>
                            @if ($cekLPJ->approved == 1)
                                @canany(['PANITIA_UPDATE_PROPOSAL', 'CREATE_PROPOSAL'])
                                    <a href="{{ route('admin.lpj.finalize', Crypt::encrypt($proposal->id)) }}"
                                        class="btn btn-sm btn-warning w-100" title="Upload LPJ"><i class="fa fa-book">
                                        </i> Lengkapi LPJ</a>
                                @endcanany('CREATE_PROPOSAL')
                            @endif
                        </center>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="card" style="width: 50%; left:25%; right: 25%">
                    <img src="https://img.freepik.com/free-photo/optimistic-happy-active-young-man-encouraging-keep-going-fist-pump-cheerfully-smiling-boosting-confidence_176420-33719.jpg?w=996&t=st=1667531744~exp=1667532344~hmac=009f20f7722cd311a080648a3d78ab185e82d2e8d4f036902096c63eca5791b9"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Belum ada pengajuan Proposal</h5>
                        <p class="card-text">Ayo, ajukan proposal sekarang!. <br> Hanya <strong>Akun Ketua</strong> yang
                            Bisa Mengajukan
                            Proposal
                        </p>

                        @can('CREATE_PROPOSAL')
                            <strong>Klik tombol dibawah ini</strong><br>
                            <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#createProposalModal"><i class="fas fa-plus"></i> Ajukan</a>
                        @endcan
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    {!! $proposals->links() !!}
@endsection
