<div class="modal fade" id="jadwalM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lpj.addjadwalperencanaan') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Jadwal Perencanaan</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lpj_id" value="{{ Crypt::encrypt($lpj->id) }}">
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
                                            Tanggal Mulai
                                        </th>
                                        <th class="text-center">
                                            Tanggal Selesai
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
                                            <textarea cols="30" rows="3" name='jadwal_kegiatan[0]' class="form-control" required></textarea>
                                        </td>
                                        <td>
                                            <select class="form-control" name="jadwal_user_id[0]">
                                                <option selected>== Pilih PIC ==</option>
                                                @foreach ($student as $s)
                                                    <option value="{{ $s->user_id }}">{{ $s->user->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="jadwal_start_date[0]" placeholder="Tanggal Acara" maxlength="10" required>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="jadwal_end_date[0]" placeholder="Tanggal Acara" maxlength="10" required>
                                        </td>
                                        <td>
                                            <textarea name='jadwal_notes[0]' class="form-control" maxlength="30" rows="3" cols="30" required>-</textarea>
                                        </td>
                                    </tr>
                                    <tr id='jadwal1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row3").click(function() {
                                        $('#jadwal' + i).html("<td>" + (i + 1) + "</td><td><textarea name='jadwal_kegiatan[" + i +
                                            "]' cols='30' rows='3' class='form-control' required></textarea></td><td><select class='form-control' name='jadwal_user_id[" +
                                            i +
                                            "]'><option selected>== Pilih PIC ==</option>@foreach ($student as $s)<option value='{{ $s->user_id }}'>{{ $s->user->name }}</option>@endforeach</select></td><td><input name='jadwal_start_date[" +
                                            i +
                                            "]' type='date' class='form-control' placeholder='Tanggal Acara' required></td><td><input name='jadwal_end_date[" +
                                            i +
                                            "]' type='date' class='form-control' placeholder='Tanggal Acara' required></td><td><textarea name='jadwal_notes[" +
                                            i +
                                            "]' class='form-control' maxlength='30' rows='3' cols='30' required>-</textarea></td>");
                    
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
                        <a id="add_row3" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row3' class="btn btn-primary"><i class="fas fa-trash"></i></a>
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