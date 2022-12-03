<table class="table table-striped sortable" id="penerimaan">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama <br>Anggaran</th>
            <th>Tipe <br>Anggaran </th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_receipt = 0)
        @forelse ($budget_receipt as $br)
            <tr>
                <td>{{ ++$indexBudget_receipt }}</td>
                <td scope="row">{{ $br->name }}</td>
                <td>{{ $br->type_anggaran->name }}</td>
                <td>{{ $br->qty }}</td>
                <td><span class="uang">{{ $br->price }}</span><span></td>
                <td><strong><span class="uang">{{ $br->total }}</span></strong>
                </td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="4"><span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan
                        lengkapi
                        dahulu</span></td>
            </tr>
        @endforelse
    </tbody>
</table>
<p><strong>Total Penerimaan: <span>Rp. </span><span
            class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
</p>
