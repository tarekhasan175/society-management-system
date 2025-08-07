<!doctype html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

    <title>nagorik</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/custom_css/login.css') }}"/>


    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}"/>
    <!-- Scripts -->
    <script src="https://idp-v2.live.mygov.bd/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://idp-v2.live.mygov.bd/css/login.css" rel="stylesheet">
    <link href="https://idp-v2.live.mygov.bd/css/app.css" rel="stylesheet">
    <link href="https://idp-v2.live.mygov.bd/css/mygov-widgets.css" rel="stylesheet">

    <style>
        /* Style the modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 9999; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Centered */
            padding: 20px;
            border: 1px solid #888;
            width: 35%;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #d30000;
            text-decoration: none;
            cursor: pointer;
        }

        #otpInput1 {
            width: 40px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            text-align: center;
            font-size: 18px; /* Adjust the font size as needed */
            letter-spacing: 10px; /* Adjust the letter spacing as needed */
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        }
        #otpInput2 {
            width: 40px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            text-align: center;
            font-size: 18px; /* Adjust the font size as needed */
            letter-spacing: 10px; /* Adjust the letter spacing as needed */
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        }
        #otpInput3 {
            width: 40px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            text-align: center;
            font-size: 18px; /* Adjust the font size as needed */
            letter-spacing: 10px; /* Adjust the letter spacing as needed */
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        }
        #otpInput4 {
            width: 40px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            text-align: center;
            font-size: 18px; /* Adjust the font size as needed */
            letter-spacing: 10px; /* Adjust the letter spacing as needed */
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        }
        #resentButton {
            margin-top: 10px;
        }
        #verifyButton {
            margin-top: 10px;
        }

        @keyframes  shake {
            0% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }

        body.shake {
            animation: shake 0.5s;
        }



    </style>


</head>

<body style="overflow-x: hidden">

@php
    $company = \App\Models\Company::first();
 @endphp
<div id="app">
    <div class="row text-center">
        <div class="col-md-4">
{{--            <div class="main_logo d-none d-md-block" >--}}
            <div class="d-none d-md-block align-left" >
                <a href=""><img title="digital bangladesh" class="logo" src="{{ asset('digital_bangladesh.png') }}" alt="digital bangladesh" style="height: auto ; width: 200px !important; margin-top: 50px; margin-left: 10px;"></a>
            </div>
        </div>
        <div class="col-md-4">
           <div style="margin-top: 50px ; font-size: 26px; font-weight:bolder"> {{ __('language.Civil-Service') }}</div>
           <div style="margin-top: 5px ; font-size: 20px; font-weight:bolder">{{$company->name}}</div>
        </div>
        <div class="col-md-4 "  style="text-align: end ; padding-right: 40px ; padding-top: 10px" >
            <div class=" " >
                <a href=""><img title="BD GOV" class="logo" src="{{ asset('uploads/company/' . $company->logo) }}" style="height: 80px ; width: 80px; margin-top: 50px; margin-left: 10px;"></a>
            </div>
        </div>
    </div>

    <main class="py-0">

        <div class="cdap_inner py-0 height-auto">

