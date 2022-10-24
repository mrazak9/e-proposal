<table class="table table-hover table-borderless table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
            <th>Notes</th>
            @can('PANITIA_UPDATE_PROPOSAL')
                <th colspan="3">Aksi</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @php($indexPeserta = 0)
        @forelse ($participants as $p)
            <tr class="align-middle">
                <form action="{{ route('admin.participant.update', $p->id) }}" method="POST">
                    @csrf
                    <td scope="row">{{ ++$indexPeserta }}</td>
                    <td><select class="form-control" name="participant_type_id" required>
                            <option value="{{ $p->participant_type_id }}" selected>{{ $p->participantType->name }}
                            </option>
                            @foreach ($participantType as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select></td>
                    <td><input type="number" class="form-control" min="0" name="participant_total"
                            value="{{ $p->participant_total }}">
                    </td>
                    <td>
                        <textarea class="form-control" name="participant_notes" maxlength="30" rows="3" cols="30">{{ $p->notes }}</textarea>
                    </td>
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td><span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}"
                                    name="proposal_id">
                                <button type="submit" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i></button></span>
                    </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.participant.destroy', $p->id) }}" method="GET">
                            <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                @endcan

            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
                </td>
            </tr>

        @endforelse
        <tr class="table table-secondary">
            <td colspan="2"><strong>Total Peserta:</strong></td>
            <td><strong><span class="uang">{{ $sum_participants }}</span><span> orang</span></strong>
            </td>
        </tr>
    </tbody>
</table>
@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pesertaModal"><i class="fas fa-plus"></i>
        Peserta</a>
    @include('proposal.modal.pesertaModal')
@endcan
