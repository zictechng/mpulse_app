<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Cash your voucher code, discount card, gift card, promo code in real time and much more..." />
	<meta property="og:title" content="Dompet : Cash your voucher code, discount card, gift card, promo code in real time and much more..." />
	<meta property="og:description" content="Dompet : Cash your voucher code, discount card, gift card, promo code in real time and much more..." />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Mobile Voucher : Cash your voucher code, discount card, gift card, promo code in real time and much more...</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="/master/images/favicon.png" />
    <link href="{{ asset('./master/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{ asset('./master/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('./master/vendor/nouislider/nouislider.min.css')}}">
	<!-- Style css -->
    <link href="{{ asset('./master/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('./sass/app.scss') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- this help to check if user logged and then set the detail to be able to
         get it in vue component -->
        @if (Auth::check())
         <meta name="user" content="{{ Auth::user()}}" />
        @endif

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div class="main-wrapper" id="app">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/dashboard" class="brand-logo">
                <img class="brand-logo-dark" src="{{ asset('./master/images/logo-full.png') }}" alt="" width="180" height="50"/>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->

		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <page-name></page-name>

                        @if (Auth::check())
                        <meta name="user_id" content="{{ Auth::user()->id }}" />
                        @endif
                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                   <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12.638 4.9936V2.3C12.638 1.5824 13.2484 1 14.0006 1C14.7513 1 15.3631 1.5824 15.3631 2.3V4.9936C17.3879 5.2718 19.2805 6.1688 20.7438 7.565C22.5329 9.2719 23.5384 11.5872 23.5384 14V18.8932L24.6408 20.9966C25.1681 22.0041 25.1122 23.2001 24.4909 24.1582C23.8709 25.1163 22.774 25.7 21.5941 25.7H15.3631C15.3631 26.4176 14.7513 27 14.0006 27C13.2484 27 12.638 26.4176 12.638 25.7H6.40705C5.22571 25.7 4.12888 25.1163 3.50892 24.1582C2.88759 23.2001 2.83172 22.0041 3.36039 20.9966L4.46268 18.8932V14C4.46268 11.5872 5.46691 9.2719 7.25594 7.565C8.72068 6.1688 10.6119 5.2718 12.638 4.9936ZM14.0006 7.5C12.1924 7.5 10.4607 8.1851 9.18259 9.4045C7.90452 10.6226 7.18779 12.2762 7.18779 14V19.2C7.18779 19.4015 7.13739 19.6004 7.04337 19.7811C7.04337 19.7811 6.43703 20.9381 5.79662 22.1588C5.69171 22.3603 5.70261 22.6008 5.82661 22.7919C5.9506 22.983 6.16996 23.1 6.40705 23.1H21.5941C21.8298 23.1 22.0492 22.983 22.1732 22.7919C22.2972 22.6008 22.3081 22.3603 22.2031 22.1588C21.5627 20.9381 20.9564 19.7811 20.9564 19.7811C20.8624 19.6004 20.8133 19.4015 20.8133 19.2V14C20.8133 12.2762 20.0953 10.6226 18.8172 9.4045C17.5391 8.1851 15.8073 7.5 14.0006 7.5Z" fill="#4f7086"/>
									</svg>
                                    <span class="badge light text-white bg-primary rounded-circle"></span>
                                </a>

                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link" href="#">
                                 <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M27 7.88883C27 5.18897 24.6717 3 21.8 3C17.4723 3 10.5277 3 6.2 3C3.3283 3 1 5.18897 1 7.88883V23.7776C1 24.2726 1.31721 24.7174 1.80211 24.9069C2.28831 25.0963 2.8473 24.9912 3.2191 24.6417C3.2191 24.6417 5.74629 22.2657 7.27769 20.8272C7.76519 20.3688 8.42561 20.1109 9.11591 20.1109H21.8C24.6717 20.1109 27 17.922 27 15.2221V7.88883ZM24.4 7.88883C24.4 6.53951 23.2365 5.44441 21.8 5.44441C17.4723 5.44441 10.5277 5.44441 6.2 5.44441C4.7648 5.44441 3.6 6.53951 3.6 7.88883V20.8272L5.4382 19.0989C6.4132 18.1823 7.73661 17.6665 9.11591 17.6665H21.8C23.2365 17.6665 24.4 16.5726 24.4 15.2221V7.88883ZM7.5 15.2221H17.9C18.6176 15.2221 19.2 14.6745 19.2 13.9999C19.2 13.3252 18.6176 12.7777 17.9 12.7777H7.5C6.7824 12.7777 6.2 13.3252 6.2 13.9999C6.2 14.6745 6.7824 15.2221 7.5 15.2221ZM7.5 10.3333H20.5C21.2176 10.3333 21.8 9.7857 21.8 9.11104C21.8 8.43638 21.2176 7.88883 20.5 7.88883H7.5C6.7824 7.88883 6.2 8.43638 6.2 9.11104C6.2 9.7857 6.7824 10.3333 7.5 10.3333Z" fill="#4f7086"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle"></span>
                                </a>
							</li>
                            <li class="nav-item">
								<a href="#" class="btn btn-primary d-sm-inline-block d-none">
                                    <span>Last Login: <?php echo date("l jS \of F Y") ?>
                                         | <i class="fa fa-clock"></i> <span id="showtime"></span>
                                </span>

                            </a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            @if (@Auth::user()->photo)
                            <img src="{{ asset('/master/images/profile')}}/{{ @Auth::user()->photo }}" width="20" alt="Image "/>
                            @else
                            <img src="{{ asset('/master/images/profile/avatar.png')}}" width="20" alt="Image "/>
                            @endif
							<div class="header-info ms-3">
								<span class="font-w600 ">{{ @Auth::user()->name }}</span>
								<small class="text-end font-w400">{{ @Auth::user()->email }}</small>
							</div>
						</a>
					</li>
                    <li><router-link to="/dashboard" class="has-arrow ai-icon" aria-expanded="false">
							<!--<i class="flaticon-025-dashboard"></i>-->
                            <i class="bi bi-speedometer"></i>
							<span class="nav-text">

                        Dashboard</span>
						</router-link>
                    </li>

                    <li>
                        <router-link to="/add-coupon" class="ai-icon">
                        <i class="bi bi-plus-circle"></i>
                        <span class="nav-text">Add Coupon</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/wallet" class="ai-icon">
                        <i class="bi bi-wallet"></i>
                        <span class="nav-text">Wallet</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/cash-out" exact class="ai-icon">
                        <i class="bi bi-cash-coin"></i>
                        <span class="nav-text">Cash Out</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/transfer-fund" exact class="ai-icon">
                        <i class="fa fa-exchange"></i>
                        <span class="nav-text">Transfer</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/history" exact class="ai-icon">
                        <i class="fa fa-history"></i>
                        <span class="nav-text">History</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/ticket" exact class="ai-icon">
                        <i class="bi bi-ticket"></i>
                        <span class="nav-text">Ticket</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="settings" exact class="ai-icon">
                        <i class="bi bi-sliders"></i>
                        <span class="nav-text">Setting</span>
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/profile" exact class="ai-icon">
                        <i class="fa fa-user-circle"></i>
                        <span class="nav-text">Profile</span>
                        </router-link>
                    </li>

                    <li><a href="{{ route('logout') }}" class="ai-icon"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                <p>
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="nav-text">Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>

                    </li>
                </ul>

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

            <router-view></router-view>
            </div>

        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">

            <div class="copyright">
                <p>Mobile Voucher System | Copyright © 2022 &amp; Developed by <a href="https://zictech-ng.com/" target="_blank">Zictech Technologies</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('master/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('master/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{ asset('master/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<!-- Apex Chart -->
    <script src="{{ asset('master/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{ asset('master/vendor/wnumb/wNumb.js')}}"></script>
	<script src="{{ asset('master/vendor/apexchart/apexchart.js')}}"></script>
    <script src="{{ asset('master/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('master/js/plugins-init/datatables.init.js')}}"></script>


	<!-- Dashboard 1 -->
	<script src="{{ asset('master/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{ asset('master/js/custom.min.js')}}"></script>
	<script src="{{ asset('master/js/dlabnav-init.js')}}"></script>
	<script src="{{ asset('master/js/demo.js')}}"></script>
    @auth
    <script>
        //window.user = @json(auth()->user());
        //this help to get/set user detail if user logged in and then be able to
         //get it in vue component (Vue 2x method)
        window.User = {!! json_encode(auth()->user()) !!}
        //localStorage.setItem('user',JSON.stringify( {!! json_encode(auth()->user()) !!}))

    </script>
    @endauth
     <script src="{{asset('./js/app.js')}}"></script>
     <script type="text/javascript">
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();

        var suffix = "AM";

        if (hours >= 12) {
            suffix = "PM";
            hours = hours - 12;
        }

        if (hours == 0) {
            hours = 12;
        }

        if (minutes < 10) {
            minutes = "0" + minutes;
        }
       const time = ("<b>" + hours + ":" + minutes + " " + suffix + "</b>");
       document.getElementById('showtime').innerHTML = time;

    </script>
</body>
</html>
