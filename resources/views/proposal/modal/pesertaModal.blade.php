<div class="modal fade" id="pesertaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.participant.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Peserta</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic5">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Pilih Tipe Peserta
                                        </th>
                                        <th class="text-center">
                                            Total Peserta
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='peserta0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <select class="form-control" name="peserta_participant_type_id[0]" required>
                                                <option selected>== Pilih Tipe Peserta ==</option>
                                                @foreach ($participantType as $value => $key )
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name='peserta_participant_total[0]' min="0" class="form-control" required />
                                        </td>
                                    </tr>
                                    <tr id='peserta1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row5").click(function() {
                                        $('#peserta' + i).html("<td>" + (i + 1) + "</td><td><select class='form-control' name='peserta_participant_type_id[" +
                                            i +
                                            "]' required><option selected>== Pilih Tipe Peserta ==</option>@foreach ($participantType as $value => $key )<option value='{{ $key }}'>{{ $value }}</option>@endforeach</select></td><td><input name='peserta_participant_total[" + i +
                                            "]' type='number' min='0' class='form-control' required></td>");
                    
                                        $('#tab_logic5').append('<tr id="peserta' + (i + 1) + '"></tr>');
                                        i++;
                                    });
                                    $("#delete_row5").click(function() {
                                        if (i > 1) {
                                            $("#peserta" + (i - 1)).html('');
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>