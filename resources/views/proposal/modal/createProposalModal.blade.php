<div class="modal fade" id="createProposalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.store.proposal') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 750px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Proposal</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Proposal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select class="form-control" name="id_tempat" required>
                                        <option selected disabled>== Pilih Tempat Acara ==</option>
                                        @foreach ($place as $value => $key)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Acara" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" name="tujuan_kegiatan" placeholder="Tujuan Kegiatan" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" name="latar_belakang" placeholder="Latar Belakang Acara" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <select class="form-control" name="id_kegiatan" required>
                                        <option selected disabled> == Pilih Jenis Acara == </option>
                                        @foreach ($event as $value => $key)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select class="form-control" name="org_name" required>
                                        <option selected disabled> == Pilih Nama Organisasi == </option>
                                        @foreach ($organization_name as $value => $key)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select class="form-control" name="owner" required>
                                        <option selected disabled> == Pilih Tipe Organisasi == </option>
                                        @foreach ($organization as $value => $key)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                                <select class="form-control" name="kepanitiaan_user_id[0]" required>
                                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                                    @foreach ($student as $value)
                                                        <option value="{{ $value->user_id }}">{{ $value->nim }} - {{ $value->user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="kepanitiaan_position[0]" required>
                                                    <option value="Penanggung Jawab">Penanggung Jawab</option>
                                                    <option value="Acara">Acara</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                    <option value="Keamanan">Keamanan</option>
                                                    <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                                                    <option value="Konsumsi">Konsumsi</option>
                                                    <option value="Logistik">Logistik</option>
                                                    <option value="Penanggung Jawab">Penanggung Jawab</option>
                                                    <option value="Publikasi dan Dokumentasi">Publikasi dan Dokumentasi</option>
                                                    <option value="Sekretaris">Sekretaris</option>
                                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                                    <option value="Lain-lain">Lain-lain</option>
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
                                                "]' required><option selected disabled value=''>== Pilih Panitia ==</option>@foreach($student as $value)<option value='{{ $value->user_id }}'>{{ $value->user->name }}</option>@endforeach</select></td><td><select class='form-control' name='kepanitiaan_position["+
                                                i +
                                                "]' required><option selected disabled value=''>== Pilih Peran kepanitiaan ==</option><option value='Acara'>Acara</option><option value='Bendahara'>Bendahara</option><option value='Keamanan'>Keamanan</option><option value='Ketua Pelaksana'>Ketua Pelaksana</option><option value='Konsumsi'>Konsumsi</option><option value='Logistik'>Logistik</option><option value='Penanggung Jawab'>Penanggung Jawab</option><option value='Publikasi dan Dokumentasi'>Publikasi dan Dokumentasi</option><option value='Sekretaris'>Sekretaris</option><option value='Wakil Ketua'>Wakil Ketua</option><option value='Lain-lain'>Lain-lain</option></option></select></td>"
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
                            <a id="add_row6" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                            <a id='delete_row6' class="btn btn-primary"><i class="fas fa-trash"></i></a>
                        </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>                   
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>