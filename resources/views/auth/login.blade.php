<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Wajasiliamali Wadogo  - Portal">
		<meta name="author" content="National Internet Data Center(NIDC)">
		<meta name="keywords" content="wajasiliamali, tanzania, bihashara, wizara, N-Card, nidc">
		
		<!-- CSRF Token -->
		<meta name="_token" content="{{ csrf_token() }}">

        <!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ngao.png') }}" />

		<!-- TITLE -->
		<title>Wajasiliamali Wadogo  - Portal</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet"/>
		<link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet"/>

		<!--C3 CHARTS CSS -->
		<link href="{{ asset('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet"/>

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet"/>

        <link href="{{ asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">

        <!-- SIDE-MENU CSS -->
        <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

        <!-- SWITCHER SKIN CSS -->
		<link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">

		<style>
			@media only screen and (min-width: 600px) {
				.loginPad {
					padding-right: 170px;
				}
			  }

		</style>


</head>

    <body class="login-img" >

		

        		<!-- BACKGROUND-IMAGE -->
		<div class="login-img" style="background-position: center;  background-repeat: no-repeat;  background-size: cover;background-image: url('{{ asset('assets/images/logo/login.png')}}')">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page float-right loginPad">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-8">
							<form action="{{url('/login')}}" enctype="multipart/form-data" method="post" autocomplete="off" class="login100-form validate-form">
								{{csrf_field()}}

								@include('partial.flash_error')
								
								<div class="text-center">
									<h3>INGIA</h3>
									{{--  <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-brand-img" alt="logo" style="height: 70px;">  --}}
								</div>

								<br>
								<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
									<input class="input100" type="text" name="username" placeholder="Jina la mtumiaji">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password" placeholder="Nywila">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>
								{{-- <div class="text-right pt-1">
									<p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">Umesahau Nywila?</a></p>
								</div> --}}
								<div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn btn-primary">Ingia</button>
									
								</div>
								{{-- <div class="text-center pt-3">
									<p class="text-dark mb-0">Si mwanachama?<a href="register-2.html" class="text-primary ml-1">Jisajili Sasa</a></p>
								</div> --}}
								
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="{{ asset('assets/plugins/circle-progress/circle-progress.min.js') }}"></script>

		<!-- C3.JS CHART JS -->
		<script src="{{ asset('assets/plugins/charts-c3/d3.v5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/charts-c3/c3-chart.js') }}"></script>

		<!-- INPUT MASK JS-->
		<script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

		<!-- SIDE-MENU JS-->
		<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>

        
		<!--CUSTOM JS -->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Color Change JS -->
        <script src="{{ asset('assets/js/color-change.js') }}"></script>

        <!-- SWITCHER JS -->
		<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>


    </body>

</html>
