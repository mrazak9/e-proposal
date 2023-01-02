<div class="modal fade" id="susunanM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj.addsusunan') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 900px; right:150px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Susunan Acara</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
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
                                            Waktu Mulai
                                        </th>
                                        <th class="text-center">
                                            Waktu Selesai
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
                                            <textarea rows="3" cols="30" name='susunan_kegiatan[0]' class="form-control" required></textarea>
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
                                            <input type="date" class="form-control" name="susunan_date[0]" placeholder="Tanggal Acara"
                                                maxlength="10" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="susunan_start_time[0]" placeholder="Tanggal Acara"
                                                maxlength="10" required>
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" name="susunan_end_time[0]" placeholder="Tanggal Acara"
                                                maxlength="10" required>
                                        </td>
                                        <td>
                                            <textarea name='susunan_notes[0]' class="form-control" maxlength="30" cols="30" rows="3" required>-</textarea>
                                        </td>
                                    </tr>
                                    <tr id='susunan1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row4").click(function() {
                                        $('#susunan' + i).html("<td>" + (i + 1) + "</td><td><textarea name='susunan_kegiatan[" + i +
                                            "]' cols='30' rows='3' class='form-control'required></textarea></td><td><select class='form-control' name='susunan_user_id[" +
                                            i +
                                            "]' required><option selected>== Pilih PIC ==</option>@foreach ($student as $s)<option value='{{ $s->user_id }}'>{{ $s->user->name }}</option>@endforeach</select></td><td><input name='susunan_date[" +
                                            i +
                                            "]' type='date' class='form-control' placeholder='Tanggal Acara' required></td><td><input name='susunan_start_time[" +
                                            i +
                                            "]' type='time' class='form-control' placeholder='Tanggal Acara' required></td><td><input name='susunan_end_time[" +
                                            i +
                                            "]' type='time' class='form-control' placeholder='Tanggal Acara' required></td><td><textarea name='susunan_notes[" + i +
                                            "]' type='text' class='form-control' maxlength='30' rows='3' cols='30' required>-</textarea></td>");
                    
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
                        <a id="add_row4" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row4' class="btn btn-primary"><i class="fas fa-trash"></i></a>
                    </span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>