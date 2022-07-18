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
            @foreach ($participants as $p )
                <tr>
                <td scope="row">{{ ++$indexPeserta }}</td>
                <td>{{ $p->participantType->name }}</td>
                <td>{{ $p->participant_total }} orang</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2"><strong>Total Peserta:</strong></td>
                <td><strong><span class="uang">{{ $sum_participants }}</span><span> orang</span></strong></td>
            </tr>
        </tbody>
</table>