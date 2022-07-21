<div class="row clearfix">
    <div class="col-md-12 column">
        <table class="table table-bordered table-hover" id="tab_logic3">
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
                <tr id='jadwal0'>
                    <td>
                        1
                    </td>
                    <td>
                        <input type="text" name='jadwal_kegiatan[0]' class="form-control" required>
                    </td>
                    <td>
                        <select class="form-control" name="jadwal_user_id[0]">
                            <option selected>== Pilih PIC ==</option>
                            @foreach ($student as $value => $key)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="jadwal_date[0]" placeholder="Tanggal Acara" maxlength="10" required>
                    </td>
                    <td>
                        <input type="text" name='jadwal_notes[0]' class="form-control" value="-" required>
                    </td>
                </tr>
                <tr id='jadwal1'></tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row3").click(function() {
                    $('#jadwal' + i).html("<td>" + (i + 1) + "</td><td><input name='jadwal_kegiatan[" + i +
                        "]' type='text' class='form-control' required></td><td><select class='form-control' name='jadwal_user_id[" +
                        i +
                        "]'><option selected>== Pilih PIC ==</option>@foreach ($student as $value => $key)<option value='{{ $value }}'>{{ $key }}</option>@endforeach</select></td><td><input name='jadwal_date[" +
                        i +
                        "]' type='date' class='form-control' placeholder='Tanggal Acara' required></td><td><input name='jadwal_notes[" +
                        i +
                        "]' type='text' class='form-control' value='-' required></td>");

                    $('#tab_logic3').append('<tr id="jadwal' + (i + 1) + '"></tr>');
                    i++;
                });
                $("#delete_row3").click(function() {
                    if (i > 1) {
                        $("#jadwal" + (i - 1)).html('');
                        i--;
                    }
                });

            });
        </script>
    </div>
</div>
<span>
    <a id="add_row3" class="btn btn-warning"><i class="bi bi-plus"></i></a>
    <a id='delete_row3' class="btn btn-primary"><i class="bi bi-trash"></i></a>
</span>
