<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Ringkasan:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->summary }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Kata Kunci:</th>
                        <td>
                            <input class="form-control" type="text" value="{{ $researchProposal->researchProposalsDetail->keyword }}"
                                readonly>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Latar Belakang:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->background }}</textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <th>State of the Art:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->state_of_the_art }}</textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Road Map Penelitian:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->road_map_research }}</textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Metode dan Desain Penelitian:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->method_and_design }}</textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Daftar Pustaka:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->researchProposalsDetail->references }}</textarea>
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
