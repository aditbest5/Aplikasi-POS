<!-- Favicons-->
<link rel="shortcut icon" href="{{ asset('assets/img/logo-fav-icon.png') }}" type="image/x-icon" />
<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/logo-fav-icon.png') }}" />

<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

<link href="{{ asset('assets/dashboard/layouts/modern-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/layouts/modern-light-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/dashboard/layouts/modern-light-menu/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{ asset('assets/dashboard/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/layouts/modern-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/layouts/modern-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/src/assets/css/light/elements/alert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/src/assets/css/dark/elements/alert.css') }}">
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
 <link href="{{asset('/assets/dashboard/src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
 <link href="{{asset('/assets/dashboard/src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('/assets/dashboard/src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
 <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

 <!-- BEGIN PAGE LEVEL STYLES -->
 <link rel="stylesheet" type="text/css" href="{{asset('/assets/dashboard/src/plugins/src/table/datatable/datatables.css')}}">

 <link rel="stylesheet" type="text/css" href="{{asset('/assets/dashboard/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('/assets/dashboard/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
 <link href='https://fonts.googleapis.com/css?family=Libre Barcode 128' rel='stylesheet'>

 @stack('link-style')
 <!-- END PAGE LEVEL STYLES -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 {{-- <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script> --}}
<style>
    body.dark .layout-px-spacing, .layout-px-spacing {
        min-height: calc(100vh - 155px) !important;
    }
    body table tbody td h2 {
            font-family: 'Libre Barcode 128';
            font-size: 4em;
        }
</style>

@stack('css')
