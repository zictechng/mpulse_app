{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
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
	<meta property="og:title" content="Mobile Voucher System | Reset Password" />
	<meta property="og:description" content="Do you have coupon code, voucher, discount card or promo code? Don't worry, load it and cash the money out instally" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Mobile Voucher System : Reset Password</title>

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

                                    <h4 class="text-center mb-4">Reset account password</h4>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email Address</strong></label>
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="hello@example.com">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                         <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>I remeber password <a class="text-primary" href="{{ route('login') }}">Sign In</a> <font style="float: right"><a class="text-primary" href="/"> Back Home</a></font></p>
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