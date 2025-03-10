<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proposal Pengajuan Penelitian</title>
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
                height: 100vh;
                text-align: center;
                background-color: #ffffff;
                padding: 0 20px;
            }

            .header-title {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .header-address {
                font-size: 16px;
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
    </head>

    <body>
        <!-- Cover Page -->
        <div class="cover">
            <div class="header-title">Institut Digital Ekonomi LPKIA</div>
            <div class="header-address">
                Jl. Soekarno Hatta no. 456, Bandung 40266, Jawa Barat<br>
                <i class="fa fa-phone" aria-hidden="true"></i> 022-7564283 / 7564284
            </div>
            <img src="https://assets.siakadcloud.com/uploads/lpkia/logoaplikasi/642.jpg" alt="Logo Universitas"
                class="logo">
            <div class="title">
                Proposal Pengajuan Penelitian<br>
                Mahasiswa
            </div>
            <div class="footer">
                <i class="fa fa-user"></i> <b>Disusun oleh:</b> {{ $dedicationProposal->lppmUser->user->name }}
                <center><b>Anggota:</b></center>
                @foreach ($dedicationProposal->dedicationProposalMembers as $member)
                    <br> <i class="fa fa-users"></i> {{ $member->name }}
                @endforeach
                <br>
            </div>
        </div>

        <!-- Page 2: Details -->
        <div class="page">
            {{-- IDENTITAS KETUA --}}
            <h3>1. Identitas Ketua Peneliti</h3>
            <table class="table table-bordered">
                <tr>
                    <th>NIDN/NIDK/NIP</th>
                    <td>{{ $dedicationProposal->lppmUser->nidn }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap (Tanpa Gelar)</th>
                    <td>{{ $dedicationProposal->lppmUser->user->name }}</td>
                </tr>
                <tr>
                    <th>Afiliasi</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
            </table>
            <hr>
            <h3>2. Proposal</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $dedicationProposal->lppmUser->nidn }}</td>
                </tr>
                <tr>
                    <th>Kelompok Skema Penelitian</th>
                    <td>{{ $dedicationProposal->lppmUser->user->name }}</td>
                </tr>
                <tr>
                    <th>Rumpun Ilmu</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Jenis SKIM</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Tahun Usulan</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Tahun Pelaksanaan</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pelaksanaan</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                </tr>
                <tr>
                    <th>Lama Kegiatan</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }} bulan</td>
                </tr>
                <tr>
                    <th>Sumber Dana</th>
                    <td>{{ $dedicationProposal->lppmUser->affiliation }} bulan</td>
                </tr>
            </table>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
