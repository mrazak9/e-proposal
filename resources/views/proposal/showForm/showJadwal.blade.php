<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        <tr>
            @forelse ($planning_schedule as $ps)
            <td>{{ ++$indexJadwal }}</td>
                <td scope="row">{{ $ps->kegiatan }}</td>
                <td>{{ $ps->user->name }}</td>
                <td>{{ $ps->date }}</td>
                <td>{{ $ps->notes }}</td>
            
        </tr>
        @empty
        <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi dahulu</span>
        @endforelse
    </tbody>
</table>