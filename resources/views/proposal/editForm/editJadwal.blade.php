<table class="table table-hover table-borderless table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Notes</th>
            @can('PANITIA_UPDATE_PROPOSAL')
                <th colspan="2">Aksi</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        @forelse ($planning_schedule as $ps)
            <tr class="align-middle">
                <form action="{{ route('admin.planning.update', $ps->id) }}" method="POST">
                    @csrf
                    <td>{{ ++$indexJadwal }}</td>
                    <td scope="row"><input type="text" class="form-control" name="kegiatan"
                            value="{{ $ps->kegiatan }}"></td>
                    <td><select class="form-control" name="user_id">
                            <option value="{{ $ps->user_id }}" selected>{{ $ps->user->name }}</option>
                            @foreach ($student as $value)
                                <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select></td>
                    <td>
                        <input type="date" class="form-control" name="date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $ps->date }}">
                    </td>
                    <td>
                        <input type="date" class="form-control" name="end_date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $ps->end_date }}">
                    </td>
                    <td>
                        <input type="text" name='notes' class="form-control" value="{{ $ps->notes }}" />
                    </td>
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td><span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}"
                                    name="proposal_id">
                                <button type="submit" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i></button></span>
                    </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.planning.destroy', $ps->id) }}" method="GET">
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
                    <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>

        @endforelse
    </tbody>
</table>
@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#jadwalModal"><i class="fas fa-plus"></i>
        Jadwal Perencanaan</a>
    @include('proposal.modal.jadwalModal')
@endcan
