
@extends('layout.master')
 
@section('content')
     <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Soko</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Soko</li>
                    </ol>
                </div>
                @include('layout.notification')
            </div>

                
     @include('partial.flash_error')
            
     <!-- ROW-1 OPEN -->
     <div class="row">
         <div class="col-md-12 col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Soko</h3>

                     <div class="d-flex  ml-auto header-right-icons header-search-icon">
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Ongeza Soko</button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                             <thead>
                                 <tr>
                                     <th class="wd-15p">#</th>
                                     <th class="wd-15p">Jina La Soko</th>
                                     <th class="wd-15p">Aina ya Soko</th>
                                     <th class="wd-15p">Kata</th>
                                     <th class="wd-15p">Wilaya</th>
                                     <th class="wd-15p">Mkoa</th>
                                     <th class="wd-20p"></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($masoko as $soko)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $soko['sokoName'] }}</td>
                                     <td>
                                      @if($soko['sokoType'] == '1')
                                         Soko
                                      @else
                                        Eneo
                                     @endif
                                     
                                     </td>
                                     <td>{{ $soko['wardName'] }}</td>
                                     <td>{{ $soko['districtName'] }}</td>
                                     <td>{{ $soko['regionName'] }}</td>
                                     <td>
                                         <button type="button" class="btn btn-icon  btn-primary">
                                             <a href="{{ url('/masoko/view', $soko['sokoId']) }}" style="color:white;"><i class="fe fe-eye"></i>
                                         </button>

                                         <button type="button" class="btn btn-icon  btn-info">
                                             <a href="{{ url('/masoko/edit', $soko['sokoId']) }}" style="color:white;"><i class="fe fe-edit"></i>
                                         </button>

                                         <button type="button" class="btn btn-icon  btn-danger">
                                             <a href="{{ url('/masoko/delete', $soko['sokoId']) }}" style="color:white;"><i class="fe fe-delete"></i>
                                         </button>
             
                                         
                                     </td>
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
                    <h5 class="modal-title" id="example-Modal3">Ongeza Soko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/masoko/store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}

                        

                        <div class="row">

                            <div class="form-group col-md-6 col-lg-6">
                                <label for="recipient-name" class="form-control-label">Jina la Soko:</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label for="recipient-name" class="form-control-label">Aina ya Soko:</label>
                                
                                <select required class="form-control mb-3" name="sokoType">
                                    <option disabled selected="">Chagua Aina ya Soko</option>
                                    <option value="1">Soko</option>
                                    <option value="2">Eneo</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="row">
                           <div class="form-group col-md-4 col-lg-4">
                            <label for="recipient-name" class="form-control-label">Mkoa*:</label>
                            
                            <select required class="form-control mb-3" name="region" id="region" onchange="getDistrictById()">
                                <option disabled selected="">Chagua Mkoa</option>
                                @foreach($regions as $region)
                                    <option value="{{$region['regionId']}}">{{$region['regionName']}}</option>
                                @endforeach
                            </select>
                           </div>

                           <div class="form-group col-md-4 col-lg-4">
                            <label for="recipient-name" class="form-control-label">Wilaya*:</label>
                            
                            <select required class="form-control mb-3" name="district" id="district" onchange="getWardById()">
                                <option disabled selected="">Chagua Wilaya</option>
                                
                            </select>
                           </div>

                           <div class="form-group col-md-4 col-lg-4">
                            <label for="recipient-name" class="form-control-label">Kata*:</label>
                            
                            <select required class="form-control mb-3" name="ward" id="ward">
                                <option disabled selected="">Chagua Kata</option>
                                
                            </select>
                           </div>

                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Funga</button>
                    <button type="submit" class="btn btn-primary">Wasilisha</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- MESSAGE MODAL CLOSED -->

@endsection

@section('footer_scripts')
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>

<script language="javascript" type="text/javascript" src="{{ asset('vendors/sifter/sifter.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/microplugin/microplugin.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/selectize/js/selectize.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
<script language="javascript" type="text/javascript"
        src="{{ asset('vendors/card/js/jquery.card.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('js/pages/custom_elements.js') }}"></script>

@stop

    
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
                        $("#ward").append('<option value="">Chagua Wilaya</option>');
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

