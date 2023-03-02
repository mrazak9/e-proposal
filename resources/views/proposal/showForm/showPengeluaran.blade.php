<div class="table-responsive">
    <table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden" id="pengeluaran">
        <thead>
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-hand-holding-usd"></i> Nama Anggaran</th>
                <th><i class="fas fa-anchor"></i> Tipe Anggaran </th>
                <th style="text-align:center"><i class="fas fa-calculator"></i> Qty</th>
                <th style="text-align:right"><i class="fas fa-coins"></i> Price</th>
                <th style="text-align:right"><i class="fas fa-dollar-sign"></i> Total</th>
            </tr>
        </thead>
        <tbody>
            @php($indexBudget_expenditure = 0)
            @forelse ($budget_expenditure as $be)
                <tr>
                    <td align="center">{{ ++$indexBudget_expenditure }}</td>
                    <td>
                        <textarea class="form-control" cols="10" rows="3" disabled>{{ $be->name }}
                    </textarea>
                    </td>
                    <td>{{ $be->type_anggaran->name }}</td>
                    <td align="center">{{ $be->qty }}</td>
                    <td align="right"><span class="uang">{{ $be->price }}</span></td>
                    <td align="right"><strong><span class="uang">{{ $be->total }}</span></strong>
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
        </tbody>
    </table>
    <p><strong>Total Pengeluaran:</strong><strong><span>Rp. </span><span
                class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
    </p>
</div>
