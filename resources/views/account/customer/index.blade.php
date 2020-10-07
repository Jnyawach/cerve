@extends('layouts.cerve')
@section('title', 'Orders')
@section('content')
    <section>
        <div class=" row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                @if(Session::has('order_message'))
                    <p class="text-success">{{session('order_message')}}</p>
                @endif
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="fas fa-shopping-basket mr-3"></i>Orders  </h6>
                    <div class="card-body">
                        <div class="row">
                            @if($orders->count()>0)
                                @foreach($orders as $order)
                                    <div class="col-sm-12 col-md-2 col-lg-2 m-2">
                                        <img src="{{url($order->product->getFirstMedia('product_photos')? $order->product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" class="img-fluid img-thumbnail" title="{{$order->product->name}}" >
                                    </div>
                                    <div class="col-sm-12 col-md-9 col-lg-9 m-2">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-8 col-lg-8">
                                                <h5>{{$order->product->name}}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <a href="{{route('customer.show',$order->id)}}" title="see details" CLASS="btn btn-sm text-success">SEE DETAILS</a>

                                            @if($order->is_active==1)
                                                    {!!Form::model($order,['method'=>'PATCH', 'action'=>['UserOrdersController@update',$order->id]])!!}
                                                    {!! Form::hidden('is_active', 3) !!}
                                                    <div class="form-group">
                                                        <button class="btn text-danger" type="submit">CANCEL</button>
                                                    </div>
                                                    {!!Form::close()!!}
                                                @endif
                                            </div>
                                        </div>

                                        <p>Order CEBR{{$order->id}}</p>
                                        @if($order->is_active==0 )

                                            <p class="badge badge-pill badge-info">Pending</p>
                                        @elseif($order->is_active==1)
                                            <p class="badge badge-pill badge-success">Processing</p>
                                        @elseif($order->is_active==2)
                                            <p class="badge badge-pill badge-success">Completed</p>
                                        @else
                                            <p class="badge badge-pill badge-danger">Cancelled</p>
                                        @endif
                                        <h5>On {{$order->created_at->isoFormat('Y-m-d')}}</h5>
                                        <hr class="broken">

                                    </div>

                                @endforeach
                                @else
                                <h3>You have no Orders</h3>
                                @endif
                        </div>


                    </div>
                    <div class="card-footer">
                        <h4>{{$orders->links()}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
