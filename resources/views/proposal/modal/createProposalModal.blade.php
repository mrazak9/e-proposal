<div class="modal fade" id="createProposalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" onsubmit="return validateEndDate();" action="{{ route('admin.store.proposal') }}"
            enctype="multipart/form-data">
            <div class="modal-content" style="width: 750px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Pengajuan Proposal Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Nama Proposal</label>
                                    <input type="text" class="form-control" name="name" maxlength="180" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Tema Kegiatan</label>
                                    <input type="text" class="form-control" name="tema_kegiatan" maxlength="180"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tempat Acara</label>
                                    <select class="form-control" name="id_tempat" required>
                                        <option selected disabled>== Pilih Tempat Acara ==</option>
                                        @foreach ($place as $value => $key)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" maxlength="10"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Tujuan Kegiatan</label>
                                    <textarea class="form-control" name="tujuan_kegiatan" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Latar Belakang Acara</label>
                                    <textarea id="tinymce" class="form-control" name="latar_belakang" rows="5"></textarea>
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
                                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                                                    </option>
                                                    @foreach ($student as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="kepanitiaan_position[0]" required>
                                                    <option value="Penanggung Jawab">Penanggung Jawab</option>
                                                    @foreach ($committeeRoles as $value)
                                                        <option value="{{ $value }}">{{ $value }}
                                                        </option>
                                                    @endforeach


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
                                                "]' required><option selected disabled value=''>== Pilih Panitia ==</option>@foreach ($student as $value)<option value='{{ $value->id }}'>{{ $value->name }}</option>@endforeach</select></td><td><select class='form-control' name='kepanitiaan_position[" +
                                                i +
                                                "]' required><option selected disabled value=''>== Pilih Peran kepanitiaan ==</option>@foreach ($committeeRoles as $value)<option value='{{ $value }}'>{{ $value }}</option>@endforeach</select></td>"
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@section('scripts')
    <script>
        // Fungsi untuk melakukan validasi tanggal berakhir
        function validateEndDate() {
            var startDate = new Date(document.getElementsByName("tanggal")[0].value);
            var endDate = new Date(document.getElementsByName("tanggal_selesai")[0].value);

            if (endDate < startDate) {
                alert("Tanggal berakhir tidak bisa lebih kecil dari tanggal mulai.");
                return false;
            }

            return true;
        }
    </script>
@endsection
