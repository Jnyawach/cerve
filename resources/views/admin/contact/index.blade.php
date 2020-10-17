@extends('layouts.cerve_admin')
@section('title', 'Messages')
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
                <h5 class="mb-0">Enquiry List </h5>
                @if(Session::has('contact_message'))
                    <p class="text-success">{{session('contact_message')}}</p>
                @endif

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($contacts->count()>0)
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->created_at->isoFormat('D-M-Y')}}</td>
                                    <td>{{$contact->first_name}}&nbsp;{{$contact->last_name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->subject}}</td>

                                    <td>@if($contact->read==0)
                                            <p class="text-danger">unread</p>
                                        @else
                                            <p class="text-success">read</p>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="{{route('contact.show', $contact->slug)}}">Read <i class="fa fa-bookmark ml-2" aria-hidden="true"></i></a>
                                                {!!Form::open(['method'=>'PATCH','class'=>'dropdown-item', 'action'=>['AdminContactController@update', $contact->id]])!!}
                                                {!! Form::hidden('read',1) !!}
                                                <button type="submit" class="btn btn-block">Mark as read</button>

                                                {!!Form::close()!!}
                                                {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['AdminContactController@destroy', $contact->id]])!!}
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
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
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
