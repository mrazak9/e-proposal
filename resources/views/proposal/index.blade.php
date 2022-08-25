@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    <h3>Daftar Proposal
                        @can('CREATE_PROPOSAL')
                            <a title="Create New Proposal" href="#" class="btn btn-success btn-sm float-right"
                                data-placement="left" data-bs-toggle="modal" data-bs-target="#createProposalModal">
                                <i class="fa fa-plus"></i>
                            </a>
                        @endcan
                    </h3>
                </span>

                <div class="float-right">

                    <form action="{{ route('admin.search.proposal') }}" method="GET">
                        <input type="text" class="btn btn-sm btn-outline-secondary" name="search"
                            value="{{ request('search') }}" placeholder="Cari proposal">
                        <button class="btn btn-sm btn-secondary" type="submit"><i class="fas fa-search"></i></button>
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
        @foreach ($proposals as $proposal)
            <div class="col-sm-6" style="margin-bottom: 5px; margin-top: 5px">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h5 class="card-title">{{ ++$i }}. {{ $proposal->event->name }} |
                                    {{ $proposal->org_name }} - {{ $proposal->name }}</h5>
                            </span>

                            <div class="float-right">
                                <!-- Example split danger button -->
                                <div class="dropdown">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @canany(['PANITIA_VIEW_PROPOSAL', 'VIEW_PROPOSAL'])
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.proposals.show', Crypt::encrypt($proposal->id)) }}">Show</a>
                                            </li>
                                        @endcanany

                                        @canany(['PANITIA_UPDATE_PROPOSAL', 'CREATE_PROPOSAL'])
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.proposals.edit', Crypt::encrypt($proposal->id)) }}">Edit</a>
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

                    </div>
                    <div class="card-body">

                        <p class="card-text">{{ $proposal->tujuan_kegiatan }}</p>
                        <hr>
                        <i class="bi bi-clock"></i> {{ $proposal->created_at }} by
                        <strong>{{ $proposal->user->name }}</strong> |
                        <strong>Revisi</strong> <span class="badge bg-warning"
                            style="color: white">{{ $proposal->revision->count() }}</span>
                    </div>
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
                </div>
            </div>
        @endforeach
    </div>
    <br />
    {!! $proposals->links() !!}
@endsection
