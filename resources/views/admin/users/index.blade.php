@extends('layouts.cerve_admin')
@section('title','Cerve Accounts')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/fixedHeader.bootstrap4.css')}}">

@endsection
@section('content')
 <section>


         <div class="card">
             <div class="card-header">
                 <h5 class="mb-0">User Accounts <a href="{'{users.create'}}" class="float-right"> <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Add User</a> </h5>
                 @if(Session::has('deleted_user'))
                     <p class="text-success">{{session('deleted_user')}}</p>
                 @endif
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="example" class="table table-striped table-bordered second" style="width:100%">
                         <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Role</th>
                             <th>Since</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
                         @if($users->count()>0)
                             @foreach($users as $user)
                             <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}}&nbsp;{{$user->lastname}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>{{$user->role->name}}</td>
                                 <td>{{$user->created_at->isoFormat('D-M-Y')}}</td>
                                 <td>@if($user->is_active==1)
                                         <p class="text-success">Active</p>
                                         @else
                                         <p class="text-danger">In-active</p>
                                     @endif

                                 </td>
                                 <td>
                                     <div class="dropdown show">
                                         <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             Action
                                         </a>

                                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                             <a class="dropdown-item" href="{{route('users.edit', $user->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
                                             <a class="dropdown-item" href="{{route('users.show', $user->id)}}">View <i class="fa fa-bookmark ml-2" aria-hidden="true"></i></a>
                                             {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['UserAdminController@destroy', $user->id]])!!}
                                            <button type="submit" class="btn btn-block">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

                                             {!!Form::close()!!}
                                         </div>
                                     </div>
                                 </td>
                             </tr>
                             @endforeach
                             @else
                             <h2>There are no users in the database</h2>
                         @endif
                         </tbody>
                         <tfoot>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Role</th>
                             <th>Since</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                         </tfoot>
                     </table>
                 </div>
             </div>
         </div>
 </section>

@endsection




@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('datatables/js/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


@endsection
