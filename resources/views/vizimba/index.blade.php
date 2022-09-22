
@extends('layout.master')
 
@section('content')
     <!-- PAGE -->
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">

                <div>
                    <h1 class="page-title">Vizimba/Maeneo</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Nyumbani</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vizimba</li>
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
                     <h3 class="card-title">Vizimba/Maeneo</h3>

                     <div class="d-flex  ml-auto header-right-icons header-search-icon">
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Ongeza Kizimba</button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                             <thead>
                                 <tr>
                                     <th class="wd-15p">#</th>
                                     <th class="wd-15p">Jina</th>
                                     <th class="wd-15p">Soko</th>
                                     <th class="wd-20p"></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($vizimba as $kizimba)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $kizimba['kizimbaName'] }}</td>
                                     <td>{{ $kizimba['sokoName'] }}</td>
                                     <td>
                                         <button type="button" class="btn btn-icon  btn-primary">
                                             <a href="{{ url('/vizimba/view', $kizimba['kizimbaId']) }}" style="color:white;"><i class="fe fe-eye"></i>
                                         </button>

                                         <button type="button" class="btn btn-icon  btn-info">
                                             <a href="{{ url('/vizimba/edit', $kizimba['kizimbaId']) }}" style="color:white;"><i class="fe fe-edit"></i>
                                         </button>

                                         <button type="button" class="btn btn-icon  btn-danger">
                                             <a href="{{ url('/vizimba/delete', $kizimba['kizimbaId']) }}" style="color:white;"><i class="fe fe-delete"></i>
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
                    <h5 class="modal-title" id="example-Modal3">Ongeza Kizimba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/vizimba/store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Jina la Kizimba/Eneo:</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="shirikisho-name" class="form-control-label">Jina la Soko*:</label>
                            
                            <select required class="form-control mb-3" name="sokoId" id="sokoId">
                                <option disabled selected="">Chagua Soko</option>
                                @foreach($masoko as $soko)
                                    <option value="{{$soko['sokoId']}}">{{$soko['sokoName']}}</option>
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

