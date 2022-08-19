<script>
    var msg = '{{ Session::get('alert_receipt') }}';
    var exist = '{{ Session::has('alert_receipt') }}';
    if (exist) {
        alert(msg);
    }
</script>
<table class="table table-hover table-borderless">
    <thead>
        <tr class="align-middle">
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexBudget_receipt = 0)
        @forelse ($budget_receipt as $br)
            @php($total_receipt = $br->qty * $br->price)
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
                    <td><input type="text" class="form-control uang" value="{{ $total_receipt }}" disabled></td>
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
            @empty
            <span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan lengkapi dahulu</span>
        @endforelse
        <tr class="table table-secondary">
            <td colspan="4"><strong>Total Penerimaan Anggaran:</strong></td>
            <td><strong><span>Rp. </span><span
                        class="uang">{{ $sum_budget_receipt }}</span><span>,-</span></strong></td>
        </tr>
    </tbody>
</table>
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#penerimaanModal"><i class="fas fa-plus"></i> Penerimaan</a>
@include('proposal.modal.penerimaanModal')
