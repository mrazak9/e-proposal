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
        @forelse ($dops as $dop)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h5 class="card-title">{{ ++$i }} - Pengajuan Dana
                                @php
                                    $unixTimestamp = strtotime($dop->created_at);
                                    $monthName = strftime('%B', $unixTimestamp);
                                @endphp
                                Bulan {{ $monthName }}
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
                        <strong>Rincian Dana</strong>
                        @foreach ($dop->dop_transaction as $dt)
                            <p style="margin: 0em">Rp. {{ number_format($dt->amount) }} - {{ $dt->category }}</p>
                            @php
                                $totalAmount = $dt->sum('amount');
                            @endphp
                        @endforeach
                        <hr>
                        <p><strong>Total Pengajuan Dana</strong>
                            <br>Rp. {{ number_format($totalAmount) }}
                        </p>
                        <hr>
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
                            <button type="submit" class="btn btn-success w-100"><i class="fas fa-check"></i> Update Bukti
                                Pengeluaran</button>
                        @endcan

                        </form>
                        <br>
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
            const inputField = row.querySelector('input[type="text"]'); // Get the corresponding input field
            const selectedOption = dropdown.options[dropdown.selectedIndex]; // Get the selected option
            inputField.value = selectedOption.id; // Update the input field value

        }
    </script>
@endsection
