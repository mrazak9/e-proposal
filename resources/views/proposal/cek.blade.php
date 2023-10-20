@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Daftar Proposal</h3>

                <div class="card-title">
                    <form class="form-inline" action="{{ route('admin.search_pengajuan.proposal') }}" method="GET">
                        <input type="text" class="btn btn-sm btn-outline-info w-90" name="search"
                            value="{{ request('search') }}" placeholder="Cari proposal">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Proposal Masuk</h3>
                                <p class="text-sm">
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">{{ $proposal_success }} Proposal
                                        selesai</span>
                                    tahun
                                    {{ date('Y') }}
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        # Organisasi/Kegiatan
                                    </th>
                                    <th>
                                        Nama Kegiatan
                                    </th>
                                    <th>
                                        Tanggal/Tempat Kegiatan
                                    </th>
                                    <th>
                                        Pencairan Dana
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
                                            {{ ++$i }}. <strong>{{ $proposal->org_name }}</strong> /
                                            {{ $proposal->event->name }}
                                        </td>
                                        <td>
                                            <textarea class="form-control" cols="30" rows="4" readonly>{{ $proposal->name }}</textarea>
                                        </td>
                                        <td>
                                            <p class="text-break">
                                                <strong>
                                                    <i class="fas fa-calendar"></i>
                                                    {{ date('j F Y', strtotime($proposal->tanggal)) }} <br>
                                                </strong>
                                                <i class="fas fa-map-pin"></i> {{ $proposal->place->name }}

                                            </p>
                                        </td>
                                        <td>
                                            @php
                                                $indexDana = 0;
                                            @endphp
                                            <p>
                                                @foreach ($proposal->receipt_of_fund as $penerimaanDana)
                                                    @if ($penerimaanDana)
                                                        <span class="badge rounded-pill bg-info text-white"><i
                                                                class="fas fa-dollar-sign"></i>
                                                            Pencairan dana ke.
                                                            {{ ++$indexDana }}</span><br>
                                                    @else
                                                        <span class="badge rounded-pill bg-warning text-white"><i
                                                                class="fas fa-dollar-sign"></i>
                                                            Belum melakukan pencairan dana</span> <br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.proposals.show', Crypt::encrypt($proposal->id)) }}"><i
                                                            class="fas fa-eye"></i></a>
                                                @endcanany
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.print.proposal', Crypt::encrypt($proposal->id)) }}"
                                                    target="_blank"><i class="fas fa-print"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <small>
                                                    created at:
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $proposal->created_at }} </i><br>by
                                                    <strong>{{ $proposal->user->name }}</strong>
                                                </small>
                                            </p>

                                        </td>
                                        <td colspan="4">
                                            <p class="fw-bold">
                                                <small>
                                                    Status:
                                                    @foreach ($proposal->approval as $app)
                                                        @if ($app->approved == 0)
                                                            <span class="badge bg-danger"
                                                                style="color: white; margin-top: 5px; margin-bottom: 5px">
                                                                @if ($app->name === 'REKTOR')
                                                                    Wk. Rektor <i
                                                                        class="fa fa-times faa-pulse animated"></i>
                                                                @else
                                                                    {{ $app->name }} <i
                                                                        class="fa fa-times faa-pulse animated"></i>
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="badge bg-success"
                                                                style="color: white; margin-top: 5px; margin-bottom: 5px">
                                                                @if ($app->name === 'REKTOR')
                                                                    Wk. Rektor <i
                                                                        class="fa fa-check faa-pulse animated"></i>
                                                                @else
                                                                    {{ $app->name }} <i
                                                                        class="fa fa-check faa-pulse animated"></i>
                                                                @endif
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </small>
                                            </p>
                                            <p>
                                                <small>
                                                    <strong>
                                                        Revisi:
                                                    </strong>
                                                    <span class="badge bg-warning"
                                                        style="color: white">{{ $proposal->revision->count() }}</span>
                                                </small>
                                            </p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" align="center">
                                            <span class="badge bg-danger text-white">Belum ada Proposal Masuk</span>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $proposals->links() !!}
            </div>
        </div>
    </div>
    {{-- @forelse ($proposals as $proposal)
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
                                    <div class="btn-group" role="group">
                                        @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.proposals.show', Crypt::encrypt($proposal->id)) }}"><i
                                                    class="fas fa-eye"></i></a>
                                        @endcanany
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.print.proposal', Crypt::encrypt($proposal->id)) }}"
                                            target="_blank"><i class="fas fa-print"></i></a>
                                    </div>

                                </div>
                            </li>
                        </ul>
                        <i class="bi bi-clock"> created at: {{ $proposal->created_at }} </i>by
                        <strong>{{ $proposal->user->name }}</strong> |
                        <strong>Revisi</strong> <span class="badge bg-warning"
                            style="color: white">{{ $proposal->revision->count() }}</span>
                        <div class="card-footer">
                            <strong>Status Pengajuan</strong> <br />
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
                                    Sudah melakukan pencairan dana ke. {{ ++$indexDana }}</span>
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
        @endforelse --}}
@endsection
