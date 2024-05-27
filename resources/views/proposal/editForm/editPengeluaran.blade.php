<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead>
            <tr>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
                <th>#</th>
                <th>Nama <br>Anggaran</th>
                <th>Tipe <br>Anggaran</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php($indexBudget_expenditure = 0)
            @forelse ($budget_expenditure as $be)
                @php($total_expenditure = $be->qty * $be->price)
                <tr class="align-middle">
                    <td>
                        <a href="{{ route('admin.budgetexpenditure.destroy', $be->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin untuk menghapus {{ $be->name }}?');"><i
                                class="bi bi-trash"></i></a>
                    </td>
                    <form action="{{ route('admin.budgetexpenditure.update') }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexBudget_expenditure }}</td>
                        <td>
                            <input type="hidden" name="be_id[]" value="{{ $be->id }}">
                            <textarea name="name[]" class="form-control" cols="20" rows="3" required>{{ $be->name }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" name="type_anggaran_id[]" required>
                                <option value="{{ $be->type_anggaran->id }}" selected>{{ $be->type_anggaran->name }}
                                </option>
                                @foreach ($type_anggaran as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" class="form-control" min="0" name="qty[]"
                                value="{{ $be->qty }}"></td>
                        <td><input type="number" class="form-control" min="0" name="price[]"
                                value="{{ $be->price }}"></td>
                        <td><input type="text" class="form-control uang" value="{{ $total_expenditure }}" disabled>
                        </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6"><span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran,
                            silahkan lengkapi
                            dahulu</span></td>
                </tr>

            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total Pengeluaran Anggaran:</strong></td>
                <td>
                    <strong><span>Rp. </span><span
                            class="uang">{{ $sum_budget_expenditure }}</span><span>,-</span></strong>
                </td>
                <td>
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            Update Semua
                        </button>
                    @endcan
                </td>
                </form>
            </tr>
            <tr>
                <td colspan="7">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <a class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#pengeluaranModal"><i
                                class="fas fa-plus"></i>
                            Pengeluaran</a>
                        @include('proposal.modal.pengeluaranModal')
                    @endcan
                </td>
            </tr>
        </tfoot>
    </table>
</div>
