<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Registrasi Anggota Koperasi" />
        <meta name="author" content="RKIAPP" />
        <title>Registrasi POS</title>

        @include('registrasi.layouts.partials.head')
    </head>

    <body class="style_2">
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div>
        <!-- /Preload -->

        <div id="loader_form">
            <div data-loader="circle-side-2"></div>
        </div>
        <!-- /loader_form -->

        <header>
            @include('registrasi.layouts.partials.header')
        </header>
        <!-- /header -->

        <div class="wrapper_centering">
            <div class="container_centering">
                @yield('content')
            </div>

            @include('registrasi.layouts.partials.footer')
        </div>

        @include('registrasi.layouts.partials.foot')
    </body>
</html>
