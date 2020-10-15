@extends('layouts.cerve_admin')
@section('title', 'Orders')
@section('content')
    @include('includes.orders_menu')
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">

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
        @foreach(json_decode($order->cart_data) as $item)
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="{{asset($photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')? $photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png')}}" class="img-fluid" title="{{$item->name}}" >
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">

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
                            <td class="font-bold">{{$item->attributes->small}}</td>
                            <td class="font-bold">{{$item->attributes->medium}}</td>
                            <td class="font-bold">{{$item->attributes->large}}</td>
                            <td class="font-bold">{{$item->attributes->extra_large}}</td>


                        </tr>


                        </tbody>
                    </table>

                    <p>Quantity: {{$item->quantity}}</p>



            </div>
        </div>
        <hr>
        <div class="row">
            @if($item->attributes->printDescription)
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-md-12">
                        <p>Printing type:{{\App\ProductPrinting::findOrFail($item->attributes->order_printing)->name}} </p>
                        <p>{!! $item->attributes->printDescription !!}</p>

                        @if($item->attributes->printArtwork)
                            <a href="{{asset($item->attributes->printArtwork)}}" class="btn btn-primary" >View artwork</a>
                        @endif
                    </div>
                </div>
                @else
                <h2>No branding Guideline for this product</h2>
            @endif
        </div>
    </section>
@endforeach
    @endsection
