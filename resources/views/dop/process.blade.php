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
        @forelse ($dops as $dop)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h4 class="card-title">{{ ++$i }} - Pengajuan Dana
                                @php
                                    $unixTimestamp = strtotime($dop->created_at);
                                    $monthName = strftime('%B', $unixTimestamp);
                                @endphp
                                Bulan {{ $monthName }}
                            </h4>
                            <div class="float-right">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li>
                                                @if ($dop->isApproved == 1)
                                                    <a href="{{ route('admin.dop.revoke', Crypt::encrypt($dop->id)) }}"
                                                        class="dropdown-item" title="Tolak pengajuan">
                                                        <i class="fas fa-times-circle"></i>
                                                        Tolak Pengajuan
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.dop.approve', Crypt::encrypt($dop->id)) }}"
                                                        class="dropdown-item" title="Setujui pengajuan">
                                                        <i class="fas fa-check-circle"></i>
                                                        Setujui Pengajuan
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
                    <div class="card-body">
                        <h5 class="card-title">{{ $dop->organization->name }}</h5>
                        <p class="card-text">
                            @if ($dop->isApproved == 1)
                                <span class="badge bg-gradient-success text-white">Sudah disetujui</span>
                            @else
                                <span class="badge bg-gradient-danger text-white">Belum disetujui</span>
                            @endif
                        </p>
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
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6>Pencairan Dana</h6>
                                </div>
                                @if (empty($dop->receiptfundsdop))
                                    <div class="col-sm-6">
                                        <form action="{{ route('admin.dop.receiptFund', $dop->id) }}" method="GET">
                                            @csrf
                                            <select class="form-select" name="user_id" required>
                                                <option selected>== Mahasiswa ==</option>
                                                @foreach ($users as $value => $key)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach

                                            </select>
                                    </div>
                                    <div class="col-sm-6">
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
                                        <button type="submit" class="btn btn-success btn-sm w-100">
                                            <i class="fas fa-check">
                                            </i> Submit Penerimaan Dana
                                        </button>
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
                    </div>
                </div>
            </div>
        @empty
            <div class="card text-start">
                <img class="card-img-top" src="holder.js/100px180/" alt="Title">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Body</p>
                </div>
            </div>
    </div>
    @endforelse
@endsection
{{-- @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#name-input').on('input', function() {
            const query = $(this).val();

            $.get('{{ route('admin.suggest.users') }}', {
                q: query
            }, function(suggestions) {
                const suggestionsList = $('#name-suggestions');

                // Clear the previous suggestions
                suggestionsList.empty();

                // Add the new suggestions
                suggestions.forEach(function(suggestion) {
                    const listItem = $('<li>').text(suggestion);
                    suggestionsList.append(listItem);
                });

                // Show or hide the suggestions list
                if (suggestions.length > 0) {
                    suggestionsList.show();
                } else {
                    suggestionsList.hide();
                }
            });
        });

        $('#name-suggestions').on('click', 'li', function() {
            const suggestion = $(this).text();
            $('#name-input').val(suggestion);
            $('#name-suggestions').hide();
        });
    </script>
@endsection --}}
