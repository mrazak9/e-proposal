<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_expenditure = 0)
        @foreach ($budget_expenditure as $be)
            <tr>
                <td scope="row">{{ ++$indexBudget_expenditure }}</td>
                <td>{{ $be->name }}</td>
                <td>{{ $be->qty }}</td>
                <td><span>Rp. </span><span
                        class="uang">{{ $be->price }}</span><span>,-</span></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $be->total }}</span><span>,-</span></strong>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4"><strong>Total Pengeluaran:</strong></td>
            <td><strong><span>Rp. </span><span
                        class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
            </td>
        </tr>
    </tbody>
</table>