<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Tipe Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_expenditure = 0)
        @forelse ($budget_expenditure as $be)
            <tr>
                <td scope="row">{{ ++$indexBudget_expenditure }}</td>
                <td>{{ $be->name }}</td>
                <td>{{ $be->type_anggaran->name }}</td>
                <td>{{ $be->qty }}</td>
                <td><span>Rp. </span><span class="uang">{{ $be->price }}</span><span>,-</span></td>
                <td><strong><span>Rp. </span><span class="uang">{{ $be->total }}</span><span>,-</span></strong>
                </td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="6">
                    <span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>
        @endforelse
        <tr>
            <td colspan="5"><strong>Total Pengeluaran:</strong></td>
            <td><strong><span>Rp. </span><span
                        class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
            </td>
        </tr>
    </tbody>
</table>
