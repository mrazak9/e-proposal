<table class="table table-striped" id="penerimaan">
    <thead>
        <tr>
            <th>#</th>
            <th onclick="sortTablePenerimaan(1)">Nama <br>Anggaran <i class="fas fa-sort text-primary"></i></th>
            <th onclick="sortTablePenerimaan(2)">Tipe <br>Anggaran <i class="fas fa-sort text-primary"></i></th>
            <th onclick="sortTablePenerimaan(3)">Qty <i class="fas fa-sort text-primary"></i></th>
            <th onclick="sortTablePenerimaan(4)">Price <i class="fas fa-sort text-primary"></i></th>
            <th onclick="sortTablePenerimaan(5)">Total <i class="fas fa-sort text-primary"></i></th>
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
                <td><span>Rp. </span><span class="uang">{{ $br->price }}</span><span>,-</span></td>
                <td><strong><span>Rp. </span><span class="uang">{{ $br->total }}</span><span>,-</span></strong>
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
