<div class="row clearfix">
    <div class="col-md-12 column">
        <table class="table table-bordered table-hover" id="tab_logic6">
            <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Pilih Panitia
                    </th>
                    <th class="text-center">
                        Pilih Peran Panitia
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr id='kepanitiaan0'>
                    <td>
                        1
                    </td>
                    <td>
                        <select class="form-control" name="kepanitiaan_user_id[0]">
                            <option selected>== Pilih Panitia ==</option>
                            @foreach ($student as $value => $key )
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="kepanitiaan_position[0]">
                            <option selected>== Pilih Peran Panitia ==</option>
                                <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Wakil Ketua">Sekretaris</option>
                        </select>
                    </td>
                </tr>
                <tr id='kepanitiaan1'></tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                var i = 1;
                $("#add_row6").click(function() {
                    $('#kepanitiaan' + i).html("<td>" + (i + 1) +
                        "</td><td><select class='form-control' name='kepanitiaan_user_id[" +
                        i +
                        "]'><option selected>== Pilih Panitia ==</option>@foreach($student as $value => $key )<option value='{{ $value }}'>{{ $key }}</option>@endforeach</select></td><td><select class='form-control' name='kepanitiaan_position["+
                        i +
                        "]'><option selected>== Pilih Peran kepanitiaan ==</option><option value='Ketua Pelaksana'>Ketua Pelaksana</option><option value='Sekretaris'>Sekretaris</option><option value='Bendahara'>Bendahara</option><option value='Wakil Ketua'>Sekretaris</option></select></td>"
                        );

                    $('#tab_logic6').append('<tr id="kepanitiaan' + (i + 1) + '"></tr>');
                    i++;
                });
                $("#delete_row6").click(function() {
                    if (i > 1) {
                        $("#kepanitiaan" + (i - 1)).html('');
                        i--;
                    }
                });

            });
        </script>
    </div>
</div>
<span>
    <a id="add_row6" class="btn btn-warning"><i class="bi bi-plus"></i></a>
    <a id='delete_row6' class="btn btn-primary"><i class="bi bi-trash"></i></a>
</span>
