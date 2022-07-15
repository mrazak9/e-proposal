<table class="table table-hover table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_expenditure = 0)
        @foreach ($budget_expenditure as $be)
        <tr class="align-middle">
            <form action="{{ route('admin.budgetexpenditure.update', $be->id) }}" method="POST">
                @csrf
                <td scope="row">{{ ++$indexBudget_expenditure }}</td>
                <td><input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="text" class="form-control" name="name" value="{{ $be->name }}">
                </td>
                <td><input type="number" class="form-control" min="0" name="qty"
                        value="{{ $be->qty }}"></td>
                <td><input type="number" class="form-control" min="0" name="price"
                        value="{{ $be->price }}"></td>
                <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}"
                            name="proposal_id">
                        <button type="submit" class="btn btn-warning btn-sm"><i
                                class="bi bi-pencil"></i></button></span>
                </td>
            </form>
            <td>
                <form action="{{ route('admin.budgetexpenditure.destroy', $be->id) }}" method="GET">
                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengeluaranModal">Add Pengeluaran</a>
@include('proposal.modal.pengeluaranModal')