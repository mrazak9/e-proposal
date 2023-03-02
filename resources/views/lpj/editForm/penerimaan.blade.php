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
            @php($indexBudget_receipt = 0)
            @forelse ($budget_receipt as $br)
                @php($total_receipt = $br->qty * $br->price)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.storepenerimaan') }}" method="POST"
                        onkeydown="return event.key != 'Enter';">
                        @csrf
                        <td>
                            <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}" readonly>
                            <input type="hidden" name="name" value="{{ $br->name }}">
                            <input type="hidden" name="type_anggaran_id" value="{{ $br->type_anggaran->id }}">

                            <textarea class="form-control" cols="30" rows="3" readonly>{{ ++$indexBudget_receipt }}. {{ $br->name }} - {{ $br->type_anggaran->name }}</textarea>
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="qty"
                                value="{{ $br->qty }}">
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="price"
                                value="{{ $br->price }}">
                        </td>
                        <td>
                            <input type="text" class="form-control uang" value="{{ $total_receipt }}" readonly>
                        </td>

                </tr>
                <tr class="align-middle">
                    <td>
                        <i class="fa fa-link" aria-hidden="true"></i> Link Lampiran, cantumkan 1 untuk setiap penerimaan
                    </td>
                    <td colspan="3">
                        <input class="form-control" type="text" name="attachment"
                            placeholder="link attachment masih kosong, silahkan update.">
                    </td>
                    <td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                    name="lpj_id">
                                <button type="submit" class="btn btn-success btn-sm"><i
                                        class="fas fa-check"></i></button></span>
                        @endcan
                    </td>
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        <span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan
                            lengkapi
                            dahulu</span>
                    </td>
                </tr>
            @endforelse
            <tr>
                <td colspan="3"><strong>Total Penerimaan Anggaran:</strong></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
