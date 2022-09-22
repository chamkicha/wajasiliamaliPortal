
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
    <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <h3 class="card-title">Users List</h3>

                            <div class="d-flex  ml-auto header-right-icons header-search-icon">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add Users</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">#</th>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-15p">email</th>
                                            <th class="wd-15p">phone_no</th>
                                            <th class="wd-15p">Role</th>
                                            <th class="wd-20p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['phoneNumber'] }}</td>
                                            <td>{{ $user['role'] }}</td>
                                            <td>
                                                <button type="button" class="btn btn-icon  btn-primary">
                                                    <a href="{{ url('/users/view', $user['userId']) }}" style="color:white;"><i class="fe fe-eye"></i>
                                                </button>
       
                                                <button type="button" class="btn btn-icon  btn-info">
                                                    <a href="{{ url('/users/edit', $user['userId']) }}" style="color:white;"><i class="fe fe-edit"></i>
                                                </button>
       
                                                <button type="button" class="btn btn-icon  btn-danger">
                                                    <a href="{{ url('/users/delete', $user['userId']) }}" style="color:white;"><i class="fe fe-delete"></i>
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
                    <h5 class="modal-title" id="example-Modal3">Add Vikundi Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/users/store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                           <div class="form-group col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Name*:</label>
                                    <input required name="name" type="text" class="form-control" id="name">
                                </div>
                            </div>

                           <div class="form-group col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Email*:</label>
                                    <input required name="email" type="email" class="form-control" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           <div class="form-group col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Phone Number*:</label>
                                    <input required name="phno" type="text" class="form-control" id="phno">
                                </div>
                            </div>

                           <div class="form-group col-md-6 col-lg-6">

                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Password*:</label>
                                    <input required name="password" type="password" class="form-control" id="password">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                           <div class="form-group col-md-12 col-lg-12">
                            <label for="recipient-name" class="form-control-label">Role*:</label>
                            
                            <select required class="form-control mb-3" name="role" id="role" >
                                <option disabled selected="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role['roleId']}}">{{$role['roleName']}}</option>
                                @endforeach
                            </select>
                           </div>

                        </div>

                        <div class="form-group" style="display:none">
                            <label for="shirikisho-name" class="form-control-label">Shirikisho Name*:</label>

                            
                            <select required class="form-control mb-3" name="shirikishoId" >
                                <option disabled selected="">Select Shirikisho</option>
                                @foreach($shirikishos as $shirikisho)
                                    <option value="{{$shirikisho['shirikishoId']}}">{{$shirikisho['shirikishoName']}}</option>
                                @endforeach
                            </select>

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
                        $("#district").append('<option value="">Select District</option>');
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
                        $("#ward").append('<option value="">Select District</option>');
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
