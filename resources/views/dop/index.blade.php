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
                            @if ($isExist > 0)
                                <button class="btn btn-sm btn-warning text-white"
                                    title="Mohon lengkapi bukti pengeluaran terlebih dahulu" disabled><i
                                        class="fa fa-lock"></i></button>
                            @else
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dopModal"><i
                                        class="fa fa-plus"></i></button>
                            @endif

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
            <div class="col-md-4">
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
                            <form action="{{ route('admin.dop.updateattachment', Crypt::encrypt($dop->id)) }}"
                                method="POST">
                                @csrf
                                <input class="form-control" type="text" value="{{ $dop->attachment }}"
                                    placeholder="link untuk bukti pengeluaran masih kosong" name="attachment">

                        </div>
                        <button type="submit" class="btn btn-success w-100"><i class="fas fa-check"></i> Update Bukti
                            Pengeluaran</button>
                        </form>
                        <br>
                        <small>
                            <em>
                                <i class="fas fa-user-circle    "></i>
                                dibuat oleh: {{ $dop->user->name }}
                                <br>
                                <i class="fas fa-clock"></i>
                                {{ $dop->created_at }}
                            </em>
                        </small>
                        @if ($dop->isApproved == 0)
                            <span class="badge bg-warning w-100 text-white">Pengajuan belum disetujui</span>
                        @else
                            <span class="badge bg-info w-100 text-white">Pengajuan sudah disetujui</span>
                        @endif

                    </div>

                </div>
                {!! $dops->links() !!}
            </div>
        @empty
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Belum ada pengajuan DOP.</h5>
                        <p class="card-text">Silahkan melakukan pengajuan.</p>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dopModal"><i
                                class="fa fa-plus"></i></button>

                    </div>
                </div>
            </div>
        @endforelse
    </div>
    @include('dop.modal')
@endsection
