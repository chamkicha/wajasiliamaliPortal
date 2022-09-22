@extends('layout.master')
 
@section('content')



        <!-- PAGE -->


                <div class="app-content">
                    <div class="side-app">
                        <div class="page-header">

                            <!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Dashibodi</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashibodi</li>
								</ol>
							</div>
						   <!-- PAGE-HEADER END -->


                        </div>

                        @include('partial.flash_error')
                            
						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card box-primary-shadow">
									<div class="card-body">
						             <a href="{{ url('/members') }}">
										<div class="d-flex">
											<div class="text-black">
												<h2 class="mb-0 number-font">{{ number_format($members)}}</h2>
												<p class="text-black mb-0">WANACHAMA </p>
											</div>
											<div class="ml-auto"> <i class="fa fa-user text-black fs-30 mr-2 mt-2"></i> </div>
										</div>
							         </a>
									</div>
								</div>
							</div><!-- COL END -->

							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card img-card box-secondary-shadow">
									<div class="card-body">
						             <a href="{{ url('/Vikundi') }}">
										<div class="d-flex">
											<div class="text-black">
												<h2 class="mb-0 number-font">{{ number_format($groups) }}</h2>
												<p class="text-black mb-0">VIKUNDI</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-users text-black fs-30 mr-2 mt-2"></i> </div>
										</div>
									  </a>
									</div>
								</div>
							</div><!-- COL END -->

							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card img-card box-success-shadow">
									<div class="card-body">
						             <a href="{{ url('/Shirikisho') }}">
										<div class="d-flex">
											<div class="text-black">
												<h2 class="mb-0 number-font">{{ number_format($shirikishos) }}</h2>
												<p class="text-black mb-0">VYAMA</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-building text-black fs-30 mr-2 mt-2"></i> </div>
										</div>
									  </a>
									</div>
								</div>
							</div><!-- COL END -->

							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card img-card box-info-shadow">
									<div class="card-body">
						             <a href="{{ url('/masoko') }}">
										<div class="d-flex">
											<div class="text-black">
												<h2 class="mb-0 number-font">{{ number_format($masoko) }}</h2>
												<p class="text-black mb-0">MASOKO</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-shopping-cart text-black fs-30 mr-2 mt-2"></i> </div>
										</div>
									  </a>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- ROW-1 CLOSED -->


                        <br>
                        <br>
                        <!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Wajasiriamali Vs Mikoa</h3>
									</div>
									<div class="card-body">
										<div id="nvd3-chart1" class="h-400"> <svg></svg></div>
									</div>
								</div>
							</div>
						</div>
						<!-- ROW-1 CLOSED -->
{{--  						
							<div>
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Idadi ya Mikoa</h3>
									</div>
									<div class="card-body">
										<div id="echart1" class="chart-donut chart-dropshadow"></div>
										<div class="mt-4">
											<span class="ml-5"><span class="dot-label bg-info mr-2"></span>Sales</span>
											<span class="ml-5"><span class="dot-label bg-secondary mr-2"></span>Profit</span>
											<span class="ml-5"><span class="dot-label bg-success mr-2"></span>Growth</span>
										</div>
									</div>
								</div>
							</div><!-- COL END -->  --}}


					</div>
				</div>
				<!-- CONTAINER CLOSED -->






@endsection
