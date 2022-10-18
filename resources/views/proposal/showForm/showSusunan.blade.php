<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Kegiatan</th>
            <th>PIC</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @php($indexSchedule = 0)
        @forelse ($schedule as $s)
            <tr>
                <td scope="row">{{ ++$indexSchedule }}</td>
                <td>{{ $s->kegiatan }}</td>
                <td>{{ $s->user->name }}</td>
                <td>{{ $s->date }}</td>
                <td>{{ $s->times }}</td>
                <td>{{ $s->end_time }}</td>
                <td>{{ $s->notes }}</td>

            </tr>
        @empty
            <tr>
                <td colspan="7" align="center">
                    <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
