<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Nama Proposal</label>
                    <input type="text" class="form-control" name="name" value="{{ $proposal->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Tempat</label>
                    <select class="form-control" name="id_tempat" required>
                        <option value="{{ $proposal->id_tempat }}" selected>{{ $proposal->place->name }}</option>
                        @foreach ($place as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" maxlength="10" value="{{ $proposal->tanggal }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Tujuan Kegiatan</label>
                    <input type="text" class="form-control" name="tujuan_kegiatan" value="{{ $proposal->tujuan_kegiatan }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Latar Belakang</label>
                    <textarea class="form-control" name="latar_belakang" rows="3" required>{{ $proposal->latar_belakang }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Event</label>
                    <select class="form-control" name="id_kegiatan" required>
                        <option selected value="{{ $proposal->id_kegiatan }}">{{ $proposal->event->name }}</option>
                        @foreach ($event as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                @can('CREATE_PROPOSAL')
                    <button class="btn btn-sm btn-primary"><i class="bi bi-check"></i> Submit</button>
                @endcan
                
            </div>
            
        </form>
            <div class="row">
                <div class="col-md-12">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="ex1-tab-6" data-bs-toggle="tab" href="#ex1-tabs-6"
                                role="tab" aria-controls="ex1-tabs-6" aria-selected="false">Kepanitiaan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab"
                                aria-controls="ex1-tabs-1" aria-selected="true">Penerimaan Anggaran</a>
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
                    </ul>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                            @include('proposal.editForm.editPenerimaan')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            @include('proposal.editForm.editPengeluaran')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                            @include('proposal.editForm.editJadwal')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                            @include('proposal.editForm.editSusunan')
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                            @include('proposal.editForm.editPeserta')
                        </div>
                        <div class="tab-pane fade show active" id="ex1-tabs-6" role="tabpanel"
                            aria-labelledby="ex1-tab-6">
                            @include('proposal.editForm.editKepanitiaan')
                        </div>

                    </div>
                    <!-- Tabs content -->
                    <script type="text/javascript">
                        $(document).ready(function() {

                            // Format mata uang.
                            $('.uang').mask('000.000.000', {
                                reverse: true
                            });

                        })
                    </script>
                </div>
            </div>
        </div>

    </div>    
</div>