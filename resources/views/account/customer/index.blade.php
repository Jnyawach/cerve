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
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header mt-3">
                                                <div class="float-left">
                                                    <li class="nav-item dropdown list-unstyled mr-3 ">
                                                    <a class="nav-link p-0 m-1 " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <h5>ACTIONS <i class="fa fa-ellipsis-v" aria-hidden="true"></i></h5>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                        <a href="{{route('customer.show',$order->id)}}" title="see details" CLASS="btn btn-sm text-success">SEE DETAILS</a>
                                                        @if($order->is_active==0)
                                                        {!!Form::model($order,['method'=>'PATCH', 'action'=>['UserOrdersController@update',$order->id]])!!}
                                                        {!! Form::hidden('is_active', 3) !!}
                                                        <div class="form-group">
                                                            <button class="btn text-danger" type="submit">CANCEL</button>
                                                        </div>
                                                        {!!Form::close()!!}
                                                            @endif

                                                    </div>
                                                </li>
                                                </div>
                                                    <div class="float-right">
                                                        <h5 >Order No. {{$order->id}}</h5>
                                                    </div>



                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-12 m-2">
                                                        <table class="table">
                                                            <thead class="thead-light">
                                                            <tr>

                                                                <th scope="col"><h6>Image</h6></th>
                                                                <th scope="col"><h6>Name</h6></th>
                                                                <th scope="col"><h6>Quantity</h6></th>
                                                                <th scope="col"><h6>Printing</h6></th>
                                                                <th scope="col"><h6>Amount</h6></th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach(json_decode($order->cart_data) as $item)
                                                                <tr>

                                                                    <th><img src="{{asset($photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')? $photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}"
                                                                             alt="{{$item->name}}" class="img-fluid" style="height: 50px">
                                                                    </th>
                                                                    <td> {{$item->name}}</td>
                                                                    <td>{{$item->quantity}}</td>
                                                                    <td>{{$item->attributes->totalPrinting}}</td>
                                                                    <td>{{$item->attributes->totalPrice}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5> Amount: {{number_format($order->amount,2)}}</h5>
                                                        </div>
                                                        <div class="col-4 ">
                                                            Status:
                                                            @if($order->is_active==0 )

                                                                <p class="badge badge-pill badge-info">Pending</p>
                                                            @elseif($order->is_active==1)
                                                                <p class="badge badge-pill badge-success">Processing</p>
                                                            @elseif($order->is_active==2)
                                                                <p class="badge badge-pill badge-success">Completed</p>
                                                            @else
                                                                <p class="badge badge-pill badge-danger">Cancelled</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

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
