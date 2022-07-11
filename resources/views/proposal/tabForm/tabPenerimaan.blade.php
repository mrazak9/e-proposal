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
                        Kuantitas
                    </th>
                    <th class="text-center">
                        Harga
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr id='penerimaan0'>
                    <td>
                        1
                    </td>
                    <td>
                        <input type="text" name='penerimaan_name[0]' class="form-control" required />
                    </td>
                    <td>
                        <input type="number" name='penerimaan_qty[0]' min="0" class="form-control" required />
                    </td>
                    <td>
                        <input type="number" step="any" name='penerimaan_price[0]' class="form-control" required />
                    </td>
                </tr>
                <tr id='penerimaan1'></tr>
            </tbody>
        </table>
        {{-- <script type="text/javascript">
            $(document).ready(function() {

                // Format mata uang.
                $('.uang').mask('000.000.000', {
                    reverse: true
                });

            })
        </script> --}}

        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row").click(function() {
                    $('#penerimaan' + i).html("<td>" + (i + 1) + "</td><td><input name='penerimaan_name[" + i +
                        "]' type='text' class='form-control input-md'  /></td><td><input name='penerimaan_qty[" +
                        i +
                        "]' type='number' min='0' class='form-control input-md'></td><td><input name='penerimaan_price[" +
                        i +
                        "]' type='number' class='form-control'></td><td>");

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
    <a id="add_row" class="btn btn-warning"><i class="bi bi-plus"></i></a>
    <a id='delete_row' class="btn btn-primary"><i class="bi bi-trash"></i></a>
</span>
