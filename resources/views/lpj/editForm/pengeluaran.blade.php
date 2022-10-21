<table class="table table-hover table-borderless">
    <thead>
        <tr>
            <th>Nama - Tipe Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Aksi</th>
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

                        <strong style="align-middle">{{ ++$indexBudget_expenditure }}. {{ $be->name }} -
                            {{ $be->type_anggaran->name }}</strong>
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

                    <td>
                        <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                name="lpj_id">
                            <button type="submit" class="btn btn-success btn-sm"><i
                                    class="fas fa-check"></i></button></span>
                    </td>
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
@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pengeluaranModal"><i class="fas fa-plus"></i>
        Pengeluaran</a>
    {{-- @include('proposal.modal.pengeluaranModal') --}}
@endcan
