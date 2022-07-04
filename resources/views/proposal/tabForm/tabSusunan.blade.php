<div class="row clearfix">
    <div class="col-md-12 column">
        <table class="table table-bordered table-hover" id="tab_logic4">
            <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Nama Kegiatan
                    </th>
                    <th class="text-center">
                        PIC
                    </th>
                    <th class="text-center">
                        Tanggal
                    </th>
                    <th class="text-center">
                        Catatan
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr id='susunan0'>
                    <td>
                        1
                    </td>
                    <td>
                        <input type="text" name='kegiatan0' class="form-control" />
                    </td>
                    <td>
                        <select class="form-control" name="user_id0">
                            <option selected>== Pilih PIC ==</option>
                            @foreach ($student as $value => $key)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="date0" placeholder="Tanggal Acara"
                            maxlength="10">
                    </td>
                    <td>
                        <input type="text" name='notes0' class="form-control" />
                    </td>
                </tr>
                <tr id='susunan1'></tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row4").click(function() {
                    $('#susunan' + i).html("<td>" + (i + 1) + "</td><td><input name='kegiatan" + i +
                        "' type='text' class='form-control'/></td><td><select class='form-control' name='user_id" +
                        i +
                        "'><option selected>== Pilih PIC ==</option>@foreach ($student as $value)<option value='{{ $value }}'>{{ $value }}</option>@endforeach</select></td><td><input name='date" +
                        i +
                        "' type='date' class='form-control' placeholder='Tanggal Acara'></td><td><input name='notes" + i +
                        "' type='text' class='form-control'></td>");

                    $('#tab_logic4').append('<tr id="susunan' + (i + 1) + '"></tr>');
                    i++;
                });
                $("#delete_row4").click(function() {
                    if (i > 1) {
                        $("#susunan" + (i - 1)).html('');
                        i--;
                    }
                });

            });
        </script>
    </div>
</div>
<span>
    <a id="add_row4" class="btn btn-warning"><i class="bi bi-plus"></i></a>
    <a id='delete_row4' class="btn btn-primary"><i class="bi bi-trash"></i></a>
</span>
