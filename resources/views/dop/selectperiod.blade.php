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
                        <form method="GET" action="{{ route('admin.dop.report') }}" role="form"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <Label>Tanggal Mulai & Tanggal Akhir </Label>
                                    <div class="input-group">
                                        <input type="date" name="startdate" aria-label="Start Date" class="form-control"
                                            required>
                                        <input type="date" name="enddate" aria-label="End Date" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-sm btn-primary w-100" type="submit">
                                        <i class="fas fa-check">
                                        </i> Print
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-sm btn-success w-100" type="submit">
                                        <i class="fas fa-file-excel"></i> Excel
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
