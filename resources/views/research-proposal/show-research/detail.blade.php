<div class="row">
    <div class="col-md-12">
        <h3>Isi Proposal</h3>
        <div class="container my-1">
            <div class="card shadow-sm" style="max-width: 100%; max-height: 1000px; overflow-y: auto;">
                <div class="card-body">
                    <h5 class="card-title">1. Ringkasan</h5>
                    @if (!empty($researchProposal->researchProposalsDetail->summary))
                        {!! $researchProposal->researchProposalsDetail->summary !!}
                    @else
                        <p>Isi kosong. Silahkan lengkapi terlebih dahulu!</p>
                    @endif

                    <hr>
                    <h5 class="card-title">2. Kata Kunci</h5>
                    {!! $researchProposal->researchProposalsDetail->keyword??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                    <hr>
                    <h5 class="card-title">3. Latar Belakang</h5>
                    {!! $researchProposal->researchProposalsDetail->background??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                    <hr>
                    <h5 class="card-title">4. State of the Art:</h5>
                    {!! $researchProposal->researchProposalsDetail->state_of_the_art??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                    <hr>
                    <h5 class="card-title">5. Road Map Penelitian:</h5>
                    {!! $researchProposal->researchProposalsDetail->road_map_research??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                    <small class="text-danger">
                        <a href="/data_roadmap/{{ $researchProposal->researchProposalsDetail->attachment??'#' }}">
                            Lampiran Road Map Penelitian <i class="fas fa-paperclip"></i>
                        </a>
                    </small>
                    <hr>
                    <h5 class="card-title">6. Metode dan Desain Penelitian:</h5>
                    {!! $researchProposal->researchProposalsDetail->method_and_design??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                    <hr>
                    <h5 class="card-title">7. Daftar Pustaka:</h5>
                    {!! $researchProposal->researchProposalsDetail->references??'Isi kosong. Silahkan lengkapi terlebih dahulu!' !!}
                </div>
            </div>
        </div>
    </div>
</div>
