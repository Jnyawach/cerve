@extends('layouts.shop')
@section('title','Basket')
@section('content')
    @if(Session::has('cart_message'))
        <p class="text-success text-center p-2">{{session('cart_message')}}</p>

    @endif

    @if(Cart::session(Auth::id())->getContent()->count()>0)
        <section>
            <div class="row mt-4 p-2">

                <div class="col-sm-12 col-md-7 col-lg-9 mx-auto">
                    <div class="card shadow-sm">
                        <h6 class="card-header p-3 bg-light" style="font-size: 18px" >Basket<span class="float-right">{{Cart::session(Auth::id())->getContent()->count()}}&nbsp;Item(s)</span> </h6>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    @foreach(Cart::session(Auth::id())->getContent() as $item)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-3 col-lg-2">
                                                <a href="{{route('brand-shop.show', $item->model->slug)}}">
                                                    <img src="{{asset($item->model->getFirstMedia('product_photos')?$item->model->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png')}}" alt="{{$item->model->name}}" title="{{$item->model->name}}" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-10">
                                                <h6 class="w-100">{{$item->model->name}}</h6>
                                                @if($item->model->category->name=='Clothing/Apparel')
                                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center ">

                                                        <table class="table table-responsive" >
                                                            <thead class="thead thead-light">
                                                            <tr>
                                                                <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">Printing(KES)</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">Total Price(KES)</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">Total Printing(KES)</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">Subtotal(KES)</h4></th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <td class="font-bold">{{$item->quantity}}</td>
                                                                <td class="font-bold">{{number_format($item->price, 2)}}</td>
                                                                <td class="font-bold">{{number_format($item->attributes->printing, 2)}}</td>
                                                                <td class="font-bold">{{number_format($item->getPriceSum(), 2)}}</td>
                                                                <td class="font-bold">{{number_format($item->attributes->totalPrinting, 2)}}</td>
                                                                <td class="font-bold">{{number_format( $item->getPriceSumWithConditions(),2)}}</td>
                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                      <form>
                                                        <table class="table mt-4 " >
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
                                                      </form>
                                                    </div>

                                                @else
                                                    <table class="table table-responsive" >
                                                        <thead class="thead thead-light">
                                                        <tr>
                                                            <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                                            <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                                            <th scope="col"><h4 class="p-0 m-0">Printing(KES)</h4></th>
                                                            <th scope="col"><h4 class="p-0 m-0">Total Price(KES)</h4></th>
                                                            <th scope="col"><h4 class="p-0 m-0">Total Printing(KES)</h4></th>
                                                            <th scope="col"><h4 class="p-0 m-0">Subtotal(KES)</h4></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>

                                                            <td class="font-bold">{{$item->quantity}}</td>
                                                            <td class="font-bold">{{number_format($item->price, 2)}}</td>
                                                            <td class="font-bold">{{number_format($item->attributes->printing, 2)}}</td>
                                                            <td class="font-bold">{{number_format($item->getPriceSum(), 2)}}</td>
                                                            <td class="font-bold">{{number_format($item->attributes->totalPrinting, 2)}}</td>
                                                            <td class="font-bold">{{number_format( $item->getPriceSumWithConditions(),2)}}</td>
                                                        </tr>


                                                        </tbody>
                                                    </table>

                                                @endif
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                    {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store'])!!}
                                                    <div class="form-group">
                                                        {!! Form::hidden('product_id',$item->id) !!}
                                                        {!! Form::hidden('user_id', Auth::id()) !!}
                                                        <button type="submit" class="btn text-success"><i class="far fa-heart mr-2"></i>Add to favourites</button>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                    {!!Form::close()!!}
                                                    {!!Form::open(['method'=>'DELETE', 'action'=>['CartController@destroy',$item->id]])!!}
                                                    <div class="form-group">

                                                        <button type="submit" class="btn text-danger "><i class="fas fa-trash-alt mr-2"></i>Remove from cart</button>
                                                    </div>
                                                    {!!Form::close()!!}
                                                    </div>
                                                </div>
                                                <hr class="broken">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div >
                                    <a href="{{route('brand-shop.index')}}" title="Continue Shopping" class="btn btn-primary m-2"><i class="fas fa-shopping-basket mr-2"></i>Continue Shopping</a>
                                    @if(Cart::session(Auth::id())->getContent()->count()>0)

                                    <a href="{{route('checkout')}}" title="Continue Shopping" class="btn btn-primary m-2">Proceed to Checkout<i class="fas fa-arrow-right ml-2"></i></a>
                               @endif
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-11 col-md-5 col-lg-3 mx-auto mt-2">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6>Summary</h6>
                        </div>
                        <div class="card-body">
                            <h5>Subtotal<span class="float-right">KES {{number_format(Cart::session(Auth::id())->getSubTotal(),2)}}</span></h5>
                            <h5> Delivery & Handling<span class="float-right">KES 0.00 </span></h5>
                            <h5> Tax(16%)<span class="float-right">KES 0.00</span></h5>
                            <hr>
                            <h5>Total<span class="float-right">KES {{number_format(Cart::session(Auth::id())->getTotal(),2)}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div >
            <h3 class="text-center mt-5 text-success" style="font-size: 20px">There are 0 items(s) in your cart! <a href="{{route('brand-shop.index')}}" >Continue Shopping</a></h3>

        </div>
    @endif
    <section>
        @if($lover->count()>0)
            <h6 class="text-center p-4">YOU MAY ALSO LOVE</h6>
            <hr>
            <div class="row p-3">
                @foreach($lover as $love)
                    <div class="col-sm-10 col-md-4 col-lg-3 mx-auto text-center m-2">
                        <div class="card">
                        <a href="{{route('brand-shop.show', $love->slug)}}" title="{{$love->slug}}">
                            <img class="img-fluid"  src="{{asset($love->getFirstMedia('product_photos')? $love->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png')}}" alt="{{$love->name}}">
                        </a>
                            <h6 class="text-center mt-2">
                                @if($love->reviews->count()>0)
                                    @for($i = 0; $i < 5; $i++)
                                        <span><i class="fa fa-star{{$love->reviews->sum('rating')/$love->reviews->count()  <= $i ? '-o' : '' }}"></i></span>
                                    @endfor

                                @else
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                @endif
                            </h6>
                            <h6 class="text-capitalize text-center m-1">{{$love->name}}</h6>

                            <div class="saved">
                                {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'pull-right'])!!}
                                <div class="form-group">
                                    {!! Form::hidden('product_id', $love->id) !!}
                                    {!! Form::hidden('user_id', Auth::id()) !!}
                                    <button type="submit" class="btn"> <i class="far fa-heart mr-2"></i></button>
                                </div>
                                {!!Form::close()!!}

                            </div>

                            <div class="card-footer mt-3 p-0">
                                <a id="price" href="{{route('brand-shop.show', $love->slug)}}" class="btn btn-block">ADD TO CART &nbsp;&nbsp KES {{$love->price}}</a>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