{{--            <div class="main_logo d-none d-md-block" >--}}
{{--                <a href=""><img title="BD GOV" class="logo" src="{{ asset('CC_logo.png') }}" style="height: 80px ; width: 80px"></a>--}}
{{--            </div>--}}
            {{-- <br> --}}
            <div class="">
                <div id="my-form">
                    <div class="reg_inner">
                        <div class="form" >
                            <div class="reg_inner_cont">
                                <h4 class="header blue lighter bigger text-center">
                                    <i class="ace-icon fa fa-sign-in green"></i>
                                   {{ __('language.regi_info') }}
                                </h4>

                                <div class="space-6"></div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 text-md-right">{{ __('language.R_Name') }}</label>

                                        <div class="col-md-7">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <span id="email_validation" style="color: red"></span>
                                        <label for="email"
                                               class="col-md-4 text-md-right">{{ __('language.r_email') }}</label>

                                        <div class="col-md-7">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <span id="phone_validation" style="color: red"></span>
                                        <label for="phone"
                                               class="col-md-4 text-md-right">{{ __('language.r_phone') }}</label>

                                        <div class="col-md-7">
                                            <input id="phone" type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone" value="{{ old('phone') }}" required
                                                   autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 text-md-right">{{ __('language.r_password') }}</label>

                                        <div class="col-md-7">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 text-md-right">  {{ __('language.r_con_password') }}</label>

                                        <div class="col-md-7">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-7 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="font-size: 14px!important;">
                                                <i class="ace-icon fa fa-save icon-on-right"></i>
                                                {{ __('language.r_regi') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <br>
                                <div class="help_login">
                                    <div tabindex="0" style="font-size: 14px" aria-label="নাগরিক সেবা একাউন্ট করেছেন? Go to Registration" class="text-center mt-4 mygov_acc"><small>  {{ __('language.regi_response') }} <a aria-label="Don't have myGov account? Go to Registration" href="{{route('login')}}">  {{ __('language.do_login') }}</a></small> </div>

                                    <div class="social-or-login center">
                                        <span class="bigger-110">
                                            &copy;
                                        </span>
                                    </div>

{{--                                    <div class="text-center" style="margin-top: 10px;">--}}
{{--                                        <strong class="grey"> Smart Software Ltd</strong>--}}
{{--                                    </div>--}}

                                </div>


                            </div>
                        </div>


                    </div>


                </div>
            </div>



        </div>


    </main>
</div>


<footer class="container-fluid p-0">
    <div class="bg-white pt-3 pb-3 h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-start mb-3 mb-sm-0">
                    <div class="col d-flex h-100 text-sm-center d-flex justify-content-center">
                        <div class="text-center h-100" style="font-size: 14px">
                            <div>   {{ __('language.Copyright') }} &copy;{{date('Y')}}  {{ __('language.al_right') }} </div>
                            <div>{{$company->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 mb-3 mb-sm-0">
                </div>
                <div class="col-md-3 col-sm-4 text-sm-center">
                    <div
                        class="row d-flex h-100 justify-content-center justify-content-lg-end justify-content-md-end justify-content-sm-center align-self-sm-center justify-content-xs-center">
                        <div class="col-5 col-md-5 col-sm-5 d-flex justify-content-center align-self-center justify-content-sm-center align-self-sm-center text-sm-center" style="font-size: 14px">
                            {{ __('language.Developed-By') }}


                        </div>
                        <div class="col-7 col-md-7 col-sm-7 d-flex justify-content-start align-self-center ps-0" style="font-size: 14px">
                            <a href="https://www.smartsoftware.com.bd/" style="text-decoration: none" target="_blank">
                                <span> {{ __('language.Smart-Software-Ltd') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-4 mb-1 mb-sm-0 ">

                  <span style="justify-items: center ; margin-top: 5px" class="d-flex justify-content-center align-self-center justify-content-sm-center align-self-sm-center text-sm-center">

        <span class="light-10" title="Change Language">
                    @if(app()->getLocale() === 'en')
                <a href="{{ route('lang.switch', 'bn') }}"  style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;" class="btn btn-info">বাংলা</a>
            @else
                <a href="{{ route('lang.switch', 'en') }}" style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;" class="btn btn-primary">English</a>
            @endif
          </span>

                  </span>
                </div>
            </div>
        </div>
    </div>
</footer>


<div id="myModal" class="modal">
<div class="modal-content">
    <span class="close align-right">&times;</span>
    <div align="center">
        <h2>Enter OTP</h2>
        <span class="bolder" id="otpCheckMessage"></span>
        <table>
            <tbody>
            <tr>
                <td class="text-center">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                    <dotlottie-player src="https://lottie.host/2e3bbec3-4edb-40f6-b844-d930021836c1/GdcrrCCAs1.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></dotlottie-player>
                </td>
                <td class="text-center">
                    <input type="text" id="otpInput1" oninput="ValidatePassKey1()" maxlength="1">
                    <input type="text" id="otpInput2" oninput="ValidatePassKey2()" maxlength="1">
                    <input type="text" id="otpInput3" oninput="ValidatePassKey3()" maxlength="1">
                    <input type="text" id="otpInput4" oninput="ValidatePassKey4()" maxlength="1">
                </td>
            </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" id="verifyButton" onclick="phoneOTPCheck()">Verify OTP</button>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
<script src="https://idp-v2.live.mygov.bd/js/application.js"></script>

<script src="https://idp-v2.live.mygov.bd/js/mygov-widgets.js"></script>
<script>
    $('.datepicker-gijgo').datepicker({
        showOtherMonths: true,
        format: 'dd-mm-yyyy'
    });
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });

    document.onkeydown = function (e) {
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
<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
</script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script>
    // Get the modal and button elements
    var modal = document.getElementById('myModal');
    var btn = document.getElementById('openModalBtn');
    var closeBtn = document.getElementsByClassName('close')[0];
    btn.onclick = function() {
        modal.style.display = 'block';
    };
    closeBtn.onclick = function() {
        modal.style.display = 'none';
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
</script>

<script>
    function showModal() {
        $('#myModal').show();
    }

    $(document).ready(function() {

        $('form').on('submit', function(e) {
            e.preventDefault();
            document.getElementById('email_validation').innerText = '';
            document.getElementById('phone_validation').innerText = '';


            validation();



            var formData = $(this).serialize();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    // Handle the response after successful form submission
                    var closeBtn2 = document.getElementsByClassName('close')[0];
                    closeBtn2.onclick = function() {
                        modal.style.display = 'none';
                    };
                    showModal();

                    // Update the DOM or show a message indicating successful registration
                    // For example, you can display a success message on the same page
                    $('#successMessage').text('User created successfully!');
                    // Reset the form fields if needed
                    $('#myForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Handle errors if any during form submission
                    console.error(xhr.responseText);
                }
            });

        });
    });
</script>

<script>
    function phoneOTPCheck() {
        let phone = document.getElementById('phone').value;
        let otpInput1 = document.getElementById('otpInput1').value;
        let otpInput2 = document.getElementById('otpInput2').value;
        let otpInput3 = document.getElementById('otpInput3').value;
        let otpInput4 = document.getElementById('otpInput4').value;
        let otp = otpInput1+otpInput2+otpInput3+otpInput4;
        let errorStatus = document.getElementById('otpCheckMessage');
        let url = "/phone_otp_check";
        let data = {
            Phone: phone,
            OTP: otp,
        };
        axios.post(url, data)
            .then(function (response) {
                if (response.data === 1){
                    errorStatus.innerHTML = '<span class="text-success">Success OTP Verification.</span>';
                    window.location.href = '/login?registration=success';
                }
                else {
                    errorStatus.innerHTML = '<span class="text-danger">Wrong OTP!</span>';
                    document.body.classList.add("shake");
                    setTimeout(function() {
                        document.body.classList.remove("shake");
                    }, 500);
                }
            })
            .catch(function (error) {
                //
            })
    }

    function ValidatePassKey1() {
        document.getElementById('otpInput2').focus();
    }
    function ValidatePassKey2() {
        document.getElementById('otpInput3').focus();
    }
    function ValidatePassKey3() {
        document.getElementById('otpInput4').focus();
    }
    function ValidatePassKey4() {
        phoneOTPCheck();
    }
</script>

<script>
    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password-confirm").value;

        if (password !== confirmPassword) {
            document.getElementById("password-confirm").setCustomValidity("Passwords do not match");
        } else {
            document.getElementById("password-confirm").setCustomValidity('');
        }
    }

    // Attach the checkPasswordMatch function to the input events of both password fields
    document.getElementById("password").addEventListener("input", checkPasswordMatch);
    document.getElementById("password-confirm").addEventListener("input", checkPasswordMatch);
</script>

<script>
    function validatePhoneNumber() {
        var phoneNumber = document.getElementById("phone").value;

        // Remove any non-digit characters from the phone number
        phoneNumber = phoneNumber.replace(/\D/g, '');

        if (phoneNumber.length !== 11) {
            document.getElementById("phone").setCustomValidity("Phone number must be 11 digits");
        } else {
            document.getElementById("phone").setCustomValidity('');
        }
    }

    // Attach the validatePhoneNumber function to the input event of the phone number field
    document.getElementById("phone").addEventListener("input", validatePhoneNumber);
</script>

<script>
    function validation(){
        let url = "/validation_check";
        let data = {
            Email: document.getElementById('email').value,
            Phone: document.getElementById('phone').value,
        };
        axios.post(url, data)
            .then(function (response) {
                if (response.data.email === 1){
                    document.getElementById('email_validation').innerText = "Email already registered";
                }
                if (response.data.phone === 1){
                    document.getElementById('phone_validation').innerText = "Phone already registered";
                }
            })
            .catch(function (error) {
                //
            })
    }
</script>


</body>

</html>



