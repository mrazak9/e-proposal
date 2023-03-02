<div class="table-responsive">
    <table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden" id="penerimaan">
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
            @php($indexBudget_receipt = 0)
            @forelse ($budget_receipt as $br)
                <tr>
                    <td align="center">{{ ++$indexBudget_receipt }}</td>
                    <td>
                        <textarea class="form-control" cols="10" rows="3" disabled>{{ $br->name }}
                    </textarea>
                    </td>
                    <td>{{ $br->type_anggaran->name }}</td>
                    <td align="center">{{ $br->qty }}</td>
                    <td align="right"><span class="uang">{{ $br->price }}</span><span></td>
                    <td align="right"><strong><span class="uang">{{ $br->total }}</span></strong>
                    </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6"><span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran,
                            silahkan
                            lengkapi
                            dahulu</span></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p><strong>Total Penerimaan: <span>Rp. </span><span
                class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
    </p>
</div>
