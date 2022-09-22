
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
    <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Taarifa za Mwanachama</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mwanachama</li>
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
                                            <div class="wideget-user-img">
                                            <a href="#" data-toggle="modal" data-target="#memberPhoto">
                                               <img class="media-object thumbnail mr-3" src="data:image/gif;base64, {!! $members[0]->userPhoto !!}" alt="" style="height:150px; width:150px;">
                                                {{--  <img style="height:150px;" class="" src="{{ asset('assets/images/members/member.gif') }}" alt="img">  --}}
                                            </a>
                                            </div>
                                            <div class="user-wrap">
                                                <h4>{{ $members[0]->firstName}} {{ $members[0]->middleName}} {{ $members[0]->lastName}}</h4>
                                                <h6 class="text-muted mb-3">Chama: {{ $members[0]->shirikishoName}}</h6>
                                                <h6 class="text-muted mb-3">Kikundi: {{ $members[0]->kikundiName}}</h6>
                                                <h6 class="text-muted mb-3">Cheo: Mwanachama {{ $members[0]->memberRank}}</h6>
                                                
                                                <h6 class="text-muted mb-3">Namba ya Mwanachama: {{ $members[0]->membershipCode}}</h6>

                                            
                                                <h6 class="text-muted mb-3">Saini:<a href="#" data-toggle="modal" data-target="#memberSignature"> <img src="data:image/gif;base64, {!! $members[0]->memberSignature !!}" alt="" style="height:60px;"></a></h6>
                                                {{-- <a href="#" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Fuatilia</a>
                                                <a href="#" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i> Barua pepe</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <div class="wideget-user-info">
                                            <div class="wideget-user-warap">
                                            @if(in_array('fedha-malipo-mwanachama' ,permissions()))
                                                <div class="wideget-user-warap-l">
                                                    <h4 class="text-info">21,000 (Tsh)</h4>
                                                    <p>Jumla ya Malipo</p>
                                                </div>
                                                @endif
                                                @if(in_array('fedha-mikopo-mwanachama' ,permissions()))
                                                <div class="wideget-user-warap-r">
                                                    <h4 class="text-danger">200,000 (Tsh)</h4>
                                                    <p>Jumla Mkopo</p>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#taarifa-mwanachama" class="active show" data-toggle="tab">Taarifa za Mwanachama</a></li>
                                            <li><a href="#taarifa-bihashara" data-toggle="tab" class="">Taarifa za Biashara</a></li>
                                            <li><a href="#taarifa-makazi" data-toggle="tab" class="">Taarifa za Makazi</a></li>
                                            @if(in_array('fedha-malipo-mwanachama' ,permissions()))
                                            <li><a href="#malipo" data-toggle="tab" class="">Taarifa za Malipo</a></li>
                                            @endif
                                            @if(in_array('fedha-mikopo-mwanachama' ,permissions()))
                                            <li><a href="#taarifa-mkopo" data-toggle="tab" class="">Taarifa za Mikopo</a></li>
                                            @endif
                                        </ul>
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
                                            
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless table table-striped  text-nowrap w-100">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <td><h5><b>Namba ya Mwanachama :</b></h5></td>
                                                            <td>{{ $members[0]->membershipCode}}</td>
                                                        </tr>    
                                                        <tr>
                                                            <td><h5><b>Jina Kamili :</b></h5></td>
                                                            <td>{{ $members[0]->firstName}} {{ $members[0]->middleName}} {{ $members[0]->lastName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Jinsi :</b></h5></td>
                                                            <td>{{ $members[0]->sex}}</td>
                                                        </tr>

                                                        
                                                        <tr>
                                                            <td><h5><b>Hali ya Kimwili :</b></h5></td>
                                                            <td>Sina Ulemavu</td>
                                                            {{--  <td>{{ $members[0]->disabilityStatus}}</td>  --}}
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Elimu :</b></h5></td>
                                                            <td>{{ $members[0]->educationLevel}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya NIDA :</b></h5></td>
                                                            <td>{{ $members[0]->nidaNumber}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b></h5> 
                                                            <td>
                                                                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nidamodal">Tazama Kitambulisho cha NIDA</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya Simu :</b></h5></td>
                                                            <td>{{ $members[0]->phoneNumber}}</td>
                                                        </tr>
                                                        
                                                        
                                                        
                                                    </tbody>
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        
                                                    <tr>
                                                            <td><h5><b>Jina la mtu wa karibu :</b></h5></td>
                                                            <td>Mussa Ally</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya mtu wa karibu :</b></h5></td>
                                                            <td>0712789456</td>
                                                        </tr>
                                                        
                                                        
                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="taarifa-bihashara">

                                        <div id="profile-log-switch">
                                            
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless table table-striped  text-nowrap w-100">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <td><h5><b>Aina ya Biashara :</b></h5></td>
                                                            <td>{{ $members[0]->businessType}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya kizimba:</b></h5></td>
                                                            <td>{{ $members[0]->kizimba}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Soko / Eneo:</b></h5></td>
                                                            <td>{{ $members[0]->soko}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Kata :</b></h5></td>
                                                            <td>{{ $members[0]->BusinessWardName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Cheo :</b></h5></td>
                                                            <td>{{ $members[0]->memberRank}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Wilaya :</b></h5></td>
                                                            <td>{{ $members[0]->BusinessDistrictName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Mkoa :</b></h5></td>
                                                            <td>{{ $members[0]->BusinessRegionName}}</td>
                                                        </tr>
                                                        
                                                        
                                                    </tbody>
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <td><h5><b>Taarifa za kikundi</b></h5></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya Mwanachama :</b></h5></td>
                                                            <td>{{ $members[0]->membershipCode}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Jina la kikundi :</b></h5></td>
                                                            <td>{{ $members[0]->kikundiName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Jina la Chama :</b></h5></td>
                                                            <td>{{ $members[0]->shirikishoName}}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><h5><b>Taarifa za Mdhamini</b></h5></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Jina La kiongozi :</b></h5></td>
                                                            <td>Samwel Mayenga</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Namba ya Simu ya Kiongozi :</b></h5></td>
                                                            <td>0712458765</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Cheo cha Kiongozi:</b></h5></td>
                                                            <td>Mwenyekiti</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="tab-pane" id="taarifa-makazi">

                                        <div id="profile-log-switch">
                                            
                                            <div class="table-responsive ">
                                                <table class="table row table-borderless table table-striped  text-nowrap w-100">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
														
                                                        <th><b>Makazi ya Sasa</b></th>
                                                        
                                                        <tr>
                                                            <td><h5><b>Mkoa :</b></h5></td>
                                                            <td>{{ $members[0]->memberResidenceregionName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Wilaya :</b></h5></td>
                                                            <td>{{ $members[0]->memberResidencedistrictName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Kata :</b></h5></td>
                                                            <td>{{ $members[0]->memberResidenceWardName}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Barua ya Serikali za mitaa :</h5></td> 
                                                            <td>
                                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Tazama Barua ya Serikali ya mtaa</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        
														
                                                        <tr>
                                                            <td><h5><b>Makazi ya Kuzaliwa</b></h5></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Mkoa :</b></h5></td>
                                                            <td>Dar Es Salaam</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Wilaya :</b></h5></td>
                                                            <td>Kinondoni</td>
                                                        </tr>
                                                        <tr>
                                                            <td><h5><b>Kata :</b></h5></td>
                                                            <td>Kinondoni</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="tab-pane" id="malipo">

                                        <div id="profile-log-switch">
                                            
                                            <div class="table-responsive ">
                                                
                                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p">#</th>
                                                        <th class="wd-15p">Aina ya Malipo</th>
                                                        <th class="wd-15p">Kiwango</th>
                                                        <th class="wd-15p">Hali</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($members[0]->paymentDetails as $paymentDetail)
                                                    <tr>
                                                        <td>{{ $loop->iteration}}</td>
                                                        <td>{{ $paymentDetail->paymentName}}</td>
                                                        <td>{{ $paymentDetail->paymentAmount}}</td>
                                                        <td>
                                                         @if($paymentDetail->paidStatus == '1')   
                                                          <i class="fa fa-check mr-1 text-success"></i>Amelipa
                                                         @elseif($paymentDetail->paidStatus == '0') 
                                                          <i class="fa fa-check mr-1 text-danger"></i>Hajalipa
                                                          @else

                                                         @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                                                        
                                                </tbody>
                                            </table>


                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="tab-pane" id="taarifa-mkopo">

                                        <div id="profile-log-switch">
                                            
                                            <div class="table-responsive ">

                                                
                                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p">#</th>
                                                        <th class="wd-15p">Taasisi</th>
                                                        <th class="wd-15p">Aina ya Mkopo</th>
                                                        <th class="wd-15p">Mkopo(Tsh)</th>
                                                        <th class="wd-15p">Malipo(Tsh)</th>
                                                        <th class="wd-15p">Deni(Tsh)</th>
                                                        <th class="wd-15p">Hali</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Mkopo wa Halmashauri</td>
                                                        <td>Vijana</td>
                                                        <td>1,000,000</td>
                                                        <td>600,000</td>
                                                        <td>400,000</td>
                                                        <td><i class="fa fa-exclamation-triangle text-danger"></i> Anadaiwa</td>
                                                    </tr>
                                                                                        
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

    <!-- Member Photo MODAL -->
    <div class="modal fade" id="memberSignature" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <img src="data:image/gif;base64, {!! $members[0]->memberSignature !!}" alt="" style="height:450px; padding-left: 70px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Funga</button>
                </div>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->

    <!-- Member Photo MODAL -->
    <div class="modal fade" id="memberPhoto" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <img src="data:image/gif;base64, {!! $members[0]->userPhoto !!}" alt="" style="height:450px; padding-left: 70px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Funga</button>
                </div>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->


    <!-- Barua ya Serikali za mitaa MODAL -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <img src="https://merudc.go.tz/storage/app/media/uploaded-files/IMG-20180829-WA0007.jpg" alt="" style="height:450px; padding-left: 70px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Funga</button>
                </div>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->

    <!-- NIDA MODAL -->
    <div class="modal fade" id="nidamodal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <img src="https://2.bp.blogspot.com/-ZHih7xj-q9o/V9ZU8o8XCAI/AAAAAAAJA1g/7RThg9bqsJAFMazsmOabALaGuP3WrFzjgCLcB/s640/Tanzania_CITIZEN_.jpg" alt="" style="height:250px; padding-left: 10px;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Funga</button>
                </div>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->

@endsection

