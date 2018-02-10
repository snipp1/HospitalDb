<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

    <link type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="{{asset('assets/fonts/themify-icons/themify-icons.css')}}" rel="stylesheet">              <!-- Themify Icons -->
    <!-- Core CSS with all styles -->

    <link type="text/css" href="{{asset('assets/plugins/codeprettifier/prettify.css')}}" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="{{asset('assets/plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="{{asset('assets/plugins/form-multiselect/css/multi-select.css')}}" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="{{asset('assets/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}" rel="stylesheet">
    <!--[if lt IE 10]>
    <script type="text/javascript" src="{{asset('assets/js/media.match.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/respond.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/placeholder.min.js')}}"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->
    <link type="text/css" href="{{asset('assets/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/plugins/datatables/dataTables.themify.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet"> 						<!-- FullCalendar -->
    <link type="text/css" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"> 			<!-- jVectorMap -->
    <link type="text/css" href="{{asset('assets/plugins/pines-notify/pnotify.css')}}" rel="stylesheet"> 			<!-- jVectorMap -->
    <link type="text/css" href="{{asset('assets/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/plugins/gridforms/gridforms/gridforms.css')}}" rel="stylesheet">

    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
    <link type="text/css" href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <!-- Switchery -->
    @stack('stylesheet')
</head>

<body class="animated-content">

@include('includes.header')

<div id="wrapper">
    <div id="layout-static">
        @include('includes.sidebar')
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @stack('breadcramps')

                    <div class="container-fluid">


                        @yield('contents')

                    </div> <!-- .container-fluid -->
                </div> <!-- #page-content -->
            </div>

            @include('includes.footer')
        </div>
    </div>
</div>


<!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="{{asset('assets/js/jqueryui-1.10.3.min.js')}}"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script> 								<!-- Load Bootstrap -->
<script type="text/javascript" src="{{asset('assets/js/enquire.min.js')}}"></script> 									<!-- Load Enquire -->

<script type="text/javascript" src="{{asset('assets/plugins/velocityjs/velocity.min.js')}}"></script>					<!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="{{asset('assets/plugins/velocityjs/velocity.ui.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/plugins/wijets/wijets.js')}}"></script>     						<!-- Wijet -->

<script type="text/javascript" src="{{asset('assets/plugins/codeprettifier/prettify.js')}}"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>     					<!-- iCheck -->

<script type="text/javascript" src="{{asset('assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script> <!-- nano scroller -->

<script type="text/javascript" src="{{asset('assets/js/application.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/demo/demo.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/demo/demo-switcher.js')}}"></script>--}}

<!-- End loading site level scripts -->

<!-- Load page level scripts-->

<!-- Charts -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.min.js')}}"></script>             	<!-- Flot Main File -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.pie.min.js')}}"></script>             <!-- Flot Pie Chart Plugin -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.stack.min.js')}}"></script>       	<!-- Flot Stacked Charts Plugin -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.orderBars.min.js')}}"></script>   	<!-- Flot Ordered Bars Plugin-->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.resize.min.js')}}"></script>          <!-- Flot Responsive -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.tooltip.min.js')}}"></script> 		<!-- Flot Tooltips -->
<script type="text/javascript" src="{{asset('assets/plugins/charts-flot/jquery.flot.spline.js')}}"></script> 				<!-- Flot Curved Lines -->

<script type="text/javascript" src="{{asset('assets/plugins/sparklines/jquery.sparklines.min.js')}}"></script> 			 <!-- Sparkline -->

<script type="text/javascript" src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>       <!-- jVectorMap -->
<script type="text/javascript" src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>   <!-- jVectorMap -->

<script type="text/javascript" src="{{asset('assets/plugins/switchery/switchery.js')}}"></script>     					<!-- Switchery -->
<script type="text/javascript" src="{{asset('assets/plugins/easypiechart/jquery.easypiechart.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/fullcalendar/moment.min.js')}}"></script> 		 			<!-- Moment.js Dependency -->
<script type="text/javascript" src="{{asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>   			<!-- Calendar Plugin -->
<script type="text/javascript" src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootbox/bootbox.js')}}"></script>
<script src="{{asset('assets/plugins/form-multiselect/js/jquery.multi-select.min.js')}}"></script>
<script src="{{asset('assets/plugins/form-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('assets/plugins/quicksearch/jquery.quicksearch.min.js')}}"></script>
<script src="{{asset('assets/plugins/pines-notify/pnotify.min.js')}}"></script>
<script src="{{asset('assets/plugins/gridforms/gridforms/gridforms.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/demo/demo-index.js')}}"></script> 									<!-- Initialize scripts for this page-->--}}
@stack('scripts')
<!-- End loading page level scripts-->
@if(session()->has('pine-msg'))
    <script>
        new PNotify({
            title: '{!! session("pine-msg")["pine_title"] !!}',
            text: '{!! session("pine-msg")["pine_body"] !!}',
            type: '{!! session("pine-msg")["pine_type"] !!}',
            icon: '{!! session("pine-msg")["pine_icon"] !!}',
            styling: 'fontawesome'
        });
    </script>


@endif
</body>
</html>