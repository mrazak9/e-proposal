@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="mb-0">Daftar Proposal</h3>
                    <div class="float-right">
                        <form action="{{ route('admin.search_pengajuan.proposal') }}" method="GET">
                            <input type="text" class="btn btn-sm btn-outline-info" name="search"
                                value="{{ request('search') }}" placeholder="Cari proposal">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
        @forelse ($proposals as $proposal)
            <div class="col-md-6" style="margin-top: 1em">
                <div class="card">
                    <div class="card-header pb-0 px-3">

                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h4 class="mb-3 text-m">{{ ++$i }}. {{ $proposal->org_name }} |
                                        {{ $proposal->event->name }}</h4>
                                    <span class="mb-2 text-s">Nama Kegiatan: <span
                                            class="text-dark font-weight-bold ms-sm-2">{{ $proposal->name }}</span></span>
                                    <span class="mb-2 text-xs">Tanggal Kegiatan: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{ date('j F Y', strtotime($proposal->tanggal)) }}</span></span>
                                    <span class="text-xs">Tempat Kegiatan: <span
                                            class="text-dark ms-sm-2 font-weight-bold">{{ $proposal->place->name }}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.proposals.show', Crypt::encrypt($proposal->id)) }}"><i
                                                class="fas fa-eye"></i> Show</a>
                                    @endcanany
                            </li>
                        </ul>
                        <i class="bi bi-clock"></i> {{ $proposal->created_at }} by
                        <strong>{{ $proposal->user->name }}</strong> |
                        <strong>Revisi</strong> <span class="badge bg-warning"
                            style="color: white">{{ $proposal->revision->count() }}</span>
                        <div class="card-footer">
                            <strong>Status</strong> <br />
                            @foreach ($proposal->approval as $app)
                                @if ($app->approved == 0)
                                    <span class="badge bg-danger"
                                        style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }} <i
                                            class="fa fa-times faa-pulse animated"></i></span>
                                @else
                                    <span class="badge bg-success"
                                        style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }} <i
                                            class="fa fa-check faa-pulse animated"></i></span>
                                @endif
                            @endforeach
                        </div>
                        @foreach ($proposal->receipt_of_fund as $penerimaanDana)
                            @if ($penerimaanDana->count() < 0)
                                <span class="badge bg-warning text-white" style="width: 100%"><i
                                        class="fas fa-dollar-sign"></i>
                                    Belum melakukan pencairan dana</span>
                            @else
                                <span class="badge bg-info text-white" style="width: 100%"><i
                                        class="fas fa-dollar-sign"></i>
                                    Sudah melakukan pencairan dana</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12" style="margin-top: 1em">
                <div class="card" style="width: 50%; left:25%; right: 25%">
                    <img src="https://img.freepik.com/free-photo/optimistic-happy-active-young-man-encouraging-keep-going-fist-pump-cheerfully-smiling-boosting-confidence_176420-33719.jpg?w=996&t=st=1667531744~exp=1667532344~hmac=009f20f7722cd311a080648a3d78ab185e82d2e8d4f036902096c63eca5791b9"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Belum ada pengajuan Proposal</h5>
                        <p class="card-text">Ayo, ajukan proposal sekarang!. <br><strong>Klik tombol dibawah ini</strong>
                        </p>
                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createProposalModal"><i class="fas fa-plus"></i> Ajukan</a>
                    </div>
                </div>
            </div>
        @endforelse
        <hr style="margin-top: 1em">
        {!! $proposals->links() !!}
    </div>
@endsection
