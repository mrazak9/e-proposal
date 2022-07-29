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
                    <a href="{{ route('admin.proposals.create') }}" class="btn btn-primary btn-sm float-right"
                        data-placement="left">
                        <i class="bi bi-plus"></i>
                    </a>
                </div>
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
                        {{ $proposal->tanggal }}
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
                    <div class="col-md-6">
                       <h6>Aksi</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @if ($proposal->approval->approved == 1)
                            <span class="badge bg-success" style="color: white">Disetujui</span>
                        @else
                            <span class="badge bg-warning" style="color: white">Pengajuan</span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <span class="badge bg-warning" style="color: white">{{ $proposal->revision->count() }}</span>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.proposals.destroy', $proposal->id) }}" method="POST">
                            <div class="col-xs-8">

                                <a class="btn btn-sm btn-primary "
                                    href="{{ route('admin.proposals.show', $proposal->id) }}"><i
                                        class="fa fa-fw fa-eye"></i></a>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('admin.proposals.edit', $proposal->id) }}"><i
                                        class="fa fa-fw fa-edit"></i></a>
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
    @endforeach
    {!! $proposals->links() !!}
@endsection
