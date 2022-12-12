<div class="table-responsive">
    <table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden">
        <thead class="thead-inverse">
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-user-check"></i> Tipe Peserta</th>
                <th><i class="fas fa-user-circle"></i> Total Peserta</th>
                <th><i class="fas fa-clipboard"></i> Notes</th>
            </tr>
        </thead>
        <tbody>
            @php($indexPeserta = 0)
            @forelse ($participants as $p)
                <tr>
                    <td>{{ ++$indexPeserta }}</td>
                    <td>{{ $p->participantType->name }}</td>
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
</div>
