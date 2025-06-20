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
                        Waktu
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
                        <input type="text" name='susunan_kegiatan[0]' class="form-control" required />
                    </td>
                    <td>
                        <select class="form-control" name="susunan_user_id[0]" required>
                            <option selected>== Pilih PIC ==</option>
                            @foreach ($student as $s)
                                <option value="{{ $s->user_id }}">{{ $s->user->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="time" class="form-control" name="susunan_time[0]" placeholder="Tanggal Acara"
                            maxlength="10" required>
                    </td>
                    <td>
                        <input type="text" name='susunan_notes[0]' class="form-control" value="-" required/>
                    </td>
                </tr>
                <tr id='susunan1'></tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row4").click(function() {
                    $('#susunan' + i).html("<td>" + (i + 1) + "</td><td><input name='susunan_kegiatan[" + i +
                        "]' type='text' class='form-control'required /></td><td><select class='form-control' name='susunan_user_id[" +
                        i +
                        "]' required><option selected>== Pilih PIC ==</option>@foreach ($student as $value => $key)<option value='{{ $value }}'>{{ $key }}</option>@endforeach</select></td><td><input name='susunan_time[" +
                        i +
                        "]' type='time' class='form-control' placeholder='Tanggal Acara' required></td><td><input name='susunan_notes[" + i +
                        "]' type='text' class='form-control' value='-' required></td>");

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
