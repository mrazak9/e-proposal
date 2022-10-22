<table class="table table-hover table-borderless">
    <thead class="thead-inverse">
        <tr>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Notes</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        @forelse ($planning_schedule as $ps)
            <tr class="align-middle">
                <form action="{{ route('admin.lpj.storejadwalperencanaan', $ps->id) }}" method="POST">
                    @csrf
                    <td>
                        <input type="hidden" class="form-control" name="kegiatan" value="{{ $ps->kegiatan }}">
                        <strong>{{ ++$indexJadwal }}. {{ $ps->kegiatan }}</strong>
                    </td>
                    <td>
                        <input type="hidden" name="user_id" value="{{ $ps->user_id }}">
                        <strong>{{ $ps->user->name }}</strong>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="start_date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $ps->date }}">
                    </td>
                    <td>
                        <input type="date" class="form-control" name="end_date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $ps->end_date }}">
                    </td>
                    <td>
                        <input type="text" name='notes' class="form-control" value="{{ $ps->notes }}" />
                    </td>

                    </td>
                    <td>
                        <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                name="lpj_id">
                            <button type="submit" class="btn btn-success btn-sm"><i
                                    class="fas fa-check">
                                </i>
                            </button>
                                </span>
                    </td>
                </form>
            </tr>
        @empty
            <tr>
                <td colspan="5" align="center">
                    <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
