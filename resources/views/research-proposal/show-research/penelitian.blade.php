<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Judul:</th>
                        <td>
                            <textarea class="form-control" readonly>{{ $researchProposal->title }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Kelompok Skema Penelitian:</th>
                        <td>
                            <input class="form-control" type="text" value="{{ $researchProposal->research_group }}"
                                readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Rumpun Ilmu:</th>
                        <td>
                            <input class="form-control" type="text"
                                value="{{ $researchProposal->cluster_of_knowledge }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis SKIM:</th>
                        <td>
                            @php
                                $skimTypes = [
                                    1 => 'Digitalisasi Bisnis/Kewirausahaan',
                                    2 => 'Digitalisasi Akuntansi/Keuangan',
                                    3 => 'Digitalisasi Akuntansi/Keuangan',
                                ];
                            @endphp
                            <input class="form-control" type="text"
                                value="{{ $skimTypes[$researchProposal->type_of_skim] ?? '' }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Lokasi:</th>
                        <td>
                            <input class="form-control" type="text"
                                value="{{ $researchProposal->location }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Tahun Usulan:</th>
                        <td>
                            <input class="form-control" type="text"
                                value="{{ $researchProposal->proposed_year }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Tahun Pelaksanaan:</th>
                        <td>
                            <input class="form-control" type="text"
                                value="{{ $researchProposal->implementation_year }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Pelaksanaan:</th>
                        <td>
                            <input class="form-control" type="text"
                                value="{{ \Carbon\Carbon::parse($researchProposal->implementation_date)->format('d-M') }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Sumber Dana:</th>
                        <td>
                            @php
                            $fundTypes = [
                                1 => 'Mandiri',
                                2 => 'DikTi',
                                3 => 'Perguruan Tinggi',
                                4 => 'Mitra',
                            ];
                        @endphp
                        <input class="form-control" type="text"
                            value="{{ $fundTypes[$researchProposal->source_of_funds] ?? '' }}" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
