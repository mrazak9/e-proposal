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
    <div class="row">
        @php
            $index = 0;
            $indexComment = 0;
        @endphp
        @forelse ($dops as $dop)
            <div class="col-md-4">
                <div class="card">
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
                    <div class="card-body">
                        <h5 class="card-title">{{ $dop->organization->name }}</h5>
                        <p class="card-text">
                            @if ($dop->isApproved == 1)
                                <span class="badge bg-gradient-success text-white">Sudah disetujui</span>
                            @elseif ($dop->isApproved == 3)
                                <span class="badge bg-gradient-danger text-white">Pengajuan ditolak</span>
                            @else
                                <span class="badge bg-gradient-warning text-white">Belum disetujui</span>
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
                        {{-- Revisi Pengajuan Dana Rutin --}}
                        <hr>
                        <h5>Revisi
                            <span class="badge bg-info text-white">{{ $dop->dopRevision->count() }}</span>
                        </h5>
                        <ul>
                            @forelse ($dop->dopRevision as $dr)
                                <li class="text-sm">
                                    <i class="fas fa-comment"></i> {{ $dr->revision }} - <i class="fas fa-clock"></i>
                                    {{ $dr->created_at->diffForHumans() }}
                                    <a class="text-danger"
                                        href="{{ route('admin.doprevision.deletecomment', $dr->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </li>
                            @empty
                                <li class="text-sm">
                                    Belum Ada Revisi Pengajuan Dana Rutin
                                </li>
                            @endforelse
                        </ul>
                        @can('APPROVAL_DOP')
                            @if ($cekRoles == 'BAS')
                                <button class="btn btn-sm btn-info w-100" onclick="showCommentBox{{ ++$index }}()"> <i
                                        class="fas fa-eye"></i>
                                    Show Comment Box
                                </button>
                            @else
                            @endif
                        @endcan

                        <div id="comment{{ ++$indexComment }}" style="padding: 1em; display: none">
                            <form action="{{ route('admin.dop_revisions.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="dop_id" value="{{ $dop->id }}">
                                <textarea class="form-control" rows="3" cols="20" placeholder="Add Revision..." name="revision"
                                    required></textarea>
                                <button class="btn btn-sm btn-primary w-100" type="submit"> <i
                                        class="fas fa-check-circle"></i> Submit</button>
                            </form>
                        </div>
                        <hr>
                        {{-- End of Revisi Pengajuan Dana Rutin --}}
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
            <div class="card text-start text-center">
                <div class="card-body">
                    <h4 class="card-title text-danger"><i class="fa fa-info-circle" aria-hidden="true"></i> Belum ada
                        Pengajuan Dana Rutin</h4>
                </div>
            </div>
        @endforelse
        <br>
        <div style="margin-top: 1em">
            {!! $dops->links() !!}
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        function showCommentBox1() {
            var x = document.getElementById("comment1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox2() {
            var x = document.getElementById("comment2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox3() {
            var x = document.getElementById("comment3");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox4() {
            var x = document.getElementById("comment4");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox5() {
            var x = document.getElementById("comment5");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox6() {
            var x = document.getElementById("comment6");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox7() {
            var x = document.getElementById("comment7");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox8() {
            var x = document.getElementById("comment8");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox9() {
            var x = document.getElementById("comment9");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showCommentBox10() {
            var x = document.getElementById("comment10");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
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
