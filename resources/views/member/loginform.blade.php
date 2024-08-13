<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="description" content="Rumah Kesejahteraan Indonesia" />
        <meta name="author" content="RKIAPP" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="RKI , RKIAPP, Rumah Kesejahteraan Indonesia, Koperasi, Koperasi Indonesia">
        <meta name="author" content="Dev RKI">
        <title>Dahsboard - RKI</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ asset('assets/img/logo-fav-icon.png') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/logo-fav-icon.png') }}" />
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/logo-fav-icon.png') }}" />

        <!-- GOOGLE WEB FONT -->
        <link href="https://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- feather Awesome -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/feather/css/feather.css') }}">

        <!-- animation css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/animate.css/animate.css') }}">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/jquery.mCustomScrollbar.css') }}">

        <script type="text/javascript" src="{{ asset('assets/auth/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/auth/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </head>

    <body class="fix-menu">
        <section id="login_background" class="login-block auth-more">
            <!-- Container-fluid starts -->
            <div class="container">
                <div class="row style-padding">
                    <div class="col-md-12 text-left">
                        <img class="mb-5" width="20%" src="{{ asset('assets/img/logo-white-yellow.png') }}" alt="Logo">
                    </div>
                    <div class="col-12 col-md-6 text-left">
                        <h1 class="welcoming">Welcome!</h1>
                        <p class="description">The Employee Cooperative Information System is a specialized technological platform designed to assist in managing and facilitating the activities of a cooperative run by the employees of a company or organization. Its primary goal is to enhance the well-being and prosperity of cooperative members by providing various services and useful information.</p>
                    </div>
                    <div class="col-0 col-md-2"></div>
                    <div class="col-12 col-md-4">
                        <div class="text-right login">
                            Login to Member Account
                        </div>
                        <!-- Authentication card start -->
                        <form class="md-float-material form-material mt-3" name="frmLogin" id="frmLogin" method="POST" action="/member/dologin">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group formlogin mt-3">
                                <label for="username">Username</label><br>
                                <input type="text" name="username" id="username" onkeydown="rfEnter();" class="style-form-input" required="" maxlength="20" placeholder="Username" title="maximamal 20 character">
                            </div>

                            <div class="form-group formlogin mt-3">
                                <label for="password">Password</label><br>
                                <input type="password" name="password" id="password" class="style-form-input" required="" autocomplete="on" title="maximal 10 character" maxlength="20" placeholder="Password" onkeydown="fnEnter();">
                            </div>

                            <button class="btnlogin" type="submit">Log In</button>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>
    </body>
</html>
