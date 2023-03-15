@extends('layouts.dashboard')

@section('template_title')
    Proses Dana Operasional
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <h3>Proses Dana Operasional</h3>
                        </span>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <br style="margin-bottom: 1em">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Pengajuan yang masuk</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">Nama /
                                        Organisasi
                                    </th>
                                    <th class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2">
                                        Jenis Pengajuan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Tanggal Masuk</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Lampiran</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                        Setujui?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dops as $dop)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">{{ ++$i }}. {{ $dop->user->name }}
                                                    </h6>
                                                    <p class="text-sm text-secondary mb-0">{{ $dop->organization->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-md font-weight-bold mb-0">{{ $dop->note }} - Rp.
                                                {{ number_format($dop->amount) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($dop->isApproved == 1)
                                                <span class="badge bg-gradient-success text-white">Sudah disetujui</span>
                                            @else
                                                <span class="badge bg-gradient-danger text-white">Belum disetujui</span>
                                            @endif


                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-md font-weight-bold">{{ date('j F Y', strtotime($dop->created_at)) }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($dop->attachment == null)
                                                <a class="btn btn-danger btn-sm" href="#" title="Belum ada lampiran">
                                                    <i class="fas fa-minus"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-info btn-sm" href="{{ $dop->attachment }}"
                                                    target="_blank">
                                                    <i class="fas fa-link"></i>
                                                </a>
                                            @endif

                                        </td>
                                        <td align="center">
                                            @if ($dop->isApproved == 1)
                                                <a href="{{ route('admin.dop.revoke', Crypt::encrypt($dop->id)) }}"
                                                    class="btn btn-danger btn-sm text-white" title="Tolak pengajuan">
                                                    <i class="fas fa-times-circle"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.dop.approve', Crypt::encrypt($dop->id)) }}"
                                                    class="btn btn-success btn-sm text-white" title="Setujui pengajuan">
                                                    <i class="fas fa-check-circle"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="5"><span class="badge bg-danger text-white">Belum ada
                                                pengajuan
                                                masuk</span></td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
