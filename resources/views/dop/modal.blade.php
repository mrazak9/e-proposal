{{-- <div class="modal fade" id="dopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.dops.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengajuan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kategori</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="dopradio" name="note"
                                onclick="javascript:activedop();" value="DOP" required>
                            <label class="form-check-label">DOP Bulanan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pelatihradio" name="note"
                                onclick="javascript:activedop();" value="PENGAJUAN PELATIH" required>
                            <label class="form-check-label">Pengajuan Pelatih</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pelatihradio" name="note"
                                onclick="javascript:activedop();" value="PENGAJUAN PELATIH" required>
                            <label class="form-check-label">Sewa Lapang</label>
                        </div>
                    </div>
                    <div id="dopdiv" class="form-group" style="display: none">
                        <label>Jumlah</label>
                        <input class="form-control" id="dopamount" type="number" value="100000" name="amount"
                            readonly>
                    </div>
                    <div id="pelatihdiv" class="form-group" style="display: none">
                        <label>Jumlah</label>
                        <input class="form-control" id="pelatihamount" type="number" min="0" value="500000"
                            name="amount">
                        <small class="text-danger">*update nominal, jika ada perubahan</small>
                    </div>
                    <div id="sewadiv" class="form-group" style="display: none">
                        <label>Jumlah</label>
                        <input class="form-control" id="sewaamount" type="number" min="0" value="1500000"
                            name="amount">
                        <small class="text-danger">*update nominal, jika ada perubahan</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}

<div class="modal fade" id="dopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.dops.store') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengajuan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Kategori Pengajuan
                                        </th>
                                        <th class="text-center">
                                            Nominal
                                        </th>
                                        <th class="text-center">
                                            Note
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='dop0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <select class="form-control" name="category[0]" required>
                                                <option selected>== Pilih Tipe Pengajuan ==</option>
                                                <option value="DOP">DOP</option>
                                                <option value="PELATIH">PENGAJUAN PELATIH</option>
                                                <option value="SEWA LAPANG">SEWA LAPANG</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name='amount[0]' min="0" class="form-control"
                                                required />
                                        </td>
                                        <td>
                                            <input type="text" name='note[0]' class="form-control" value="-"
                                                required />
                                        </td>
                                    </tr>
                                    <tr id='dop1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row5").click(function() {
                                        $('#dop' + i).html("<td>" + (i + 1) +
                                            "</td><td><select class='form-control' name='category[" +
                                            i +
                                            "]' required><option selected>== Pilih Tipe Pengajuan ==</option><option value='DOP'>DOP</option><option value='PELATIH'>PENGAJUAN PELATIH</option><option value='SEWA LAPANG'>SEWA LAPANG</option></select></td><td><input name='amount[" +
                                            i +
                                            "]' type='number' min='0' class='form-control' required></td><td><input name='note[" +
                                            i +
                                            "]' type='text' class='form-control' value='-' required></td>");

                                        $('#tab_logic1').append('<tr id="dop' + (i + 1) + '"></tr>');
                                        i++;
                                    });
                                    $("#delete_row5").click(function() {
                                        if (i > 1) {
                                            $("#dop" + (i - 1)).html('');
                                            i--;
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                    <span>
                        <a id="add_row5" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row5' class="btn btn-primary"><i class="fas fa-trash"></i></a>
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
