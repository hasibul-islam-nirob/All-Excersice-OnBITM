<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield("title") </title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/sidenav.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/datatables-select.min.css') }}">

</head>
<body>
@include('Layout.menu')


@yield("body")




<script type="text/javascript" src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/sidebarmenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/sticky-kit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/custom.min-2.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/datatables-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/axios.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/custom.js') }}"></script>
@yield("jsScript")

</body>
</html>
