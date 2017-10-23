<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title> Cempaka | @yield("title") </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

        <style type="text/css">

            div.container-small {
                max-width: 600px;
            }

            div.container-medium {
                max-width: 1000px;
            }

            img.d-block {
                width: 100%;
                height: auto%;
            }

            div.info {
                padding: 15px;
            }

            div.container-fluid {
                padding: 0px 40px 0px 40px;
            }

            div.card {
                width: 100%;
            }

        </style>

    </head>

    <body>

        @yield("body")

        <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

        @yield("extra-script")


    </body>
</html>