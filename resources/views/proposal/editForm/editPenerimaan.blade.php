<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead>
            <tr class="align-middle">
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
            @php($indexBudget_receipt = 0)
            @forelse ($budget_receipt as $br)
                @php($total_receipt = $br->qty * $br->price)
                <tr class="align-middle">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td>
                            <a href="{{ route('admin.budgetreceipt.destroy', $br->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin untuk menghapus {{ $br->name }}?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    @endcan
                    <form action="{{ route('admin.budgetreceipt.update') }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexBudget_receipt }}</td>
                        <td>
                            <input type="hidden" name="br_id[]" value="{{ $br->id }}">
                            <textarea name="name[]" class="form-control" cols="20" rows="3" required>{{ $br->name }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" name="type_anggaran_id[]" required>
                                <option value="{{ $br->type_anggaran->id }}" selected>{{ $br->type_anggaran->name }}
                                </option>
                                @foreach ($type_anggaran as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" class="form-control" min="0" name="qty[]"
                                value="{{ $br->qty }}"></td>
                        <td><input type="number" class="form-control" min="0" name="price[]"
                                value="{{ $br->price }}"></td>
                        <td>
                            <input type="text" class="form-control uang" value="{{ $total_receipt }}" disabled>
                        </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6">
                        <span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>

            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total Penerimaan Anggaran:</strong></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong>
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
                        <a class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#penerimaanModal"><i
                                class="fas fa-plus"></i>
                            Penerimaan</a>
                        @include('proposal.modal.penerimaanModal')
                    @endcan
                </td>
            </tr>
        </tfoot>
    </table>
</div>
