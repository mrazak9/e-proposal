<table class="table table-striped sortable" id="pengeluaran">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama <br>Anggaran </th>
            <th>Tipe <br>Anggaran </th>
            <th>Qty</th>
            <th>Price </th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_expenditure = 0)
        @forelse ($budget_expenditure as $be)
            <tr>
                <td>{{ ++$indexBudget_expenditure }}</td>
                <td>
                    <textarea class="form-control" cols="10" rows="3" disabled>{{ $be->name }}
                    </textarea>
                </td>
                <td>{{ $be->type_anggaran->name }}</td>
                <td>{{ $be->qty }}</td>
                <td><span class="uang">{{ $be->price }}</span></td>
                <td><strong><span class="uang">{{ $be->total }}</span></strong>
                </td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="4">
                    <span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<p><strong>Total Pengeluaran:</strong><strong><span>Rp. </span><span
            class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
</p>
