<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('webimages/logos/favicon.png') }}"><!-- Favicon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/invoice.css') }}">
    </head>
    <body>
        <div class="invoice">
            <div class="table-responsive">
                <span class="title">@yield('title')</span>
                <table id="TableList" class="table table-bordered table-striped custom-list">
                    <thead>
                        <tr>
                            @yield('table-titles')
                        </tr>
                    </thead>
                    <tbody>
                        @yield('table-content')
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>