<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome-animation.css') }}" />
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
                <h2>{{ $proposals->name }}</h2>
                <h3>disusun <br />oleh</h3>
                <h3>{{ $proposals->org_name }}</h3>
            </div>
            <div class="col-md-12">
                <p style="text-align:center; filter: grayscale(100%); margin-top: 25%"><img
                        src="{{ asset('images/CAP LPKIA.png') }}" alt="LPKIA logo" height="100px"></p>

            </div>
            <div class="col-md-12" style="margin-top: 50%">
                <h3>Jalan Soekarno Hatta No. 456</h3>
                <h3>Bandung 40266, Jawa Barat</h3>
                <h3><i class="fas fa-phone"></i> 022-7564283 / 7564284</h3>
            </div>
        </div>
        {{-- END OF COVER PAGE --}}
        {{-- ISI PROPOSAL --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Column 1</th>
                                    <th scope="col">Column 2</th>
                                    <th scope="col">Column 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>R1C2</td>
                                    <td>R1C3</td>
                                </tr>
                                <tr class="">
                                    <td scope="row">Item</td>
                                    <td>Item</td>
                                    <td>Item</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        {{-- END OF ISI PROPOSAL --}}
    </div>

</body>

</html>
