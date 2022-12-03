<table class="table table-striped table-inverse table-responsive sortable">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama <br>Kegiatan</th>
            <th>PIC</th>
            <th>Tanggal</th>
            <th>Waktu <br>Mulai</th>
            <th>Waktu <br>Selesai</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @php($indexSchedule = 0)
        @forelse ($schedule as $s)
            <tr>
                <td>{{ ++$indexSchedule }}</td>
                <td scope="row">{{ $s->kegiatan }}</td>
                <td>{{ $s->user->name }}</td>
                <td>{{ $s->date }}</td>
                <td>{{ $s->times }}</td>
                <td>{{ $s->end_time }}</td>
                <td>
                    <textarea class="form-control" rows="3" cols="30" readonly>{{ $s->notes }}</textarea>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6" align="center">
                    <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
