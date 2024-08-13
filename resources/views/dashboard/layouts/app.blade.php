<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Dashboard Koperasi RKI" />
    <meta name="author" content="RKIAPP" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Dashboard - RKI</title>
    <style>
        .form-stock {
            text-align: center;
            padding: 0.5em;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .form-stock:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .product-card {
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card:hover .card-title {
            white-space: normal;
            overflow: visible;
            text-overflow: clip;
        }
        @media print {
                            #receipt {
                                width: 80mm;
                                font-size: small;
                                text-align: left;
                            }
                            #receipt h3, #receipt p, #receipt table, #receipt th, #receipt td {
                                font-size: small;
                                margin: 0;
                                padding: 0;
                            }

                            #receipt th, #receipt td {
                                padding: 5px;
                                text-align: left;
                            }

                            #receipt hr {
                                border: 1px dashed black;
                            }

                            #receipt .header, #receipt .footer {
                                text-align: center;
                            }

                            #receipt .header h3, #receipt .footer p {
                                margin: 5px 0;
                            }

                            #receipt .section {
                                margin-bottom: 10px;
                            }
                        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

    @include('dashboard.layouts.partials.head')
</head>

<body class="layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        @include('dashboard.layouts.partials.navbar')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('dashboard.layouts.partials.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <!-- CONTENT AREA -->
                    @yield('content')
                    <!-- CONTENT AREA -->
                </div>
            </div>

            @include('dashboard.layouts.partials.footer')
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    @include('dashboard.layouts.partials.foot')
</body>

</html>
