@extends('layouts.cerve_admin')
@section('title', 'Orders')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/fixedHeader.bootstrap4.css')}}">

@endsection
@section('content')
    @include('includes.orders_menu')
    <section>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Order Details</h5>
                @if(Session::has('product_message'))
                    <p class="text-success">{{session('product_message')}}</p>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Shipping</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($orders->count()>0)
                            @foreach($orders as $order)
                                <tr>
                                    <td>CER{{$order->id}}</td>
                                    <td>{{$order->created_at->isoFormat('Y-m-d')}}</td>
                                    <td>001</td>
                                    <td>002</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>@if($order->is_active==0 )
                                            <p class="text-danger">Pending</p>
                                            @elseif($order->is_active==1)
                                            <p>Processing</p>
                                        @elseif($order->is_active==2)
                                            <p>Completed</p>
                                            @elseif($order->is_active==3)
                                            <p>Cancelled</p>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('orders.show', $order->id)}}">View<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
                                                {!!Form::model($order,['method'=>'PATCH','class'=>'dropdown-item', 'action'=>['OrdersAdminController@update',$order->id]])!!}
                                                {!! Form::hidden('is_active', 3) !!}
                                                <div class="form-group">
                                                    <button class="btn btn-block my-2 my-sm-0" type="submit">Cancel</button>
                                                </div>
                                                {!!Form::close()!!}
                                                {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['ProductAdminController@destroy', $order->id]])!!}
                                                <button type="submit" class="btn btn-block">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

                                                {!!Form::close()!!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h2>There are no orders in the database</h2>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Order No.</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Shipping</th>
                            <th>Price</th>
                            <th>Quantity</th>
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

