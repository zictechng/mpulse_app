{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="mobile money, gift card, voucher, discount card, promo card" />
	<meta name="author" content="Mobile Voucher System" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Cash your coupon code, voucher, Discount Card and Gift Cards in Real Time" />
	<meta property="og:title" content="Mobile Voucher System | Very Email Address" />
	<meta property="og:description" content="Do you have coupon code, voucher, discount card or promo code? Don't worry, load it and cash the money out instally" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Mobile Voucher System : Verify Email</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('/master/images/favicon.png')}}" />
    <link href="{{ asset('./master/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                   <div class="text-center mb-3">
										<a href="/"><img src="{{ asset('./master/images/logo-full.png')}}" alt="logo"></a>
									</div>

                                    <h4 class="text-center mb-4">Verify Email Address</h4>
                                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                        @endif
                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Click here to request another</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p><font style="float: right"><a class="text-primary" href="/"> Back Home</a></font></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('./master/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('./master/js/custom.min.js')}}"></script>
    <script src="{{asset('./master/js/dlabnav-init.js')}}"></script>

</body>
</html>
