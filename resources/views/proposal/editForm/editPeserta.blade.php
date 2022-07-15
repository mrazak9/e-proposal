@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-hover table-borderless">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexPeserta = 0)
        @foreach ($participants as $p)
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
                    <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}"
                                name="proposal_id">
                            <button type="submit" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil"></i></button></span>
                </form>
                </td>
                <td>
                    <form action="{{ route('admin.participant.destroy', $p->id) }}" method="GET">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        <tr class="table table-secondary">
            <td colspan="4"><strong>Total Peserta:</strong></td>
            <td><strong><span class="uang">{{ $sum_participants }}</span><span> orang</span></strong>
            </td>
        </tr>
    </tbody>
</table>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pesertaModal">Add Peserta</a>
@include('proposal.modal.pesertaModal')
