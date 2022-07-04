<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nama Proposal">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <select class="form-control" name="id_tempat">
                        <option selected>== Pilih Tempat Acara ==</option>
                        @foreach ($place as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Acara"
                        maxlength="10">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <input type="text" class="form-control" name="tujuan_kegiatan" placeholder="Tujuan Kegiatan">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <textarea class="form-control" name="latar_belakang" placeholder="Latar Belakang Acara" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <select class="form-control" name="id_kegiatan">
                        <option selected>== Pilih Jenis Acara ==</option>
                        @foreach ($event as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1"
                                role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Penerimaan Anggaran</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab"
                                aria-controls="ex1-tabs-2" aria-selected="false">Pengeluaran Anggaran</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3" role="tab"
                                aria-controls="ex1-tabs-3" aria-selected="false">Jadwal Perencanaan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-4" data-bs-toggle="tab" href="#ex1-tabs-4" role="tab"
                                aria-controls="ex1-tabs-4" aria-selected="false">Susunan Acara</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-5" data-bs-toggle="tab" href="#ex1-tabs-5" role="tab"
                                aria-controls="ex1-tabs-5" aria-selected="false">Peserta</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-6" data-bs-toggle="tab" href="#ex1-tabs-6" role="tab"
                                aria-controls="ex1-tabs-6" aria-selected="false">Kepanitiaan</a>
                        </li>
                    </ul>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                            aria-labelledby="ex1-tab-1">
                            @include('proposal.tabForm.tabPenerimaan')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            @include('proposal.tabForm.tabPengeluaran')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                            @include('proposal.tabForm.tabJadwal')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                            @include('proposal.tabForm.tabSusunan')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                            @include('proposal.tabForm.tabPeserta')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-6" role="tabpanel" aria-labelledby="ex1-tab-6">
                            @include('proposal.tabForm.tabKepanitiaan')
                        </div>
                    </div>
                    <!-- Tabs content -->

                </div>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
