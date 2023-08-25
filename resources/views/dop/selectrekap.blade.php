@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Report Rekapitulasi
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Pilih Periode Dana Rutin</h3>
                    </div>
                    <div class="card-body">
                        <form method="GET" onsubmit="return validateEndDate();" action="{{ route('admin.dop.reportrekap') }}"
                            id="report" role="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <Label>
                                        <h4>
                                            Tanggal Mulai & Tanggal Akhir
                                        </h4>
                                    </Label>
                                    <div class="input-group">
                                        <input type="date" name="startdate" aria-label="Start Date" class="form-control"
                                            required>
                                        <input type="date" name="enddate" aria-label="End Date" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-info active">
                                            <input type="radio" name="exportType"value="print">
                                            <i class="fa fa-print" aria-hidden="true"></i> Print
                                        </label>
                                        <label class="btn btn-success">
                                            <input type="radio" name="exportType" value="excel">
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        // Fungsi untuk melakukan validasi tanggal berakhir
        function validateEndDate() {
            var startDate = new Date(document.getElementsByName("startdate")[0].value);
            var endDate = new Date(document.getElementsByName("enddate")[0].value);

            if (endDate < startDate) {
                alert("Tanggal berakhir tidak bisa lebih kecil dari tanggal mulai.");
                return false;
            }

            return true;
        }
    </script>
@endsection
