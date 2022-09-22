
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
    <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Orodha ya Vikundi</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vikundi</li>
                    </ol>
                </div>
                @include('layout.notification')
            </div>

            
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
                                    <a href="{{ url('/members') }}">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format(count($groups)) }}</h2>
                                            <p class="text-black mb-0">JUMLA YA VIKUNDI </p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-users text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card img-card box-secondary-shadow">
                                <div class="card-body">
                                    <a href="{{ url('/Vikundi') }}">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format(count($groups)) }}</h2>
                                            <p class="text-black mb-0">WANAWAKE</p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-female text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="card img-card box-success-shadow">
                                <div class="card-body">
                                    <a href="{{ url('/Shirikisho') }}">
                                    <div class="d-flex">
                                        <div class="text-black">
                                            <h2 class="mb-0 number-font">{{ number_format(count($groups)) }}</h2>
                                            <p class="text-black mb-0">WANAUME</p>
                                        </div>
                                        <div class="ml-auto"> <i class="fa fa-male text-black fs-30 mr-2 mt-2"></i> </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>
                    <!-- ROW-1 CLOSED -->

                    <br>

                    <form action="{{url('/members/search')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}

                        

                        <div class="row">
                           <div class="form-group col-md-4 col-lg-3">
                            <label for="recipient-name" class="form-control-label">Mkoa*:</label>
                            
                            <select class="form-control mb-3" name="region" id="region" onchange="getDistrictById()">
                                <option disabled selected="">Chagua Mkoa</option>
                                @foreach($regions as $region)
                                    <option value="{{$region['regionId']}}">{{$region['regionName']}}</option>
                                @endforeach
                            </select>
                           </div>

                           <div class="form-group col-md-4 col-lg-3">
                            <label for="recipient-name" class="form-control-label">Wilaya*:</label>
                            
                            <select  class="form-control mb-3" name="district" id="district" onchange="getWardById()">
                                <option disabled selected="">Chagua Wilaya</option>
                                
                            </select>
                           </div>

                           <div class="form-group col-md-4 col-lg-3">
                            <label for="recipient-name" class="form-control-label">Kata*:</label>
                            
                            <select  class="form-control mb-3" name="ward" id="ward">
                                <option disabled selected="">Chagua Kata</option>
                                
                            </select>
                           </div>
                           

                            <div class="form-group col-md-4 col-lg-3">
                                <label for="shirikisho-name" class="form-control-label">Chama*:</label>
                                <select  class="form-control mb-3" name="shirikishoId" >
                                    <option disabled selected="">Chagua Chama</option>
                                    @foreach($shirikishos as $shirikisho)
                                        <option value="{{$shirikisho['shirikishoId']}}">{{$shirikisho['shirikishoName']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4 col-lg-3">
                                <button type="submit" class="btn btn-primary">Tafuta</button>
                            </div

                        </div>

                    </form>
                </div>
            </div>

                
            @include('partial.flash_error')
            
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orodha ya Vikundi</h3>

                            <div class="d-flex  ml-auto header-right-icons header-search-icon">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Ongeza Vikundi</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">#</th>
                                            <th class="wd-15p">Jina</th>
                                            <th class="wd-15p">Chama</th>
                                            <th class="wd-15p">Kata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($groups as $group)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $group['kikundiName'] }}</td>
                                            <td>{{ $group['shirikishoName'] }}</td>
                                            <td>{{ $group['wardName'] }}</td>
                                            
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
