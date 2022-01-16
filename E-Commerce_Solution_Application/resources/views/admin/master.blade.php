<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.meta')
    @include('admin.includes.style')
    <title>@yield('title')</title>

</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    @include('admin.includes.header')
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    @include('admin.includes.menu')
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        @yield('body')
        <!-- END PAGE CONTENT-->
        @include('admin.includes.footer')
    </div>
</div>

<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

@include('admin.includes.script')
@yield('script')
</body>
</html>
