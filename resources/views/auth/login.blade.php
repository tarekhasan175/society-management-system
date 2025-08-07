<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{{ request()->routeIs('password-reset.verify-token') ? 'Reset Password' : 'Account' }}
        - {{ config('app.name') }}</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" />
    <script src="https://idp-v2.live.mygov.bd/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://idp-v2.live.mygov.bd/css/login.css" rel="stylesheet">
    <link href="https://idp-v2.live.mygov.bd/css/app.css" rel="stylesheet">
    <link href="https://idp-v2.live.mygov.bd/css/mygov-widgets.css" rel="stylesheet">


</head>


@php
    $intended_string = 'url-' . session()->get('url.intended');
    $employee_base = 'url-' . url('/em');
    $settings = App\Models\SystemSetting::where('key', 'employee_login_option')->first();
    $company = \App\Models\Company::first();
@endphp

<body class="login-layout light-login" style="overflow-x: hidden">
    {{--        <div class="main-container"> --}}
    {{--            <div class="main-content"> --}}
    {{--                <div class="row"> --}}
    {{--                    <div class="col-sm-10 col-sm-offset-1"> --}}
    {{--                        <div class="login-container"> --}}
    <div class="row text-center">
        <div class="col-md-4">
            <div class="d-none d-md-block align-left">
                {{-- <a href=""><img title="digital bangladesh" class="logo" src="{{ asset('digital_bangladesh.png') }}" alt="digital bangladesh" style="height: auto ; width: 200px !important; margin-top: 50px; margin-left: 10px;"></a> --}}
            </div>
        </div>
        <div class="col-md-4">

            <div class="" style="margin-top: 25px;">
                <a href=""><img title="BD GOV" class="logo"
                        src="{{ asset('uploads/company/' . @$company->logo) }}" style="height: 80px ; width: 80px"></a>
            </div>
            <div style="margin-top: 0px ; font-size: 26px; font-weight:bolder">{{ $company->name }}</div>
            {{-- <div style="margin-top: 5px ; font-size: 20px; font-weight:bolder">{{$company->name}}</div> --}}

        </div>
        <div class="col-md-4 " style="text-align: end ; padding-right: 40px ; padding-top: 50px">

            <div class=" ">

            </div>
        </div>
    </div>
    <div class="cdap_inner py-0 height-auto">

        {{--    <div class="main_logo d-none d-md-block"> --}}
        {{--        <a href=""><img title="BD GOV" class="logo" src="{{ asset('CC_logo.png') }}"></a>  --}}
        {{--    </div> --}}
        <div id="">
            <div class="reg_inner">
                <div class="form">
                    <div class="reg_inner_cont">


                        <div class="space-6"></div>


                        <div class="position-relative">

                            @if (request()->routeIs('password-reset.verify-token'))
                                <div id="signup-box" class="signup-box widget-box no-border visible">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header green lighter bigger">
                                                <i class="ace-icon fa fa-users blue"></i>
                                                Reset Your Password
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Enter your password: </p>

                                            <form action="{{ route('password-reset.update-password') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="email" value="{{ request('email') }}">
                                                <input type="hidden" name="token" value="{{ request('token') }}">
                                                <fieldset>
                                                    <label cl ass="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control"
                                                                placeholder="Password" name="password" />
                                                            <i class="ace-icon fa fa-lock"></i>

                                                            @error('password')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control"
                                                                placeholder="Repeat password"
                                                                name="password_confirmation" />
                                                            <i class="ace-icon fa fa-retweet"></i>

                                                            @error('password_confirmation')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </label>

                                                    <div class="space-10"></div>

                                                    <div class="clearfix">
                                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                                            <i class="ace-icon fa fa-refresh"></i>
                                                            <span class="bigger-110">Reset</span>
                                                        </button>

                                                        <button type="submit"
                                                            class="width-65 pull-right btn btn-sm btn-success">
                                                            <span class="bigger-110">Submit</span>

                                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger text-center">
                                                <i class="ace-icon fa fa-sign-in green"></i>
                                                {{ __('language.login_information') }}
                                            </h4>

                                            <div class="space-6"></div>

                                            <form action="" method="post">

                                                @if (session()->get('error'))
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert">
                                                            <i class="ace-icon fa fa-times"></i>
                                                        </button>
                                                        {{ session()->get('error') }}
                                                    </div>
                                                @endif

                                                @if (request()->query('registration') === 'success')
                                                    <div class="alert alert-info">
                                                        <button type="button" class="close" data-dismiss="alert">
                                                            <i class="ace-icon fa fa-times"></i>
                                                        </button>
                                                        <!-- Your error message -->
                                                        {{ __('language.registration_successful') }}
                                                    </div>
                                                @endif


                                                @csrf

                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">

                                                            @if (session()->get('massage'))

                                                                <div class="alert alert-{{ session()->get('type') }}">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="alert">
                                                                        <i class="ace-icon fa fa-times"></i>
                                                                    </button>

                                                                    <strong>
                                                                        @if (session()->get('type') == 'danger')
                                                                            <i class="ace-icon fa fa-times"></i>
                                                                            Error !
                                                                        @else
                                                                            <i
                                                                                class="ace-icon fa fa-check-circle-o"></i>
                                                                            Success !
                                                                        @endif
                                                                    </strong>

                                                                    {{ session()->get('massage') }}
                                                                    <br />
                                                                </div>

                                                            @endif

                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="hidden" name="employee_full_id"
                                                                class="employee_full_id"
                                                                value="{{ old('employee_full_id') }}">
                                                            <input id="email" type="text"
                                                                class="form-control input-email @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}"
                                                                autocomplete="email" placeholder="Email" autofocus>
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                            @error('email')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" placeholder="Password"
                                                                autocomplete="current-password">
                                                            <i class="ace-icon fa fa-lock"></i>
                                                            @error('password')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    @if (optional($settings)->value == 1)
                                                        <div class="clearfix">
                                                            <div class="control-group">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input name="form-field-radio"
                                                                            onclick="goToEmployeeLogin()"
                                                                            {{ strpos($intended_string, $employee_base) !== false ? 'checked' : '' }}
                                                                            type="radio" class="ace">
                                                                        <span class="lbl"> Employee Login</span>
                                                                    </label>

                                                                    <label>
                                                                        <input name="form-field-radio"
                                                                            onclick="gotoHrLogin()"
                                                                            {{ strpos($intended_string, $employee_base) !== false ? '' : 'checked' }}
                                                                            type="radio" class="ace">
                                                                        <span class="lbl"> Admin Login</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"> {{ __('language.remember_me') }}
                                                            </span>
                                                        </label>

                                                        <button type="submit"
                                                            class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110"
                                                                style="font-size: 12px!important;">
                                                                {{ __('language.login') }} </span>
                                                        </button>
                                                    </div>
                                                    <div class="space-4"></div>
                                                    {{-- <div tabindex="0" style="font-size: 14px" aria-label="নাগরিক সেবা একাউন্ট নেই? Go to Registration" class="text-center mt-4 mygov_acc"><small> {{ __('language.do_not_account') }}  <a aria-label="Don't have myGov account? Go to Registration" href="{{route('register')}}">  {{ __('language.do_registration') }} </a></small> </div> --}}

                                                    <div class="social-or-login center">
                                                        <span class="bigger-110">
                                                            &copy;
                                                        </span>
                                                    </div>

                                                    {{--                                                <div class="text-center" style="margin-top: 10px;"> --}}
                                                    {{--                                                    <strong class="grey"> Smart Software Ltd</strong> --}}
                                                    {{--                                                </div> --}}


                                                </fieldset>

                                            </form>

                                            <br>

                                            <div class="space-6"></div>


                                        </div>


                                        {{-- <div class="toolbar clearfix">
                                        <div style="width: 100%">
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link " style="text-decoration: none" >
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                &nbsp; {{ __('language.forget_link') }}
                                            </a>
                                        </div>
                                    </div> --}}


                                    </div>
                                </div>

                                <div id="forgot-box" class="forgot-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header red lighter bigger">
                                                <i class="ace-icon fa fa-key"></i>
                                                {{ __('language.retrieve_password') }}
                                            </h4>

                                            <div class="space-6"></div>
                                            <p>
                                                {{ __('language.enter_your_mail_address') }}
                                            </p>

                                            <form action="{{ route('password-reset.send-email') }}" method="post">
                                                @csrf
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" name="email" />
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button type="submit"
                                                            class="width-35 pull-right btn btn-sm btn-danger">
                                                            <i class="ace-icon fa fa-lightbulb-o"></i>
                                                            <span class="bigger-110">
                                                                {{ __('language.send_me') }}</span>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="toolbar center">
                                            <a href="#" data-target="#login-box" class="back-to-login-link"
                                                style="text-decoration: none">
                                                {{ __('language.back_login') }}
                                                <i class="ace-icon fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div id="signup-box" class="signup-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header green lighter bigger">
                                                <i class="ace-icon fa fa-users blue"></i>
                                                New User Registration
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Enter your details to begin: </p>

                                            <form>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" />
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control"
                                                                placeholder="Username" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control"
                                                                placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control"
                                                                placeholder="Repeat password" />
                                                            <i class="ace-icon fa fa-retweet"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl">
                                                            I accept the
                                                            <a href="#">User Agreement</a>
                                                        </span>
                                                    </label>

                                                    <div class="space-24"></div>

                                                    <div class="clearfix">
                                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                                            <i class="ace-icon fa fa-refresh"></i>
                                                            <span class="bigger-110">Reset</span>
                                                        </button>

                                                        <button type="button"
                                                            class="width-65 pull-right btn btn-sm btn-success">
                                                            <span class="bigger-110">Register</span>

                                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="container-fluid p-0">
        <div class="bg-white pt-3 pb-3 h-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-start mb-3 mb-sm-0">
                        <div class="col d-flex h-100 text-sm-center d-flex justify-content-center">
                            <div class="text-center h-100" style="font-size: 14px">
                                <div> {{ __('language.Copyright') }} &copy;{{ date('Y') }}
                                    {{ __('language.al_right') }} </div>
                                <div>{{ $company->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb-3 mb-sm-0">
                    </div>
                    <div class="col-md-3 col-sm-4 text-sm-center">
                        <div
                            class="row d-flex h-100 justify-content-center justify-content-lg-end justify-content-md-end justify-content-sm-center align-self-sm-center justify-content-xs-center">
                            <div class="col-5 col-md-5 col-sm-5 d-flex justify-content-center align-self-center justify-content-sm-center align-self-sm-center text-sm-center"
                                style="font-size: 14px">
                                {{ __('language.Developed-By') }}


                            </div>
                            <div class="col-7 col-md-7 col-sm-7 d-flex justify-content-start align-self-center ps-0"
                                style="font-size: 14px">
                                <a href="https://www.smartsoftware.com.bd/" style="text-decoration: none"
                                    target="_blank">
                                    <span> {{ __('language.Smart-Software-Ltd') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-4 mb-1 mb-sm-0 ">

                        <span style="justify-items: center ; margin-top: 5px"
                            class="d-flex justify-content-center align-self-center justify-content-sm-center align-self-sm-center text-sm-center">

                            <span class="light-10" title="Change Language">
                                @if (app()->getLocale() === 'en')
                                    <a href="{{ route('lang.switch', 'bn') }}"
                                        style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;"
                                        class="btn btn-info">বাংলা</a>
                                @else
                                    <a href="{{ route('lang.switch', 'en') }}"
                                        style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;"
                                        class="btn btn-primary">English</a>
                                @endif
                            </span>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--[if !IE]> -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"
        integrity="sha512-lOrm9FgT1LKOJRUXF3tp6QaMorJftUjowOWiDcG5GFZ/q7ukof19V0HKx/GWzXCdt9zYju3/KhBNdCLzK8b90Q=="
        crossorigin="anonymous"></script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible'); //hide others
                $(target).addClass('visible'); //show target
            });
        });


        $(document).ready(function() {
            $('.employee_full_id').val($('.input-email').val())
        })

        $('.input-email').keyup(function() {
            $('.employee_full_id').val($('.input-email').val())
        })


        function goToEmployeeLogin() {
            window.location = '/em'
        }

        function gotoHrLogin() {
            window.location = '/home'
        }

        //you don't need this, just used for changing background
        jQuery(function($) {
            $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');

                e.preventDefault();
            });

            @if (session()->get('message'))
                new Noty({
                    theme: 'metroui',
                    type: 'success',
                    text: '{{ session()->get('message') }}'
                }).show();
            @elseif (session()->get('error'))
                new Noty({
                    theme: 'metroui',
                    type: 'error',
                    text: '{{ session()->get('error') }}'
                }).show();
            @endif
        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://idp-v2.live.mygov.bd/js/application.js"></script>

    <script src="https://idp-v2.live.mygov.bd/js/mygov-widgets.js"></script>
    <script>
        $('.datepicker-gijgo').datepicker({
            showOtherMonths: true,
            format: 'dd-mm-yyyy'
        });
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }
    </script>

</body>

</html>
