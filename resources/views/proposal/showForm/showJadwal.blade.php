<table class="table table-striped table-inverse table-responsive sortable">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama <br>Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal <br>Mulai</th>
            <th>Tanggal <br>Selesai</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        <tr>
            @forelse ($planning_schedule as $ps)
                <td>{{ ++$indexJadwal }}</td>
                <td>{{ $ps->kegiatan }}</td>
                <td>{{ $ps->user->name }}</td>
                <td>{{ $ps->date }}</td>
                <td>{{ $ps->end_date }}</td>
                <td>
                    <textarea class="form-control" rows="3" cols="30" readonly>{{ $ps->notes }}
                    </textarea>
                </td>

        </tr>
    @empty
        <tr align="center">
            <td colspan="5">
                <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                    dahulu</span>
            </td>
            @endforelse
    </tbody>
</table>
