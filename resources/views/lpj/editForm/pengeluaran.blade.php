<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="align-middle">
                <th>Nama - Tipe Anggaran</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexBudget_expenditure = 0)
            @forelse ($budget_expenditure as $be)
                @php($total_expenditure = $be->qty * $be->price)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.storepengeluaran') }}" method="POST">
                        @csrf

                        <td>
                            <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}" readonly>
                            <input type="hidden" name="name" value="{{ $be->name }}">
                            <input type="hidden" name="type_anggaran_id" value="{{ $be->type_anggaran->id }}">

                            <textarea class="form-control" cols="30" rows="2" readonly>{{ ++$indexBudget_expenditure }}. {{ $be->name }} - {{ $be->type_anggaran->name }}</textarea>
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="qty"
                                value="{{ $be->qty }}">
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="price"
                                value="{{ $be->price }}">
                        </td>
                        <td>
                            <input type="text" class="form-control uang" value="{{ $total_expenditure }}" readonly>
                        </td>
                </tr>
                <tr class="align-middle">
                    <td>
                        <i class="fa fa-link" aria-hidden="true"></i> Link Lampiran, cantumkan 1 untuk setiap
                        pengeluaran
                    </td>
                    <td colspan="3">
                        <input class="form-control" type="text" name="attachment"
                            placeholder="link attachment masih kosong, silahkan update.">
                    </td>
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td>
                            <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                    name="lpj_id">
                                <button type="submit" class="btn btn-success btn-sm"><i
                                        class="fas fa-check"></i></button></span>
                        </td>
                    @endcan
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        <span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>
            @endforelse
            <tr class="table table-secondary">
                <td colspan="3"><strong>Total Pengeluaran Anggaran:</strong></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong></td>
            </tr>
        </tbody>
    </table>
</div>
