<script>
    var msg = '{{ Session::get('alert_participant') }}';
    var exist = '{{ Session::has('alert_participant') }}';
    if (exist) {
        alert(msg);
    }
</script>
<table class="table table-hover table-borderless">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
            @can('PANITIA_UPDATE_PROPOSAL')
                <th colspan="2">Aksi</th>
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
            <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
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
