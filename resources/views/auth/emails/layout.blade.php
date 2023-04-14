<!DOCTYPE html>
<html>

<head>
    <title>
        @yield('template_title')
    </title>
    <style>
        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .green {
            background-color: #4CAF50;
        }

        /* Green */
        .blue {
            background-color: #008CBA;
        }

        /* Blue */
    </style>
</head>

<body>
    @yield('contents')

    <p>Terima kasih,</p>
    <p>e-Proposal System <br>IDE LPKIA</p>
    <img src="{{ asset('images/lpkia-email.png') }}" alt="logo_ide_lpkia" style="height: 80px">
</body>

</html>
