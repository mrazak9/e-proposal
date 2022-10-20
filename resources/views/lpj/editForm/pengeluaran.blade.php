<table class="table table-hover table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Tipe Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_expenditure = 0)
        @forelse ($budget_expenditure as $be)
            @php($total_expenditure = $be->qty * $be->price)
            <tr class="align-middle">
                <form action="{{ route('admin.budgetexpenditure.update', $be->id) }}" method="POST">
                    @csrf
                    <td scope="row">
                        {{ ++$indexBudget_expenditure }}
                    </td>
                    <td>
                        <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                        <input type="text" class="form-control" name="name" value="{{ $be->name }}">
                    </td>
                    <td>
                        <select class="form-control" name="type_anggaran_id" required>
                            <option value="{{ $be->type_anggaran->id }}" selected>{{ $be->type_anggaran->name }}
                            </option>
                            @foreach ($type_anggaran as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
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
                        <input type="text" class="form-control uang" value="{{ $total_expenditure }}" disabled>
                    </td>
                </form>
                <td>
                    <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                            name="lpj_id">
                        <button type="submit" class="btn btn-success btn-sm"><i
                                class="fas fa-check"></i></button></span>
                </td>
            </tr>
        @empty
            <span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran, silahkan lengkapi
                dahulu</span>
        @endforelse
        <tr class="table table-secondary">
            <td colspan="5"><strong>Total Pengeluaran Anggaran:</strong></td>
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
