
@extends('layout.master')
 
@section('content')
     @include('partial.flash_error')
     <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Aina ya Biashara</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Aina ya Biashara</li>
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
                        <h3 class="card-title">Orodha ya aina za Biashara</h3>

                        <div class="d-flex  ml-auto header-right-icons header-search-icon">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Ongeza aina ya Biashara</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Jina</th>
                                        <th class="wd-20p"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($BusinessTypes as $BusinessType)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $BusinessType['businessTypeName'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-icon  btn-primary">
                                                <a href="{{ url('/BusinessType/view', $BusinessType['businessTypeId']) }}" style="color:white;"><i class="fe fe-eye"></i>
                                            </button>
{{--  
                                            <button type="button" class="btn btn-icon  btn-info">
                                                <a href="{{ url('/BusinessType/edit', $BusinessType['businessTypeId']) }}" style="color:white;"><i class="fe fe-edit"></i>
                                            </button>  --}}

                                            <button type="button" class="btn btn-icon  btn-danger">
                                                <a href="{{ url('/BusinessType/delete', $BusinessType['businessTypeId']) }}" style="color:white;"><i class="fe fe-delete"></i>
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
                    <h5 class="modal-title" id="example-Modal3">Ongeza aina ya biashara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/BusinessType/store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Jina:</label>
                            <input name="name" type="text" class="form-control" id="name">
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

