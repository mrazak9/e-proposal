<table class="table table-hover table-borderless table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
            <th>Notes</th>
            <th>Aksi</th>
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
                        <input type="text" class="form-control" name="participant_notes" value="{{ $rp->notes }}">
                    </td>

                    <td>
                        <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                name="lpj_id">
                            <button type="submit" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></button></span>
                </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.lpj.deletepeserta', $rp->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                    </form>
                </td>

            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>

        @endforelse
    </tbody>
</table>
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pesertaM"><i class="fas fa-plus"></i>
    Susunan Acara</a>
@include('lpj.modal.peserta')
