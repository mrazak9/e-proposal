<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proposal Pengajuan Penelitian - {{$researchProposal->title}}</title>
        <!-- Bootstrap 4 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Font Awesome 4 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .cover {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                background-color: #ffffff;
                padding: 0 20px;
            }

            .header-title {
                font-size: 35px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .header-address {
                font-size: 25px;
                margin-bottom: 40px;
            }

            .logo {
                width: 150px;
                height: 150px;
                margin-bottom: 20px;
            }

            .title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 100px;
            }

            .footer {
                position: absolute;
                bottom: 30px;
                font-size: 18px;
            }

            .page {
                page-break-before: always;
                padding: 30px;
            }
        </style>
         <script>
            window.onload = function () {
                window.print();  // Opens print dialog when page loads
            };
        </script>
    </head>

    <body>
        <!-- Cover Page -->        
        <div class="cover">
            <div class="header-title">Institut Digital Ekonomi LPKIA</div>
            <div class="header-address">
                Jl. Soekarno Hatta no. 456, Bandung 40266, Jawa Barat<br>
                <i class="fa fa-phone" aria-hidden="true"></i> 022-7564283 / 7564284
            </div>
            <div style="margin-bottom: 500px">

            </div>
            <img src="https://assets.siakadcloud.com/uploads/lpkia/logoaplikasi/642.jpg" alt="Logo Universitas"
                class="logo">
            <div class="title">
                <b>{{$researchProposal->title}}</b>
            </div>
            <div class="footer">
                <i class="fa fa-user"></i> <b>Disusun oleh:</b> {{ $researchProposal->lppmUser->user->name }}
                <center><b>Anggota:</b></center>
                @foreach ($researchProposal->researchProposalsMember as $member)
                    <br> <i class="fa fa-users"></i> {{ $member->name }} ({{ $member->identity_number }})
                @endforeach
                <br><br>
               <b>{{ date('Y') }}</b> 
            </div>
        </div>

        <!-- Page 2: Details -->
        <div class="page">
            {{-- IDENTITAS KETUA --}}
            <h3>1. Identitas Ketua Penelitian</h3>
            <table class="table table-bordered">
                <tr>
                    <th>NIDN/NIDK/NIP</th>
                    <td>{{ $researchProposal->lppmUser->nidn }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap (Tanpa Gelar)</th>
                    <td>{{ $researchProposal->lppmUser->user->name }}</td>
                </tr>
                <tr>
                    <th>Afiliasi</th>
                    <td>{{ $researchProposal->lppmUser->affiliation }}</td>
                </tr>
            </table>
            <hr>
            {{-- PROPOSAL Penelitian --}}
            <h3>2. Proposal Penelitian</h3>
            <table class="table table-bordered">
                @php
                    $skimTypes = [
                        1 => 'Digitalisasi Bisnis/Kewirausahaan',
                        2 => 'Digitalisasi Akuntansi/Keuangan',
                        3 => 'Digitalisasi Akuntansi/Keuangan',
                    ];
                    $fundTypes = [
                        1 => 'Mandiri',
                        2 => 'DikTi',
                        3 => 'Perguruan Tinggi',
                        4 => 'Mitra',
                    ];
                @endphp
                <tr>
                    <th>Judul</th>
                    <td>{{ $researchProposal->title }}</td>
                </tr>
                <tr>
                    <th>Kelompok Skema Penelitian</th>
                    <td>{{ $researchProposal->research_group }}</td>
                </tr>
                <tr>
                    <th>Rumpun Ilmu</th>
                    <td>{{ $researchProposal->cluster_of_knowledge }}</td>
                </tr>
                <tr>
                    <th>Jenis SKIM</th>
                    <td>{{ $skimTypes[$researchProposal->type_of_skim] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $researchProposal->location }}</td>
                </tr>
                <tr>
                    <th>Tahun Usulan</th>
                    <td>{{ $researchProposal->proposed_year }}</td>
                </tr>
                <tr>
                    <th>Tahun Pelaksanaan</th>
                    <td>{{ $researchProposal->implementation_year }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pelaksanaan</th>
                    <td>{{ $researchProposal->implementation_date }}</td>
                </tr>
                <tr>
                    <th>Lama Kegiatan</th>
                    <td>{{ $researchProposal->length_of_activity }} bulan</td>
                </tr>
                <tr>
                    <th>Sumber Dana</th>
                    <td>{{ $fundTypes[$researchProposal->source_of_funds] ?? '' }}</td>
                </tr>
            </table>
            <hr>
            {{-- ANGGOTA --}}
            <h3>3. Anggota</h3>
            <table class="table table-bordered">
                @php
                    $i = 0;
                @endphp
                @foreach ($researchProposal->researchProposalsMember as $member)
                    <tr>
                        <th>{{ ++$i }}. Nama Lengkap (Tanpa Gelar)</th>
                        <td>{{ $member->name }}</td>
                    </tr>
                    <tr>
                        <th>NIDN/NIDK/NIP</th>
                        <td>{{ $member->identity_number }}</td>
                    </tr>
                    <tr>
                        <th>Afiliasi</th>
                        <td>{{ $member->affiliation }}</td>
                    </tr>
                @endforeach
            </table>
            <hr>
        </div>
        <hr>
        <div class="page">
            {{-- ISI PROPOSAL --}}
            <div class="row">
                <div class="col-md-12">
                    <h3>Isi Proposal</h3>
                    <h5>1. Ringkasan</h5>
                    {!! $researchProposal->researchProposalsDetail->summary !!}
                </div>
                <div class="col-md-12">
                    <h5>2. Kata Kunci</h5>
                    {!! $researchProposal->researchProposalsDetail->keyword !!}
                </div>
                <div class="col-md-12">
                    <h5>3. Latar Belakang</h5>
                    {!! $researchProposal->researchProposalsDetail->background !!}
                </div>
                <div class="col-md-12">
                    <h5>4. State of The Art</h5>
                    {!! $researchProposal->researchProposalsDetail->state_of_the_art !!}
                </div>
                <div class="col-md-12">
                    <h5>5. Roadmap Penelitian</h5>
                    {!! $researchProposal->researchProposalsDetail->road_map_research !!} <br>
                    <img src="/data_roadmap/{{ $researchProposal->researchProposalsDetail->attachment }}" alt="">
                </div>
                <div class="col-md-12">
                    <h5>6. Metode dan Desain Penelitian</h5>
                    {!! $researchProposal->researchProposalsDetail->method_and_design !!}                  
                </div>
                <div class="col-md-12">
                    <h5>7. Daftar Pustaka</h5>
                    {!! $researchProposal->researchProposalsDetail->references !!}                  
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
