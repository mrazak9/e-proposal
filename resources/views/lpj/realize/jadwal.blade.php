<table class="table table-hover table-borderless table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Notes</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        @forelse ($realize_ps as $rps)
            <tr class="align-middle">
                <form action="{{ route('admin.lpj.updatejadwalperencanaan', $rps->id) }}" method="POST">
                    @csrf
                    <td>{{ ++$indexJadwal }}</td>
                    <td scope="row"><input type="text" class="form-control" name="kegiatan"
                            value="{{ $rps->kegiatan }}"></td>
                    <td><select class="form-control" name="user_id">
                            <option value="{{ $rps->user_id }}" selected>{{ $rps->user->name }}</option>
                            @foreach ($student as $value)
                                <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select></td>
                    <td>
                        <input type="date" class="form-control" name="start_date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $rps->start_date }}">
                    </td>
                    <td>
                        <input type="date" class="form-control" name="end_date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $rps->end_date }}">
                    </td>
                    <td>
                        <input type="text" name='notes' class="form-control" value="{{ $rps->notes }}" />
                    </td>
                    <td><span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                name="lpj_id">
                            <button type="submit" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></button></span>
                </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.lpj.deletejadwalperencanaan', $rps->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                    </form>
                </td>

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
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#jadwalM"><i class="fas fa-plus"></i>
    Jadwal Perencanaan</a>
@include('lpj.modal.jadwal')
