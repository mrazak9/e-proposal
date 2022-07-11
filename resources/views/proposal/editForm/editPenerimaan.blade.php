<table class="table table-striped">
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
        @php($indexBudget_receipt = 0)
        @foreach ($budget_receipt as $br)
            <tr>
                <form action="{{ route('admin.committee.update', $c->id) }}" method="POST">
                    <td scope="row">{{ ++$indexBudget_receipt }}</td>
                    <td><input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                        <input type="text" class="form-control" name="name" value="{{ $br->name }}">
                    </td>
                    <td><input type="number" class="form-control" min="0" name="qty"
                            value="{{ $br->qty }}"></td>
                    <td><input type="number" class="form-control" min="0" name="price"
                            value="{{ $br->price }}"></td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#penerimaanModal">Add Penerimaan</a>
@include('proposal.modal.penerimaanModal')
