
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
    <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Orodha ya Wanachama</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ripoti</li>
                    </ol>
                </div>

            </div>

                
            @include('partial.flash_error')

            
            <div class="card">
                <div class="card-body">
                    {{--  <div class="card-header" style="background-color: #eee;">
                        <h3 class="well">Members List</h3>
                    </div>  --}}
                        
                    <!-- ROW-1 OPEN -->
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card  img-card box-primary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format($counts) }}</h2>
                                            <p class="text-black mb-0">JUMLA YA WANACHAMA </p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-users text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card img-card box-secondary-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format($countFemale) }}</h2>
                                            <p class="text-black mb-0">WANAWAKE</p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-female text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card img-card box-success-shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format($countMale) }}</h2>
                                            <p class="text-black mb-0">WANAUME</p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-male text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>
                    <!-- ROW-1 CLOSED -->

                    <br>
                    @include('members.search_form')

                </div>
            </div>
            
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        {{--  <div class="card-header">
                            <h3 class="card-title">Members List</h3>

                        </div>  --}}
                        

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">#</th>
                                            <th class="wd-15p">NAMBA YA MWANACHAMA</th>
                                            <th class="wd-15p">JINA KAMILI</th>
                                            <th class="wd-15p">NAMBA YA SIMU </th>
                                            <th class="wd-15p">JINSIA</th>
                                            <th class="wd-15p">KIKUNDI</th>
                                            <th class="wd-15p">VYAMA</th>
                                            <th class="wd-15p">KATA</th>
                                            <th class="wd-15p">WILAYA</th>
                                            <th class="wd-15p">MKOA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member['membershipCode'] }}</td>
                                            <td>{{ $member['firstName'] }} {{ $member['middleName'] }} {{ $member['lastName'] }}</td>
                                            <td>{{ $member['phoneNumber'] }}</td>
                                            <td>
                                                @if($member['sex'] == 'M')
                                                Me
                                                @else
                                                Ke
                                                @endif
                                            </td>
                                            <td>{{ $member['kikundiName'] }}</td>
                                            <td>{{ $member['shirikishoName'] }}</td>
                                            <td>{{ $member['memberWardName'] }}</td>
                                            <td>{{ $member['districtName'] }}</td>
                                            <td>{{ $member['regionName'] }}</td>
                                        </tr>
                                        @endforeach
                                                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- TABLE WRAPPER -->
                    </div>
                    <!-- SECTION WRAPPER -->
                </div>
            </div>
            <!-- ROW-1 CLOSED -->


        </div>
    </div>
    <!-- CONTAINER CLOSED -->

    <!-- MESSAGE MODAL -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3">Add Vikundi Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/members/store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Vikundi Name:</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->

@endsection


    
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>  

<script type="text/javascript">
    function getDistrictById(){
        let regionId = document.getElementById('region').value;
        $("#district").html('');
        $.ajax({
            type: 'get',
            url: '{!!URL::to('get_district')!!}'+ '/' + regionId,
            success: function(data){
                        $("#district").append('<option value="">Chagua Wilaya</option>');
                        for(let i=0; i<data.length; i++){
                            let code  =  data;
                            $("#district").append('<option value='+code[i].districtId+'>'+code[i].districtName+'</option>');
                        }
            },
            error: function(){
                console.log('failed');
            }
        });
    }
</script>

<script type="text/javascript">
    function getWardById(){
        let regionId = document.getElementById('district').value;
        $("#ward").html('');
        $.ajax({
            type: 'get',
            url: '{!!URL::to('get_ward')!!}'+ '/' + regionId,
            success: function(data){
                        $("#ward").append('<option value="">Chagua Kata</option>');
                        for(let i=0; i<data.length; i++){

                            let code  =  data;
                            $("#ward").append('<option value='+code[i].wardId+'>'+code[i].wardName+'</option>');
                        }
            },
            error: function(){
                console.log('failed');
            }
        });
    }
</script>

<script type="text/javascript">
    function getKikundiById(){
        let shirikishoId = document.getElementById('shirikishoId').value;
        $("#kikundiId").html('');
        $.ajax({
            type: 'get',
            url: '{!!URL::to('get_kikundi')!!}'+ '/' + shirikishoId,
            success: function(data){
                console.log(data);
                        $("#kikundiId").append('<option value="">Chagua Kikundi</option>');
                        for(let i=0; i<data.length; i++){

                            let code  =  data;
                            $("#kikundiId").append('<option value='+code[i].kikundiId+'>'+code[i].kikundiName+'</option>');
                        }
            },
            error: function(){
                console.log('failed');
            }
        });
    }
</script>

