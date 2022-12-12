<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama <br>Anggaran</th>
                <th>Tipe <br>Anggaran</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th colspan="2">Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexBudget_expenditure = 0)
            @forelse ($budget_expenditure as $be)
                @php($total_expenditure = $be->qty * $be->price)
                <tr class="align-middle">
                    <form action="{{ route('admin.budgetexpenditure.update', $be->id) }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexBudget_expenditure }}</td>
                        <td><input type="hidden" name="proposal_id" value="{{ Crypt::encrypt($proposal->id) }}">
                            <textarea name="name" class="form-control" cols="20" rows="3" required>{{ $be->name }}</textarea>
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
                        <td><input type="number" class="form-control" min="0" name="qty"
                                value="{{ $be->qty }}"></td>
                        <td><input type="number" class="form-control" min="0" name="price"
                                value="{{ $be->price }}"></td>
                        <td><input type="text" class="form-control uang" value="{{ $total_expenditure }}" disabled>
                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td><span class="align-middle"><input type="hidden"
                                        value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                                    <button type="submit" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil"></i></button></span>
                            </td>
                        </form>
                        <td>
                            <form action="{{ route('admin.budgetexpenditure.destroy', $be->id) }}" method="GET">
                                <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6"><span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran,
                            silahkan lengkapi
                            dahulu</span></td>
                </tr>

            @endforelse
            <tr class="table table-secondary">
                <td colspan="5"><strong>Total Pengeluaran Anggaran:</strong></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong></td>
            </tr>
        </tbody>
    </table>
    @can('PANITIA_UPDATE_PROPOSAL')
        <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pengeluaranModal"><i
                class="fas fa-plus"></i>
            Pengeluaran</a>
        @include('proposal.modal.pengeluaranModal')
    @endcan
</div>
