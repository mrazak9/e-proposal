<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Tipe Peserta</th>
                <th>Total Peserta</th>
                <th>Notes</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexPeserta = 0)
            @forelse ($realize_p as $rp)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.updatepeserta', $rp->id) }}" method="POST">
                        @csrf
                        <td>{{ ++$indexPeserta }}</td>
                        <td><select class="form-control" name="participant_type_id" required>
                                <option value="{{ $rp->participant_type_id }}" selected>{{ $rp->participantType->name }}
                                </option>
                                @foreach ($participantType as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select></td>
                        <td><input type="number" class="form-control" min="0" name="participant_total"
                                value="{{ $rp->participant_total }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="participant_notes" maxlength="30"
                                value="{{ $rp->notes }}">
                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td>
                                <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                        name="lpj_id">
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></button></span>
                        </form>
                        </td>
                    @endcan
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td>
                            <form method="POST" action="{{ route('admin.lpj.deletepeserta', $rp->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6">
                        <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>
            @endforelse
            <tr>
                <td colspan="2"><strong>Total Peserta:</strong></td>
                <td><strong><span class="uang">{{ $sum_realize_participants }}</span><span> orang</span></strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pesertaM"><i class="fas fa-plus"></i>
        Peserta</a>
    @include('lpj.modal.peserta')
@endcan
