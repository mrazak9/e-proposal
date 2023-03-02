<div class="modal fade" id="penerimaanM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj.addpenerimaan') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Penerimaan Anggaran</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic">
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
                                        <th>Link Lampiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='penerimaan0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <textarea name='penerimaan_name[0]' cols="30" rows="3" class="form-control" required></textarea>
                                        </td>
                                        <td>
                                            <select class="form-control" name="penerimaan_type_anggaran_id[0]" required>
                                                <option selected disabled>== Pilih Tipe Anggaran</option>
                                                @foreach ($type_anggaran as $value => $key)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name='penerimaan_qty[0]' min="0"
                                                class="form-control" required />
                                        </td>
                                        <td>
                                            <input type="number" step="any" name='penerimaan_price[0]'
                                                class="form-control" required />
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="penerimaan_attachment[0]" cols="20" rows="3"></textarea>
                                        </td>
                                    </tr>
                                    <tr id='penerimaan1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row").click(function() {
                                        $('#penerimaan' + i).html("<td>" + (i + 1) + "</td><td><textarea name='penerimaan_name[" +
                                            i +
                                            "]' rows='3' cols='30' class='form-control' required></textarea></td><td><select class='form-control' name='penerimaan_type_anggaran_id[" +
                                            i +
                                            "]' required><option selected disabled>== Pilih Tipe Anggaran ==</option>@foreach ($type_anggaran as $value => $key)<option value='{{ $key }}'>{{ $value }}</option>@endforeach</select></td><td><input name='penerimaan_qty[" +
                                            i +
                                            "]' type='number' min='0' class='form-control' required></td><td><input name='penerimaan_price[" +
                                            i +
                                            "]' type='number' class='form-control' required></td><td><textarea class='form-control' name='penerimaan_attachment[" +
                                            i + "]' cols='20' rows='3'></textarea></td>");

                                        $('#tab_logic').append('<tr id="penerimaan' + (i + 1) + '"></tr>');
                                        i++;
                                    });
                                    $("#delete_row").click(function() {
                                        if (i > 1) {
                                            $("#penerimaan" + (i - 1)).html('');
                                            i--;
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                    <span>
                        <a id="add_row" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row' class="btn btn-primary"><i class="fas fa-trash"></i></a>
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
