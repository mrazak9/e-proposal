<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Anggaran</th>
            <th>Tipe Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_receipt = 0)
        @forelse ($budget_receipt as $br)
            <tr>
                <td scope="row">{{ ++$indexBudget_receipt }}. {{ $br->name }}</td>
                <td>{{ $br->type_anggaran->name }}</td>
                <td>{{ $br->qty }}</td>
                <td><span>Rp. </span><span class="uang">{{ $br->price }}</span><span>,-</span></td>
                <td><strong><span>Rp. </span><span class="uang">{{ $br->total }}</span><span>,-</span></strong>
                </td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="6"><span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan
                        lengkapi
                        dahulu</span></td>
            </tr>
        @endforelse
        <tr>
            <td colspan="4"><strong>Total Penerimaan:</strong></td>
            <td><strong><span>Rp. </span><span class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
            </td>
        </tr>
    </tbody>
</table>
