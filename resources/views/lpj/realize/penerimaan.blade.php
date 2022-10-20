<table class="table table-sm table-responsive">
    <thead>
        <tr class="align-middle">
            <th>#</th>
            <th>Nama Anggaran</th>
            <th>Tipe Anggaran</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexrealize_Budget_receipt = 0)
        @forelse ($realize_br as $rbr)
            @php($total_receipt = $rbr->qty * $rbr->price)
            <tr class="align-middle">
                <form action="{{ route('admin.lpj.updatepenerimaan', $rbr->id) }}" method="POST">
                    @csrf
                    <td scope="row">{{ ++$indexrealize_Budget_receipt }}</td>
                    <td><input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                        <input type="text" class="form-control" name="name" value="{{ $rbr->name }}">
                    </td>
                    <td>
                        <select class="form-control" name="type_anggaran_id">
                            <option value="{{ $rbr->type_anggaran->id }}" selected>{{ $rbr->type_anggaran->name }}
                            </option>
                            @foreach ($type_anggaran as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" min="0" name="qty"
                            value="{{ $rbr->qty }}">
                    </td>
                    <td>
                        <input type="number" class="form-control" min="0" name="price"
                            value="{{ $rbr->price }}">
                    </td>
                    <td>
                        <input type="text" class="form-control uang" value="{{ $total_receipt }}" disabled>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-sm"><i
                                class="fas fa-edit"></i></button></span>
                    </td>
                </form>
                <td>
                    <form method="GET" action="{{ route('admin.lpj.deletepenerimaan', $rbr->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                    </form>
                </td>
            </tr>
        @empty
            <tr align="center">
                <td colspan="7">
                    <span class="badge bg-danger text-white">Belum ada data Penerimaan Anggaran, silahkan lengkapi
                        dahulu</span>
                </td>
            </tr>

        @endforelse
        <tr>
            <td colspan="5"><strong>Total Penerimaan Anggaran:</strong></td>
            <td><strong><span>Rp. </span><span
                        class="uang">{{ $sum_realize_budget_receipt }}</span><span>,-</span></strong>
            </td>
        </tr>
    </tbody>
</table>
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#penerimaanM"><i class="fas fa-plus"></i>
    Penerimaan</a>
@include('lpj.modal.penerimaan')
