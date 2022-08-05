@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    <h3>Daftar Proposal</h3>
                </span>

                <div class="float-right">
                    <a href="#" class="btn btn-primary btn-sm float-right"
                        data-placement="left" data-bs-toggle="modal" data-bs-target="#createProposalModal">
                        <i class="bi bi-plus"></i>
                    </a>
                </div>
                @include('proposal.modal.createProposalModal')
            </div>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-3">
                <h5>No. / Nama Proposal</h5>
            </div>
            <div class="col-md-3">
                <h5>Tempat</h5>
            </div>
            <div class="col-md-3">
                <h5>Jenis</h5>
            </div>
            <div class="col-md-3">
                <h5>Tanggal</h5>
            </div>
        </div>
    </div>
    </div>
    <br />
    @foreach ($proposals as $proposal)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        {{ ++$i }}. {{ $proposal->name }}
                    </div>
                    <div class="col-md-3">
                        {{ $proposal->place->name }}
                    </div>
                    <div class="col-md-3">
                        {{ $proposal->event->name }}
                    </div>
                    <div class="col-md-3">
                        {{ $proposal->tanggal }} by <strong>{{ $proposal->user->name }}</strong> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Status</h6>
                    </div>
                    <div class="col-md-3">
                        <h6>Revisi</h5>
                    </div>
                    <div class="col-md-3">
                        <h6>Owner</h5>
                    </div>
                    <div class="col-md-3">
                       <h6>Aksi</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach ($proposal->approval as $app )
                            @if ($app->approved == 0)
                                <span class="badge bg-danger" style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }} <i class="bi bi-x"></i></span>
                            @else
                                <span class="badge bg-success" style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }} <i class="bi bi-check"></i></span>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <span class="badge bg-warning" style="color: white">{{ $proposal->revision->count() }}</span>
                    </div>
                    <div class="col-md-3">
                        <strong>{{ $proposal->org_name }} | {{ $proposal->owner }}</strong>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('admin.proposals.destroy', $proposal->id) }}" method="POST">
                            <div class="col-xs-8">

                                <a class="btn btn-sm btn-primary "
                                    href="{{ route('admin.proposals.show', $proposal->id) }}"><i
                                        class="fa fa-fw fa-eye"></i></a>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('admin.proposals.edit', $proposal->id) }}"><i
                                        class="fa fa-fw fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('global.areYouSure') }}');"><i class="fa fa-fw fa-trash"></i></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ ++$i }}. {{ $proposal->event->name }} - {{ $proposal->name }}</h5>
                  <p class="card-text">{{ $proposal->tujuan_kegiatan }}</p>
                  <hr>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer">
                    {{ $proposal->created_at }} by <strong>{{ $proposal->user->name }}</strong>
                  </div>
              </div>
            </div>
          </div>
    @endforeach
    {!! $proposals->links() !!}
@endsection
