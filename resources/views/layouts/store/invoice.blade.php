<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('webimages/logos/favicon.png') }}"><!-- Favicon -->
        <style>
        .invoice-ticket {
            padding: 20px;
            border: 1px solid #f9f9f9;
            border-radius: 10px
        }
        .title {
            background: #f9f9f9;
            padding: 15px;
            margin bottom: 20px
        }
        .content {
            margin-top: 20px
        }

    td, th { 
    padding: 0 10px;
    }
        </style>
    </head>
    <body>
        <div class="invoice">
            @yield('content')
        </div>
    </body>
</html>

