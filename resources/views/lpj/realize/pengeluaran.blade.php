<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="align-middle">
                <th>#</th>
                <th>Nama Anggaran</th>
                <th>Tipe Anggaran</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexrealize_Budget_receipt = 0)
            @forelse ($realize_be as $rbe)
                @php($total_receipt = $rbe->qty * $rbe->price)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.updatepengeluaran', $rbe->id) }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexrealize_Budget_receipt }}</td>
                        <td><input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                            <textarea class="form-control" name="name" cols="30" rows="3">{{ $rbe->name }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" name="type_anggaran_id">
                                <option value="{{ $rbe->type_anggaran->id }}" selected>{{ $rbe->type_anggaran->name }}
                                </option>
                                @foreach ($type_anggaran as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="qty"
                                value="{{ $rbe->qty }}">
                        </td>
                        <td>
                            <input type="number" class="form-control" min="0" name="price"
                                value="{{ $rbe->price }}">
                        </td>
                        <td>
                            <input type="text" class="form-control uang" value="{{ $total_receipt }}" disabled>
                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></button></span>
                            </td>
                        @endcan
                </tr>
                <tr class="align-middle">
                    <td>
                        <a class="btn btn-link btn-lg" href="{{ $rbe->attachment }}" target="_blank">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td colspan="5">
                        <input class="form-control" type="text" name="attachment"
                            placeholder="link attachment masih kosong, silahkan update. Tekan ENTER untuk menyimpan"
                            value="{{ $rbe->attachment }}">
                    </td>
                    </form>
                    <td>
                        <form method="POST" action="{{ route('admin.lpj.deletepengeluaran', $rbe->id) }}"
                            onkeydown="return event.key != 'Enter';">
                            @method('delete')
                            @csrf
                            @can('PANITIA_UPDATE_PROPOSAL')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            @endcan

                        </form>
                    </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="7">
                        <span class="badge bg-danger text-white">Belum ada data Pengeluaran Anggaran, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>

            @endforelse
            <tr>
                <td colspan="5"><strong>Total Pengeluaran Anggaran:</strong></td>
                <td><strong><span>Rp. </span><span
                            class="uang">{{ $sum_realize_budget_expenditure }}</span><span>,-</span></strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#pengeluaranM"><i class="fas fa-plus"></i>
        Pengeluaran</a>
    @include('lpj.modal.pengeluaran')
@endcan
