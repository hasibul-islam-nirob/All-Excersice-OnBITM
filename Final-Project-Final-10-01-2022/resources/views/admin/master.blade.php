<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('/')}}admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}admin/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}admin/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset('/')}}admin/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />

    <!-- PLUGINS STYLES-->
    <link href="{{asset('/')}}admin/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES For Long Text Editor-->
    <link href="{{asset('/')}}admin/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />

    <!-- THEME STYLES-->
    <link href="{{asset('/')}}admin/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
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
        <div class="page-content fade-in-up">
            @yield('body')
        </div>
        <!-- END PAGE CONTENT-->

        @include('admin.includes.footer')
    </div>
</div>


<!-- BEGIN PAGA BACKDROPS-->
{{--<div class="sidenav-backdrop backdrop"></div>--}}
{{--<div class="preloader-backdrop">--}}
    {{--<div class="page-preloader">Loading</div>--}}
{{--</div>--}}
<!-- END PAGA BACKDROPS-->

<!-- CORE PLUGINS-->
<script src="{{asset('/')}}admin/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('/')}}admin/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('/')}}admin/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

<script src="{{asset('/')}}admin/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL PLUGINS   For Long Text Editor-->
<script src="{{asset('/')}}admin/assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>

<!-- CORE SCRIPTS-->
<script src="{{asset('/')}}admin/assets/js/app.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
             { "data": "name" },
             { "data": "office" },
             { "data": "extn" },
             { "data": "start_date" },
             { "data": "salary" }
             ]*/
        });
    })
</script>

<!--   For Long Text Editor-->
<script type="text/javascript">
    $(function() {
        $('#summernote').summernote();
        $('#summernote_air').summernote({
            airMode: true
        });
    });
</script>


<script type="text/javascript">
    $(document).on('change','#categoryID' ,function () {
        var categoryID = $(this).val();

        $.ajax({
            method:'GET',
            url:'{{url('/get-sub-category-by-id')}}',
            data:{id:categoryID},
            dataType:'json',
            success:function (res) {
                var option = '';
                option += '<option> -- Select Sub Category -- </option>';
                $.each(res, function (key, value){
                    option += '<option value=" ' +value.id+' ">"' +value.name+'"</option>";
                    )};
                    $('#subCategoryID').empty().append(option);
            },
            error:function (err) {
                console.log(err);
            }
        })
    });
</script>


</body>

</html>