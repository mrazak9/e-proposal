<table class="table table-striped table-inverse table-responsive sortable">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tipe Peserta</th>
            <th>Total Peserta</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @php($indexPeserta = 0)
        @forelse ($participants as $p)
            <tr>
                <td>{{ ++$indexPeserta }}</td>
                <td scope="row">{{ $p->participantType->name }}</td>
                <td>{{ $p->participant_total }} orang</td>
                <td>{{ $p->notes }}</td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
                </td>
            </tr>
        @endforelse
        <tr>

        </tr>
    </tbody>
</table>
<p><strong>Total Peserta: <span class="uang">{{ $sum_participants }}</span><span> orang</span></strong></p>
