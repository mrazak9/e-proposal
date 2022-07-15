<table class="table table-hover table-borderless">
    <thead>
        <tr class="align-middle">
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_receipt = 0)
        @foreach ($budget_receipt as $br)
            <tr class="align-middle">
                <form action="{{ route('admin.budgetreceipt.update', $br->id) }}" method="POST">
                    @csrf
                    <td scope="row">{{ ++$indexBudget_receipt }}</td>
                    <td><input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                        <input type="text" class="form-control" name="name" value="{{ $br->name }}">
                    </td>
                    <td><input type="number" class="form-control" min="0" name="qty"
                            value="{{ $br->qty }}"></td>
                    <td><input type="number" class="form-control" min="0" name="price"
                            value="{{ $br->price }}"></td>
                    <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}"
                                name="proposal_id">
                            <button type="submit" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil"></i></button></span>
                    </td>
                </form>
                <td>
                    <form action="{{ route('admin.budgetreceipt.destroy', $br->id) }}" method="GET">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        <tr class="table table-secondary">
            <td><strong>Total Penerimaan Anggaran:</strong></td>
            <td colspan="5"><strong><span class="uang">{{ $sum_budget_receipt }}</span></strong></td>
        </tr>
    </tbody>
</table>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#penerimaanModal">Add Penerimaan</a>
@include('proposal.modal.penerimaanModal')
