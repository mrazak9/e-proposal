<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
        </tr>
        </thead>
        <tbody>
            @php($indexPeserta = 0)
            @forelse ($participants as $p )
                <tr>
                <td scope="row">{{ ++$indexPeserta }}</td>
                <td>{{ $p->participantType->name }}</td>
                <td>{{ $p->participant_total }} orang</td>
            </tr>
            @empty
            <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
            @endforelse
            <tr>
                <td colspan="2"><strong>Total Peserta:</strong></td>
                <td><strong><span class="uang">{{ $sum_participants }}</span><span> orang</span></strong></td>
            </tr>
        </tbody>
</table>