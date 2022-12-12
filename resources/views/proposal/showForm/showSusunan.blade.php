<div class="table-responsive">
    <table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden">
        <thead class="thead-inverse">
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-paper-plane"></i> Nama Kegiatan</th>
                <th><i class="fas fa-user"></i> PIC</th>
                <th><i class="fas fa-calendar-check"></i> Tanggal</th>
                <th><i class="fas fa-clock"></i> Waktu Mulai</th>
                <th><i class="fas fa-clock"></i> Waktu Selesai</th>
                <th><i class="fas fa-clipboard"></i> Notes</th>
            </tr>
        </thead>
        <tbody>
            @php($indexSchedule = 0)
            @forelse ($schedule as $s)
                <tr>
                    <td>{{ ++$indexSchedule }}</td>
                    <td>
                        <textarea class="form-control" cols="10" rows="3" disabled>{{ $s->kegiatan }}
                    </textarea>
                    </td>
                    <td>
                        <textarea class="form-control" cols="10" rows="3" disabled>{{ $s->user->name }}
                    </textarea>
                    </td>
                    <td align="center">{{ date('j F Y', strtotime($s->date)) }}</td>
                    <td align="center">{{ $s->times }}</td>
                    <td align="center">{{ $s->end_time }}</td>
                    <td>
                        <textarea class="form-control" rows="3" cols="15" readonly>{{ $s->notes }}</textarea>
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
</div>
