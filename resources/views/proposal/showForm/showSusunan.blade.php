<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Kegiatan</th>
            <th>PIC</th>
            <th>Waktu</th>
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
                <td>{{ $s->times }}</td>
                <td>{{ $s->notes }}</td>
                
            </tr>
            @empty
            <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi dahulu</span>
            @endforelse
        </tbody>
</table>