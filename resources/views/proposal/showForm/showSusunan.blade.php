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
            @foreach ($schedule as $s)                                            
            <tr>
                <td scope="row">{{ ++$indexSchedule }}</td>
                <td>{{ $s->kegiatan }}</td>
                <td>{{ $s->user->name }}</td>
                <td>{{ $s->times }}</td>
                <td>{{ $s->notes }}</td>
                
            </tr>
            @endforeach
        </tbody>
</table>