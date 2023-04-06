@extends('layouts.dashboard')

@section('template_title')
    Daftar Dana Rutin
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <h3>Daftar Dana Rutin</h3>
                            <h4>{{ $orgName }}</h4>
                        </span>
                        @can('CREATE_DOP')
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
                        @endcan

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
            $indexTab = 0;
            $indexPanel = 0;
        @endphp
        @forelse ($dops as $dop)
            <div class="col-md-4" style="margin-bottom: 1em; margin-top: 1em">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h5 class="card-title">{{ ++$i }}. Pengajuan Dana <br>
                                @php
                                    $unixTimestamp = strtotime($dop->created_at);
                                    $monthName = strftime('%B', $unixTimestamp);
                                @endphp
                                <i class="fas fa-calendar-check"></i> Bulan {{ $monthName }}
                            </h5>
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
                                                <form method="POST"
                                                    action="{{ route('admin.dops.destroy', Crypt::encrypt($dop->id)) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($dop->isApproved == 0)
                                                        <button type="submit" class="dropdown-item" href="#"><i
                                                                class="fas fa-trash"></i> Delete</button>
                                                    @else
                                                        <p class="dropdown-item" href="#" disabled><i
                                                                class="fas fa-check-circle">
                                                            </i> Sudah
                                                            disetujui</p>
                                                    @endif

                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" role="tablist">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#nav-pengajuan{{ ++$indexPanel }}" type="button" role="tab"
                                    aria-controls="nav-pengajuan" aria-selected="true">Pengajuan</button>
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-bukti{{ ++$indexPanel }}"
                                    type="button" role="tab" aria-controls="nav-bukti" aria-selected="false">Bukti
                                    @if ($dop->attachment == null)
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @else
                                        <i class="fas fa-check text-success"></i>
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
                                <strong>Rincian Dana</strong>
                                @foreach ($dop->dop_transaction as $dt)
                                    <p style="margin: 0em">Rp. {{ number_format($dt->amount) }} - {{ $dt->category }}</p>
                                @endforeach
                                @php
                                    $dop_id = $dop->id;
                                    $totalAmount = \App\Models\DopTransaction::where('dop_id', $dop_id)->sum('amount');
                                @endphp
                                <p class="font-weight-bold">Total Pengajuan: Rp. {{ number_format($totalAmount) }}</p>
                            </div>
                            <div class="tab-pane fade" id="nav-bukti{{ ++$indexTab }}" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <p class="card-text font-weight-bold">Bukti Pengeluaran <br>
                                    <small class="text-danger">*sisipkan bukti pembayaran dalam 1 link google drive</small>
                                </p>
                                <div class="col-sm-12">
                                    <form action="{{ route('admin.dop.updateattachment', Crypt::encrypt($dop->id)) }}"
                                        method="POST" onkeydown="return event.key != 'Enter';">
                                        @csrf
                                        <input class="form-control" type="text" value="{{ $dop->attachment }}"
                                            placeholder="link untuk bukti pengeluaran masih kosong" name="attachment">

                                </div>
                                @can('CREATE_DOP')
                                    <button type="submit" class="btn btn-success w-100"><i class="fas fa-check"></i> Update
                                        Bukti
                                        Penggunaan Dana</button>
                                @endcan
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-revisi{{ ++$indexTab }}" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <ul>
                                    @forelse ($dop->dopRevision as $dr)
                                        <li class="text-sm">
                                            <i class="fas fa-comment text-info"></i> {{ $dr->revision }} <br>
                                            <em>
                                                <i class="fas fa-user text-success"></i> {{ $dr->user->name }} -
                                                <i class="fas fa-clock"></i>
                                            </em>
                                            {{ $dr->created_at->diffForHumans() }}
                                            <hr>
                                        </li>
                                    @empty
                                        <li class="text-sm">
                                            Belum Ada Revisi Pengajuan Dana Rutin
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <small>
                            <em>
                                <i class="fas fa-user-circle    "></i>
                                dibuat oleh: {{ $dop->user->name }}
                                <br>
                                <i class="fas fa-clock"></i>
                                {{ $dop->created_at->format('M d, Y') }} - {{ $dop->created_at->diffForHumans() }}
                            </em>
                        </small>
                        @if ($dop->isApproved == 0)
                            <span class="badge bg-warning w-100 text-white">Pengajuan belum disetujui</span>
                        @elseif($dop->isApproved == 1)
                            <span class="badge bg-success w-100 text-white">Pengajuan sudah disetujui</span>
                        @else
                            <span class="badge bg-danger w-100 text-white">Pengajuan ditolak</span>
                        @endif
                        <small class="text-danger"><em>
                                *Pengambilan dana hanya dapat dilakukan oleh Bendahara</em>
                        </small>
                    </div>
                </div>
            </div>
            {!! $dops->links() !!}
        @empty
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Belum ada pengajuan DOP.</h5>
                        <p class="card-text">Silahkan melakukan pengajuan.</p>
                        @can('CREATE_DOP')
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#dopModal"><i
                                    class="fa fa-plus"> Ajukan sekarang</i></button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforelse

    </div>
    @include('dop.modal')
@endsection
@section('scripts')
    <script>
        // const dropdown = document.getElementById('dropdown');
        // const colorInput = document.getElementById('amount');

        // dropdown.addEventListener('change', () => {
        //     if (dropdown.value == 'DOP') {
        //         colorInput.value = '100000';
        //         colorInput.readOnly = true;
        //     } else if (dropdown.value == 'PELATIH') {
        //         colorInput.value = '500000';
        //         colorInput.readOnly = false;
        //     } else if (dropdown.value == 'SEWA LAPANG') {
        //         colorInput.value = '1500000';
        //         colorInput.readOnly = false;
        //     } else {
        //         colorInput.value = ''; // Default value if no option is selected
        //     }
        // });
        function updateInputField(dropdown) {
            const row = dropdown.closest('tr'); // Get the parent row of the dropdown
            const inputField = row.querySelector('input[type="number"]'); // Get the corresponding input field
            const selectedOption = dropdown.options[dropdown.selectedIndex]; // Get the selected option
            inputField.value = selectedOption.id; // Update the input field value

        }
    </script>
@endsection
