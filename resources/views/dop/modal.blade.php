<div class="modal fade" id="dopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.dops.store') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pengajuan Dana Rutin</h5>
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
                                            <select class="form-control" id="dropdown" name="category[0]"
                                                onchange="updateInputField(this)" required>
                                                <option selected>== Pilih Tipe Pengajuan ==</option>
                                                <option value="DOP" id="100000">DOP</option>
                                                <option value="OBAT">OBAT-OBATAN</option>
                                                <option value="PELATIH" id="500000">PENGAJUAN PELATIH</option>
                                                <option value="SEWA LAPANG" id="1500000">SEWA LAPANG</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" id="amount" name='amount[0]' min="0"
                                                class="form-control" required />
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
                                            "]' onchange='updateInputField(this)' required><option selected>== Pilih Tipe Pengajuan ==</option><option value='DOP' id='100000'>DOP</option><option value='OBAT'>OBAT-OBATAN</option><option value='PELATIH' id='500000'>PENGAJUAN PELATIH</option><option value='SEWA LAPANG' id='1500000'>SEWA LAPANG</option></select></td><td><input name='amount[" +
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
