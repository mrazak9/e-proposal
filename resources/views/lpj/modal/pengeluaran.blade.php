<div class="modal fade" id="pengeluaranM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj.addpengeluaran') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengeluaran Anggaran</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}" name="lpj_id">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic2">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Nama Anggaran
                                        </th>
                                        <th class="text-center">
                                            Tipe Anggaran
                                        </th>
                                        <th class="text-center">
                                            Kuantitas
                                        </th>
                                        <th class="text-center">
                                            Harga
                                        </th>
                                        <th>
                                            Link Lampiran
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='pengeluaran0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <textarea name='pengeluaran_name[0]' class="form-control" cols="30" rows="3" required></textarea>
                                        </td>
                                        <td>
                                            <select class="form-control" name="pengeluaran_type_anggaran_id[0]"
                                                required>
                                                <option selected disabled>== Pilih Tipe Anggaran</option>
                                                @foreach ($type_anggaran as $value => $key)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name='pengeluaran_qty[0]' class="form-control"
                                                min="0" required>
                                        </td>
                                        <td>
                                            <input type="number" step="any" name='pengeluaran_price[0]'
                                                class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="pengeluaran_attachment[0]" cols="20" rows="3"></textarea>
                                        </td>
                                    </tr>
                                    <tr id='pengeluaran1'></tr>
                                </tbody>
                            </table>

                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row2").click(function() {
                                        $('#pengeluaran' + i).html("<td>" + (i + 1) + "</td><td><textarea name='pengeluaran_name[" +
                                            i +
                                            "]' rows='3' cols='30' class='form-control' required></textarea></td><td><select class='form-control' name='pengeluaran_type_anggaran_id[" +
                                            i +
                                            "]' required><option selected disabled>== Pilih Tipe Anggaran ==</option>@foreach ($type_anggaran as $value => $key)<option value='{{ $key }}'>{{ $value }}</option>@endforeach</select></td><td><input name='pengeluaran_qty[" +
                                            i +
                                            "]' type='number' min='0' class='form-control' required></td><td><input name='pengeluaran_price[" +
                                            i +
                                            "]' type='number' class='form-control' required></td><td><textarea class='form-control' name='pengeluaran_attachment[" +
                                            i + "]' cols='20' rows='3'></textarea></td>");

                                        $('#tab_logic2').append('<tr id="pengeluaran' + (i + 1) + '"></tr>');
                                        i++;
                                    });
                                    $("#delete_row2").click(function() {
                                        if (i > 1) {
                                            $("#pengeluaran" + (i - 1)).html('');
                                            i--;
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                    <span>
                        <a id="add_row2" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row2' class="btn btn-primary"><i class="fas fa-trash"></i></a>
                    </span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
