<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome-animation.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <title>Cetak Proposal | {{ ucwords($proposals->name) }}</title>
    <style>
        h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        h3 {
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        window.onload = window.print();
    </script>
</head>

<body>
    <div class="container">
        {{-- COVER PAGE --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Institut Digital Ekonomi</h1>
                <h1>LPKIA</h1>
                <br>
                <br>
                <h2>{{ ucwords($proposals->name) }}</h2>
                <br>
                <h3>disusun <br />oleh</h3>
                <h3>{{ $proposals->org_name }}</h3>
            </div>
            <div class="col-md-12">
                <p style="text-align:center; filter: grayscale(100%); margin-top: 25%"><img
                        src="{{ asset('images/CAP LPKIA.png') }}" alt="LPKIA logo" height="100px"></p>

            </div>
            <div class="col-md-12" style="margin-top: 40%">
                <h3>Jalan Soekarno Hatta No. 456</h3>
                <h3>Bandung 40266, Jawa Barat</h3>
                <h3><i class="fas fa-phone"></i> 022-7564283 / 7564284</h3>
            </div>
        </div>
        {{-- END OF COVER PAGE --}}
        {{-- ISI PROPOSAL --}}
        <div class="row">
            <div class="col-md-12">
                <p>Nama Kegiatan: {{ $proposals->name }}</p>
            </div>
        </div>
        {{-- END OF ISI PROPOSAL --}}
    </div>

</body>

</html>
