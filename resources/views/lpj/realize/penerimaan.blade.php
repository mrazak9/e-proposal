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
            @forelse ($realize_br as $rbr)
                @php($total_receipt = $rbr->qty * $rbr->price)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.updatepenerimaan', $rbr->id) }}" method="POST"
                        onkeydown="return event.key != 'Enter';">
                        @csrf
                        <td scope="row">{{ ++$indexrealize_Budget_receipt }}</td>
                        <td><input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                            <textarea class="form-control" name="name" cols="30" rows="3">{{ $rbr->name }}</textarea>
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
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></button></span>
                            </td>
                        @endcan

                </tr>
                <tr class="align-middle">
                    <td>
                        <a class="btn btn-link btn-lg" href="{{ $rbr->attachment }}" target="_blank">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td colspan="5">
                        <input class="form-control" type="text" name="attachment"
                            placeholder="link attachment masih kosong, silahkan update. Tekan ENTER untuk menyimpan"
                            value="{{ $rbr->attachment }}">
                    </td>
                    </form>
                    <td>
                        <form method="POST" action="{{ route('admin.lpj.deletepenerimaan', $rbr->id) }}"
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
</div>

@can('PANITIA_UPDATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#penerimaanM"><i class="fas fa-plus"></i>
        Penerimaan</a>
    @include('lpj.modal.penerimaan')
@endcan
