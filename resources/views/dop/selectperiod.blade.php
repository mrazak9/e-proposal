@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Report Dana Rutin
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Pilih Periode</h3>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.dop.report') }}" id="report" role="form"
                            enctype="multipart/form-data">
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
