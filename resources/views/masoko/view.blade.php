
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
    <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Taarifa za Soko</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Masoko</li>
                    </ol>
                </div>

                @include('layout.notification')
            </div>

                
            @include('partial.flash_error')
            


            <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="wideget-user-desc d-sm-flex">
                                            
                                            <div class="user-wrap">
                                                <h6 class="text-muted mb-3">Jina La Soko: {{ $masoko['sokoName']}}</h6>
                                                <h6 class="text-muted mb-3">Kata: {{ $masoko['wardName']}}</h6>
                                                <h6 class="text-muted mb-3">Wilaya: {{ $masoko['districtName']}}</h6>
                                                <h6 class="text-muted mb-3">Mkoa: {{ $masoko['regionName']}}</h6>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="wideget-user-info">
                                            <div class="wideget-user-warap">
                                                <div class="wideget-user-warap-l">
                                                    <h4 class="text-info">{{$masoko['kizimbaCount']}}</h4>
                                                    <p>Jumla ya Wanachama</p>
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="taarifa-mwanachama">
                                        <div id="profile-log-switch">
                                            
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">#</th>
                                                            <th class="wd-15p">Jina La Kizimba</th>
                                                            <th class="wd-15p">Hali</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($kizimbas as $kizimba)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $kizimba['kizimbaName'] }}</td>
                                                            <td>{{ $kizimba['kizimbaName'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                                                            
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->


        </div>
    </div>
    <!-- CONTAINER CLOSED -->




@endsection

