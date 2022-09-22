<!DOCTYPE html>
<html>


<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Wafanyabiashara Ndogondogo  - Portal">
    <meta name="author" content="National Internet Data Center(NIDC)">
    <meta name="keywords" content="wajasiliamali, tanzania, bihashara, wizara, N-Card, nidc, TAMISEMI">
    
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ngao.png') }}" />

		<!-- TITLE -->
		<title>Wafanyabiashara Ndogondogo - Portal</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet"/>

		<!--C3 CHARTS CSS -->
		<link href="{{ asset('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet"/>

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

		<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/date-picker/spectrum.css" rel="stylesheet') }}" />
		<link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

        {{--  <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">  --}}
        <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">

		

        <link href="{{ asset('assets/plugins/charts-nvd3/nv.d3.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css') }}" rel="stylesheet">

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet"/>

        <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/rating/rating.css') }}" rel="stylesheet">

        <!-- SIDE-MENU CSS -->
        <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

        <!-- SWITCHER SKIN CSS -->
		<link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">

		
		<link href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />


        
</head>

<body data-base-url="{{url('/dashboard')}}" class="app sidebar-mini dark-menu">


        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->
   
        <div class="page">
            <div class="page-main">
             @include('layout.header')
             @yield('content')
			      </div>
            @include('layout.sidebar')
           @include('layout.footer')

        </div>

        

             <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="{{ asset('assets/plugins/circle-progress/circle-progress.min.js') }}"></script>

		<!-- C3.JS CHART JS -->
		<script src="{{ asset('assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/charts-c3/c3-chart.js') }}"></script>

		<!-- INPUT MASK JS-->
		<script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

		<!-- SIDE-MENU JS-->
		<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>

        <script src="{{ asset('assets/js/index3.js') }}"></script>
		<script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>
		<script src="{{ asset('assets/plugins/morris/raphael-min.js') }}"></script>
		<script src="{{ asset('assets/plugins/morris/morris.js') }}"></script>
		<script src="{{ asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
		<script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>
		<script src="{{ asset('assets/plugins/rating/ratings.js') }}"></script>

		

        <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
		<script src="{{ asset('assets/plugins/date-picker/spectrum.js') }}"></script>
		<script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
		<script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
		<script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
		<script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
		<script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
		<script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>
		<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
		<script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script>
		<script src="{{ asset('assets/js/form-elements.js') }}"></script>

		<!--CUSTOM JS -->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Color Change JS -->
        <script src="{{ asset('assets/js/color-change.js') }}"></script>

        <!-- SWITCHER JS -->
		<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>


        <script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/datatable.js') }}"></script>
		{{--  <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>  --}}


		

        <script src="{{ asset('assets/plugins/charts-nvd3/d3.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/charts-nvd3/nv.d3.js') }}"></script>
		<script src="{{ asset('assets/plugins/charts-nvd3/stream_layers.js') }}"></script>
		<script src="{{ asset('assets/js/nvd3.js') }}"></script>

		
    

    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css') }}">

    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js') }}" ></script>

	<script>
	                 let tittle = "<?php if(empty($tittle)){ echo 'Wajasiriamali'; }else{echo $tittle;} ?>";
					 let today = new Date().toISOString().slice(0, 10);
                    $('#example').DataTable({
                        responsive: true,
                        pageLength: 10,
                        dom: 'Bfrtip',
                        lengthMenu: [
                                        [ 10, 25, 50, -1 ],
                                        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                                    ],
                        buttons: [
                                {
                                    extend: 'excelHtml5',
                                    title: tittle + '-' + today
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: tittle + '-' + today
                                }
                                ,'pageLength'
                        ]
                    });
        </script>


		<script>
	                 let tittle = "<?php if(empty($tittle)){ echo 'Wajasiriamali'; }else{echo $tittle;} ?>";
					 let today = new Date().toISOString().slice(0, 10);
                    $('#member').DataTable({
                        responsive: true,
                        pageLength: 10,
                        dom: 'Bfrtip',
                        lengthMenu: [
                                        [ 10, 25, 50, -1 ],
                                        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                                    ],
                        buttons: [
                                {
                                    extend: 'excelHtml5',
                                    title: tittle + '-' + today
                                },
                                {
                                    extend: 'pdfHtml5',
                                    title: tittle + '-' + today
                                }
                                ,'pageLength'
                        ]
                    });
        </script>

</body>
</html>