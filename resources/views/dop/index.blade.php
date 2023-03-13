@extends('layouts.dashboard')

@section('template_title')
    Daftar Dana Operasional
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <h3>Daftar Dana Operasional</h3>
                            <h4>{{ $orgName }}</h4>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('admin.dops.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <br style="margin-bottom: 1em">
    <div class="row">
        @forelse ($dops as $dop)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h5 class="card-title">{{ ++$i }} - {{ $dop->note }}
                                @php
                                    $unixTimestamp = strtotime($dop->created_at);
                                    $monthName = strftime('%B', $unixTimestamp);
                                @endphp
                                Bulan {{ $monthName }}
                            </h5>
                            <div class="float-right">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-info"></i> Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('admin.dops.destroy', Crypt::encrypt($dop->id)) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"
                                                        href="#">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ number_format($dop->amount) }}</h5>
                        <p class="card-text">Bukti Pengeluaran</p>
                        <small class="text-danger">*sisipkan bukti pembayaran dalam 1 link google drive</small>
                        <div class="col-sm-12">
                            <form action="{{ route('admin.dops.update', Crypt::encrypt($dop->id)) }}">

                                {{ method_field('PATCH') }}
                                @csrf
                                <input class="form-control" type="text" value="{{ $dop->attachment }}"
                                    placeholder="link untuk pembayaran masih kosong">

                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Update Bukti
                            Pengeluaran</button>
                        </form>
                        <br>
                        <small>
                            <em>
                                <i class="fas fa-user-circle    "></i>
                                dibuat oleh: {{ $dop->user->name }}
                                <i class="fas fa-clock"></i>
                                {{ $dop->created_at }}
                            </em>
                        </small>
                        <span class="badge bg-warning w-100 text-white">Pengajuan belum disetujui</span>
                    </div>

                </div>
                {!! $dops->links() !!}
            </div>
        @empty
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Belum ada pengajuan DOP untuk Bulan {{ date('F') }} ini.</h5>
                        <p class="card-text">Silahkan melakukan pengajuan.</p>
                        <a href="#" class="btn btn-success">Create New</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
