@extends('layouts.cerve_admin')
@section('title','Product Review')
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
                <h5 class="mb-0">Reviews </h5>
                @if(Session::has('rating_message'))
                    <p class="text-success">{{session('rating_message')}}</p>
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
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($reviews->count()>0)
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->created_at->isoFormat('D-M-Y')}}</td>
                                    <td>{{$review->user->name}}&nbsp;{{$review->user->lastname}}</td>
                                    <td>{{$review->product->name}}</td>
                                    <td>
                                        <div class="rating-star mb-4">
                                            @for($i = 0; $i < 5; $i++)
                                                <span><i class="fa fa-star{{ $review->rating  <= $i ? '-o' : '' }}"></i></span>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>@if($review->is_active==0)
                                            <p class="text-success">active</p>
                                        @else
                                            <p class="text-danger">inactive</p>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('reviews.show', $review->id)}}">View<i class="fa fa-bookmark ml-2" aria-hidden="true"></i></a>
                                                @if($review->is_active==0)
                                                    {!!Form::open(['method'=>'PATCH','class'=>'dropdown-item', 'action'=>['AdminReviewController@update', $review->id]])!!}
                                                    {!! Form::hidden('is_active',1) !!}
                                                    <button type="submit" class="btn btn-block">Deactivate</button>

                                                    {!!Form::close()!!}
                                                @else
                                                    {!!Form::open(['method'=>'PATCH','class'=>'dropdown-item', 'action'=>['AdminReviewController@update', $review->id]])!!}
                                                    {!! Form::hidden('is_active',0) !!}
                                                    <button type="submit" class="btn btn-block">Activate</button>

                                                    {!!Form::close()!!}
                                                @endif



                                                {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['AdminReviewController@destroy', $review->id]])!!}
                                                <button type="submit" class="btn btn-block">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

                                                {!!Form::close()!!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h2>There are no reviews in the database</h2>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Rating</th>
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
