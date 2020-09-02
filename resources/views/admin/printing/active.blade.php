@extends('layouts.cerve_admin')
@section('title', 'Print On Demand Orders')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/fixedHeader.bootstrap4.css')}}">

@endsection
@section('content')
    @include('includes.print_menu')

    <section>
        <h2>Print on demand</h2>
        <div class="card">
            <div class="card-header">
                @if(Session::has('product_message'))
                    <p class="text-success">{{session('product_message')}}</p>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Printing Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($projects->count()>0)
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->user->name}}&nbsp;{{$project->user->lastname}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->brand->name}}</td>
                                    <td>{{$project->created_at->isoFormat('MMM Do YYYY')}}</td>
                                    <td>
                                        @if($project->status==0)
                                            {!!Form::open(['method'=>'PATCH', 'action'=>['AdminPrintOnDemandController@update', $project->id]])!!}
                                            {!! Form::hidden('status', 1) !!}
                                            <button type="submit" class="btn btn-danger">Process</button>
                                            {!!Form::close()!!}
                                        @elseif($project->status==2)
                                            <p class="text-success">Completed</p>
                                        @elseif($project->status==2)
                                            <p class="text-danger">Cancelled</p>
                                        @else
                                            <p class="text-success">Processing</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('printing.edit', $project->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
                                                <a class="dropdown-item" href="{{route('printing.show', $project->id)}}">View <i class="fa fa-bookmark ml-2" aria-hidden="true"></i></a>
                                                {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['AdminPrintOnDemandController@destroy', $project->id]])!!}
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
                            <th>Title</th>
                            <th>Printing Type</th>
                            <th>Date</th>
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
