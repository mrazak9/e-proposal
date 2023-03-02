<div class="table-responsive">
    <table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden">
        <thead class="thead-inverse">
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-route"></i> Nama Perencanaan</th>
                <th><i class="fas fa-user"></i> PIC</th>
                <th><i class="fas fa-clock"></i> Tanggal Mulai</th>
                <th><i class="fas fa-clock"></i> Tanggal Selesai</th>
                <th><i class="fas fa-clipboard"></i> Notes</th>
            </tr>
        </thead>
        <tbody>
            @php($indexJadwal = 0)
            <tr>
                @forelse ($planning_schedule as $ps)
                    <td>{{ ++$indexJadwal }}</td>
                    <td>
                        <textarea class="form-control" cols="10" rows="3" disabled>{{ $ps->kegiatan }}
                    </textarea>
                    </td>
                    <td>{{ $ps->user->name }}</td>
                    <td align="center">{{ date('j F Y', strtotime($ps->date)) }}</td>
                    <td align="center">{{ date('j F Y', strtotime($ps->end_date)) }}</td>
                    <td>
                        <textarea class="form-control" rows="3" cols="15" readonly>{{ $ps->notes }}
                    </textarea>
                    </td>

            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                        dahulu</span>
                </td>
                @endforelse
        </tbody>
    </table>
</div>
