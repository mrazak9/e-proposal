<table class="table table-hover table-borderless table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Notes</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        @forelse ($realize_s as $rs)
            <tr class="align-middle">
                <form action="{{ route('admin.lpj.updatesusunan', $rs->id) }}" method="POST">
                    @csrf
                    <td>{{ ++$indexJadwal }}</td>
                    <td scope="row"><input type="text" class="form-control" name="kegiatan"
                            value="{{ $rs->kegiatan }}"></td>
                    <td><select class="form-control" name="user_id">
                            <option value="{{ $rs->user_id }}" selected>{{ $rs->user->name }}</option>
                            @foreach ($student as $value)
                                <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select></td>
                    <td>
                        <input type="date" class="form-control" name="date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $rs->date }}">
                    </td>
                    <td>
                        <input type="time" class="form-control" name="start_time" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $rs->start_time }}">
                    </td>
                    <td>
                        <input type="time" class="form-control" name="end_time" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $rs->end_time }}">
                    </td>
                    <td>
                        <input type="text" name='notes' class="form-control" value="{{ $rs->notes }}" />
                    </td>
                    <td><span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                name="lpj_id">
                            <button type="submit" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></button></span>
                </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.lpj.deletesusunan', $rs->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                    </form>
                </td>

            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>

        @endforelse
    </tbody>
</table>
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#jadwalM"><i class="fas fa-plus"></i>
    Jadwal Perencanaan</a>
@include('lpj.modal.jadwal')
