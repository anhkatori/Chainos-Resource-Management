<!-- View/Admin/Layout/default.blade.php -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Title -->
    <title>Chainos | Chainos Solution JSC </title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="Chainos Solutions | Admin | Dashboard" />
    <meta name="keywords" content="Chainos Solutions | Admin | Dashboard" />
    <meta name="author" content="Chainos Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" address="<?= URL::to('/') ?>">
    <link rel="icon" href="{{asset('/favicon.ico')}}">

    <!-- Bootstrap -->
    <link href="{{asset('assets/css/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/css/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
{{--<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">-->--}}
{{--<!--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />-->--}}
    <link href="{{asset('assets/css/vendor/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/js/vendor/mmenu/css/jquery.mmenu.all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/vendor/bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/da_custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/page.css')}}" rel="stylesheet">
{{--    <link href="{{asset('assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css')}}" rel="stylesheet">--}}
{{--<!--    <link href="{{asset('assets/js/vendor/rickshaw/css/rickshaw.min.css')}}" rel="stylesheet">-->--}}
{{--    <link href="{{asset('assets/js/vendor/morris/css/morris.css')}}" rel="stylesheet">--}}
{{--<!--    <link href="{{asset('assets/js/vendor/tabdrop/css/tabdrop.css')}}" rel="stylesheet">-->--}}

{{--<!--    <link href="{{asset('assets/js/vendor/chosen/css/chosen.min.css')}}" rel="stylesheet">-->--}}
{{--<!--    <link href="{{asset('assets/js/vendor/chosen/css/chosen-bootstrap.css')}}" rel="stylesheet">-->--}}
    <link href="{{asset('assets/js/vendor/bootstrap-clockpicker/bootstrap-clockpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- fullCalendar -->
{{--    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/dist/fullcalendar.min.css')}}">--}}
{{--<!--    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">-->--}}
<!-- Toast -->
    <link rel="stylesheet" href="https://www.jqueryscript.net/demo/Toast-Notification-Bootstrap-jQuery-Bootoast/bootoast.css">
    <!--  Weather  -->
    {{-- <link href="{{asset('assets/css/vendor/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('assets/js/vendor/datepicker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/minimal.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
{{--    <!-- <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">-->--}}

    <!-- jQuery -->
    <script src="{{asset('assets/js/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="{{ asset('assets/js/chartjs/cost.js') }}"></script>
    <script src="{{asset('assets/js/multi-select.min.js')}}"></script>
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/css/multi-select/multi-select-menu.css')}}" rel="stylesheet">
    {{-- <script src="{{asset('assets/js/vendor/Chart.js/dist/Chart.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/SmartWizard.js')}}"></script>
    <script src="{{asset('assets/js/image_upload.js') }}" defer></script>
</head>

<body class="" style = "background-color: #F0F2F5; overflow: auto; scrollbar-width: thin;">

<!-- Wrap all page content here -->
<div id="wrap">
    <!-- Make page fluid -->
    <div class="row">

        <!-- Fixed navbar -->
    @include('element.sidebar')
    <!-- Fixed navbar end -->
        <!-- Page content -->
        <div id="content">
            <!-- content main container -->
            <div class="main">

                @if(session('error'))
                    <div class="alert alert-danger" style="margin-left: 18px; margin-bottom: 0px;">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success" style="margin-left: 18px; margin-bottom: 0px;">
                        {{session('success')}}
                    </div>
                @endif

                @yield('content')
            </div>
            <!-- /content container -->
        </div>
        <!-- Page content end -->
        {{-- @include('admin.element.mmenu') --}}
    </div>
    <!-- Make page fluid-->
</div>
<!-- Wrap all page content end -->
{{-- @include('admin.element.notifyModal') --}}
<script src="{{asset('assets/js/jquery.multi-select.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
<!--<script src="{{asset('assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js')}}"></script>-->

<script src="{{asset('assets/js/vendor/mmenu/js/jquery.mmenu.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/animate-numbers/jquery.animateNumbers.js')}}"></script>
<!--<script src="{{asset('assets/js/vendor/videobackground/jquery.videobackground.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/blockui/jquery.blockUI.js')}}"></script>-->

<!--<script src="{{asset('assets/js/vendor/flot/jquery.flot.min.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/flot/jquery.flot.time.min.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/flot/jquery.flot.selection.min.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/flot/jquery.flot.animator.min.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/flot/jquery.flot.orderBars.js')}}"></script>-->
<!--<script src="{{asset('assets/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>-->
<script src="{{asset('assets/js/vendor/bootstrap-clockpicker/bootstrap-clockpicker.js')}}"></script>
{{-- <script src="{{asset('assets/js/vendor/rickshaw/raphael-min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/vendor/rickshaw/d3.v2.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/vendor/rickshaw/rickshaw.min.js')}}"></script> --}}

<script src="{{asset('assets/js/vendor/momentjs/moment-with-langs.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/vendor/morris/morris.min.js')}}"></script> --}}

{{--<script src="{{asset('assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js')}}"></script>--}}

{{--<script src="{{asset('assets/js/vendor/chosen/chosen.jquery.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript" src="https://www.jqueryscript.net/demo/Toast-Notification-Bootstrap-jQuery-Bootoast/bootoast.js"></script>

<script src="{{asset('assets/js/minimal.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
{{-- <script src="{{asset('assets/js/weather.js')}}"></script> --}}
<!-- Socket IO -->
<script type="text/javascript" src="{{asset('js/socket.io.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('js/client.js')}}"></script> --}}

</body>
</html>
