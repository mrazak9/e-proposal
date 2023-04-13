@extends('layouts.dashboard')

@section('template_title')
    Proses Dana Rutin
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <h3>Proses Dana Rutin</h3>
                        </span>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <br style="margin-bottom: 1em">
    @php
        $indexTab = 0;
        $indexPanel = 0;
    @endphp
    <div class="row">
        @forelse ($dops as $dop)
            <div class="col-md-4" style="margin-top: 1em; margin-bottom: 1em">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h5 class="card-title">{{ ++$i }}. Pengajuan Dana<br>
                                    @php
                                        $unixTimestamp = strtotime($dop->created_at);
                                        $monthName = strftime('%B', $unixTimestamp);
                                    @endphp
                                    <i class="fas fa-calendar-check"></i> Bulan {{ $monthName }}
                                </h5>
                                <div class="float-right">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            @if ($cekRoles == 'BAS')
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-info"></i>
                                                </button>
                                            @else
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false" disabled>
                                                    <i class="fas fa-info"></i>
                                                </button>
                                            @endif

                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li>
                                                    @if ($dop->isApproved == 1)
                                                        <a href="{{ route('admin.dop.reject', Crypt::encrypt($dop->id)) }}"
                                                            class="dropdown-item" title="Setujui pengajuan">
                                                            <i class="fas fa-times-circle"></i>
                                                            Tolak Pengajuan
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.dop.approve', Crypt::encrypt($dop->id)) }}"
                                                            class="dropdown-item" title="Setujui pengajuan">
                                                            <i class="fas fa-check-circle"></i>
                                                            Setujui Pengajuan
                                                        </a>
                                                        <a href="{{ route('admin.dop.reject', Crypt::encrypt($dop->id)) }}"
                                                            class="dropdown-item" title="Setujui pengajuan">
                                                            <i class="fas fa-times-circle"></i>
                                                            Tolak Pengajuan
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if (!empty($dop->receiptfundsdop))
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.dop.destroyReceiptFund', Crypt::encrypt($dop->id)) }}">
                                                            <i class="fas fa-undo"></i>
                                                            Batalkan Pengambilan Dana
                                                        </a>
                                                    @else
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" role="tablist">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#nav-pengajuan{{ ++$indexPanel }}" type="button" role="tab"
                                    aria-controls="nav-pengajuan" aria-selected="true">Pengajuan</button>
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-dana{{ ++$indexPanel }}"
                                    type="button" role="tab" aria-controls="nav-dana" aria-selected="false">Dana
                                    @if ($dop->receiptfundsdop == null)
                                        <i class="fas fa-hourglass-half text-warning"></i>
                                    @else
                                        <i class="fas fa-check-circle text-success"></i>
                                    @endif
                                </button>
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#nav-revisi{{ ++$indexPanel }}" type="button" role="tab"
                                    aria-controls="nav-revisi" aria-selected="false">Revisi
                                    <span class="badge bg-primary text-white rounded-circle">
                                        {{ $dop->dopRevision->count() }}
                                    </span>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-pengajuan{{ ++$indexTab }}" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <h5 class="card-title">{{ $dop->organization->name }}</h5>
                                <h6>Rincian Pengajuan</h6>
                                @php
                                    $dop_id = $dop->id;
                                    $receiveBy = \App\Models\ReceiptOfFundsDop::select('user_id')
                                        ->where('dop_id', $dop_id)
                                        ->first();
                                    $totalAmount = \App\Models\DopTransaction::select('amount')
                                        ->where('dop_id', $dop_id)
                                        ->sum('amount');
                                @endphp
                                <ul class="list-group list-group-flush">
                                    @foreach ($dop->dop_transaction as $dt)
                                        <li class="list-group-item">
                                            <small>
                                                {{ $dt->category }} - Rp. {{ number_format($dt->amount) }}
                                            </small>
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="font-weight-bold">Total Pengajuan: Rp. {{ number_format($totalAmount) }}</p>
                                <hr>
                                <div class="col-sm-12">
                                    @if ($dop->attachment == null)
                                        <a class="btn btn-sm btn-secondary w-100" disabled>
                                            <i class="fas fa-link"></i>
                                            Belum Ada Link Bukti Penggunaan Dana
                                        </a>
                                    @else
                                        <a class="btn btn-sm btn-info w-100" href="{{ $dop->attachment }}" target="_blank">
                                            <i class="fas fa-link"></i>
                                            Link Bukti Penggunaan Dana
                                        </a>
                                    @endif

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-dana{{ ++$indexTab }}" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>Pencairan Dana</h6>
                                        </div>
                                        @if (empty($dop->receiptfundsdop))
                                            <div class="col-sm-6">
                                                <form action="{{ route('admin.dop.receiptFund', $dop->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    <label>Nama Mahasiswa</label>
                                                    <select class="form-select" name="user_id" required>
                                                        <option selected>== Mahasiswa ==</option>
                                                        @foreach ($users as $value => $key)
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Tanggal Penerimaan</label>
                                                <input class="form-control" type="date" name="tanggal" required>
                                            </div>
                                            <div class="col-sm-12">
                                                <small class="text-xs text-danger">
                                                    *nama yang tercantum hanya yg memiliki akses sebagai bendahara
                                                </small> <br>
                                                <label class="form-label">Nominal</label>
                                                <input class="form-control" type="number" name="nominal"
                                                    value="{{ $totalAmount }}" min="0" required>
                                                <small class="text-danger">*Update nominal bila diperlukan</small>
                                            </div>
                                            <div class="col-sm-12">
                                                @if ($cekRoles == 'BAS')
                                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                                        <i class="fas fa-check">
                                                        </i> Submit Penerimaan Dana
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success btn-sm w-100" disabled>
                                                        <i class="fas fa-check">
                                                        </i> Submit Penerimaan Dana
                                                    </button>
                                                @endif
                                                </form>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <small>
                                                    <i class="fas fa-check text-success"></i> Sudah pencairan
                                                    dana <br>
                                                    <i class="fas fa-calendar"></i>
                                                    {{ $dop->receiptfundsdop->tanggal }} <br>
                                                    <i class="fas fa-user-circle"></i>
                                                    {{ $receiveBy->user->name }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-revisi{{ ++$indexTab }}" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th style="width: 60%">Deskripsi</th>
                                                <th>Waktu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dop->dopRevision as $dr)
                                                <tr>
                                                    <td scope="row">
                                                        <textarea class="form-control" cols="30" rows="3" readonly>{{ $loop->iteration }}. {{ $dr->revision }}</textarea>
                                                    </td>
                                                    <td>
                                                        <i class="fas fa-clock"></i>
                                                        {{ $dr->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        @if ($cekRoles == 'BAS')
                                                            <a class="text-danger"
                                                                href="{{ route('admin.doprevision.deletecomment', $dr->id) }}">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @else
                                                            <a class="text-muted" href="#">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Belum ada revisi ...</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div style="padding: 1em">
                                    <form action="{{ route('admin.dop_revisions.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="dop_id" value="{{ $dop->id }}">
                                        <textarea class="form-control" rows="3" cols="20" placeholder="Add Revision..." name="revision"
                                            required></textarea>
                                        <button class="btn btn-sm btn-primary w-100" type="submit"> <i
                                                class="fas fa-check-circle"></i> Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <em>
                            <small class="text-muted">
                                <i class="fas fa-user-circle"></i>
                                {{ $dop->user->name }}
                            </small>
                            <br>
                            <small>
                                <i class="fas fa-clock"></i>
                                {{ $dop->created_at->format('M d, Y') }} - {{ $dop->created_at->diffForHumans() }}
                            </small>
                        </em>
                        <p class="card-text">
                            @if ($dop->isApproved == 1)
                                <span class="badge bg-gradient-success text-white w-100">Sudah disetujui</span>
                            @elseif ($dop->isApproved == 3)
                                <span class="badge bg-gradient-danger text-white w-100">Pengajuan ditolak</span>
                            @else
                                <span class="badge bg-gradient-warning text-white w-100">Belum disetujui</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center"><i class="fas fa-user-times text-danger"></i> Belum ada
                            pengajuan dana rutin</h4>
                    </div>
                </div>
            </div>
        @endforelse
        {!! $dops->links() !!}
    </div>
@endsection
