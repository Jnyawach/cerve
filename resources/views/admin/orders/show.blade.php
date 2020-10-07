@extends('layouts.cerve_admin')
@section('title', 'Orders')
@section('content')
    @include('includes.orders_menu')
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <h4>{{$order->product->name}}</h4>
            </div>
            @if($order->is_active==0 )
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::model($order,['method'=>'PATCH', 'action'=>['OrdersAdminController@update',$order->id]])!!}
                {!! Form::hidden('is_active', 1) !!}
                  <div class="form-group">
                      <button class="btn btn-primary btn-sm my-2 my-sm-0" type="submit">Add to processing</button>
                  </div>
                {!!Form::close()!!}
            </div>
            @elseif($order->is_active==1)
                {!!Form::model($order,['method'=>'PATCH', 'action'=>['OrdersAdminController@update',$order->id]])!!}
                {!! Form::hidden('is_active', 2) !!}
                <div class="form-group">
                    <button class="btn btn-primary btn-sm my-2 my-sm-0" type="submit">Add to completed</button>
                </div>
                {!!Form::close()!!}
                @endif
        </div>

        @if($order->is_active==0 )

            <p class="btn btn-sm btn-danger">Pending</p>
        @elseif($order->is_active==1)
            <p class="btn btn-sm btn-success">Processing</p>
        @elseif($order->is_active==2)
            <p class="btn btn-sm btn-success">Completed</p>
        @else
            <p class="btn btn-sm btn-success">Cancelled</p>
        @endif
        <div class="row m-5">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h5>Client Information</h5>
                <p>Date: {{$order->created_at->isoFormat('MMM Do YYYY')}}</p>
                <p>Customer: {{$order->user->name}} {{$order->user->lastname}}</p>
                <p>Phone Number: {{$order->user->cellphone}}</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h5>Payment Information</h5>
                <p>Payment: <span class="text-success">Success(MPESA)</span></p>
                <p>Grand Total (KES): {{number_format($order->total_price, 2)}}</p>
                <p>Tax Amount: 0.00</p>
                <p>Voucher Amount: 0.00</p>
                <p>Voucher code: YAED</p>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <h5>Shipping Address</h5>
                <p>{{$order->user->name}} {{$order->user->lastname}}</p>
                <p>{{$order->user->street}} {{$order->user->town}}, {{$order->user->country}}</p>
                <p>{{$order->user->cellphone}}</p>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="{{$order->product->getFirstMedia('product_photos')? $order->product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" class="img-fluid" title="{{$order->product->name}}" >
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                @if($order->product->category->name=='Clothing/Apparel')
                    <table class="table mt-4" >
                        <thead class="thead thead-light">
                        <tr>
                            <th scope="col"><h4 class="p-0 m-0">Size(s)</h4></th>
                            <th scope="col"><h4 class="p-0 m-0">S</h4></th>
                            <th scope="col"><h4 class="p-0 m-0">M</h4></th>
                            <th scope="col"><h4 class="p-0 m-0">L</h4></th>
                            <th scope="col"><h4 class="p-0 m-0">XL</h4></th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th ><h4 class="p-0 m-0">Quantity:</h4></th>
                            <td class="font-bold">{{$order->small}}</td>
                            <td class="font-bold">{{$order->medium}}</td>
                            <td class="font-bold">{{$order->large}}</td>
                            <td class="font-bold">{{$order->extra_large}}</td>


                        </tr>


                        </tbody>
                    </table>
                    @else
                    <p>Quantity: {{$order->quantity}}</p>
                @endif
                <p>{!! $order->product->description !!}</p>
                <p>{!! $order->product->features !!}</p>

            </div>
        </div>
        <hr>
        <div class="row">
            @if($order->description)
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-md-12">
                        <p>Printing type: {{$printing->name}}</p>
                        <p>{!! $order->description !!}</p>
                        <a href="{{ asset($order->artwork->path) }}" class="btn btn-primary" >View artwork</a>
                    </div>
                </div>
                @else
                <h2>No branding Guideline for this product</h2>
            @endif
        </div>
    </section>

    @endsection
