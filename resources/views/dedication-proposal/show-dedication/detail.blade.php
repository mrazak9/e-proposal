<div class="row">
    <div class="col-md-12">
        <h3>Isi Proposal</h3>
        <div class="container my-1">
            <div class="card shadow-sm" style="max-width: 100%; max-height: 1000px; overflow-y: auto;">
                <div class="card-body">
                    <h5 class="card-title">1. Ringkasan</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->summary !!}
                    <hr>
                    <h5 class="card-title">2. Kata Kunci</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->keyword !!}
                    <hr>
                    <h5 class="card-title">3. Latar Belakang</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->background !!}
                    <hr>
                    <h5 class="card-title">4. State of the Art:</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->state_of_the_art !!}
                    <hr>
                    <h5 class="card-title">5. Road Map Penelitian:</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->road_map_research !!}
                    <small class="text-danger">
                        <a href="/data_roadmap/{{ $dedicationProposal->dedicationProposalDetail->attachment }}">
                            Lampiran Road Map Penelitian <i class="fas fa-paperclip"></i>
                        </a>
                    </small>
                    <hr>
                    <h5 class="card-title">6. Metode dan Desain Penelitian:</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->method_and_design !!}
                    <hr>
                    <h5 class="card-title">7. Daftar Pustaka:</h5>
                    {!! $dedicationProposal->dedicationProposalDetail->references !!}
                </div>
            </div>
        </div>
    </div>
</div>
