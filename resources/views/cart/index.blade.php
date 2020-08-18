@extends('layouts.shop')
@section('title','Basket')
@section('content')
    @if(Session::has('cart_message'))
        <p class="text-success text-center p-2">{{session('cart_message')}}</p>

    @endif
    @if(Cart::count()>0)
        <section>
            <div class="row mt-4 p-2">

                <div class="col-sm-11 col-md-7 col-lg-8 mx-auto">
                    <div class="card shadow-sm">
                        <h6 class="card-header p-3 bg-light" style="font-size: 18px" >Basket<span class="float-right">{{Cart::count()}}&nbsp;Item(s)</span> </h6>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    @foreach(Cart::content() as $item)
                                        <div class="row">
                                            <div class="col-sm-3 col-md-3 col-lg-2">
                                                <a href="{{route('brand-shop.show', $item->model->slug)}}">
                                                    <img src="{{url('images/'. json_decode($item->model->path)[0] )}}" alt="{{$item->model->name}}" title="{{$item->model->name}}" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                <h6 class="w-100">{{$item->model->name}}<span class="float-lg-right">KES {{$item->subtotal}}</span></h6>
                                                @if($item->model->category->name=='Clothing/Apparel')
                                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
                                                        <table class="table" >
                                                            <thead class="thead thead-light">
                                                            <tr>
                                                                <th scope="col"><h4 class="p-0 m-0">Size</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">S</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">M</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">L</h4></th>
                                                                <th scope="col"><h4 class="p-0 m-0">XL</h4></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <th ><h4 class="p-0 m-0">Quantity:</h4></th>
                                                                <th class="font-bold"> <input class="quantity"  required type="number" value="{{$item->options->small}}" min="1" max="1500" name="quantity_small"/></th>
                                                                <td class="font-bold"> <input  class="quantity" required type="number" value="{{$item->options->medium}}" min="1" max="1500" name="quantity_medium"/></td>
                                                                <td class="font-bold"> <input class="quantity"  required type="number" value="{{$item->options->large}}" min="1" max="1500" name="quantity_large"/></td>
                                                                <td class="font-bold"> <input class="quantity"  required type="number" value="{{$item->options->extra_large}}" min="1" max="1500" name="quantity_extralarge"/></td>
                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                @else
                                                    <form>
                                                    <label for="quantity">Quantity:</label>
                                                    <input  id="quantity"  class="quantity" name="quantity_small" required type="number" value="{{$item->qty}}" min="1" max="1500" style="width:250px"/>
                                                </form>
                                                @endif
                                                <div class="d-flex">
                                                    {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'form-inline my-2 my-lg-0'])!!}
                                                    <div class="form-group">
                                                        {!! Form::hidden('product_id',$item->id) !!}
                                                        {!! Form::hidden('user_id', Auth::id()) !!}
                                                        <button type="submit" class="btn"><i class="far fa-heart mr-2"></i>Add to favourites</button>
                                                    </div>
                                                    {!!Form::close()!!}
                                                    {!!Form::open(['method'=>'DELETE', 'action'=>['CartController@destroy',$item->rowId],'class'=>'form-inline my-2 my-lg-0'])!!}
                                                    <div class="form-group">

                                                        <button type="submit" class="btn"><i class="fas fa-trash-alt mr-2"></i>Remove</button>
                                                    </div>
                                                    {!!Form::close()!!}
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div >
                                    <a href="{{route('brand-shop.index')}}" title="Continue Shopping" class="btn btn-primary ml-3 mr-3"><i class="fas fa-shopping-basket mr-2"></i>Continue Shopping</a>
                                    <a href="#" title="Continue Shopping" class="btn btn-primary">Proceed to Checkout<i class="fas fa-arrow-right ml-2"></i></a>
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
                            <h5>Subtotal<span class="float-right">KES {{Cart::subtotal()}}</span></h5>
                            <h5> Delivery & Handling<span class="float-right">KES 00</span></h5>
                            <h5> Tax(16%)<span class="float-right">KES {{Cart::tax()}}</span></h5>
                            <hr>
                            <h5>Total<span class="float-right">KES {{Cart::total()}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="text-center">
            <h2 class="text-center m-2" style="font-size: 20px">There are 0 items(s) in your cart!</h2>
            <a href="{{route('brand-shop.index')}}" class="btn btn-primary text-center">Continue Shopping</a>
        </div>
    @endif
    <section>
        @if($lover->count()>0)
            <h6 class="text-center p-4">YOU MAY ALSO LOVE</h6>
            <hr>
            <div class="row">
                @foreach($lover as $love)
                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto text-center">
                        <a href="{{route('brand-shop.show', $love->slug)}}" title="{{$love->slug}}">
                            <img class="img-fluid"  src="{{url('images/'. json_decode($love->path)[0] )}}" alt="{{$love->name}}">
                            <p class="text-center">
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
                            </p>
                            <h6 class="text-capitalize text-center m-1">{{$love->name}}</h6>
                            {!!Form::open(['method'=>'POST', 'action'=>'CartController@store','class'=>''])!!}
                            {!! Form::hidden('id', $love->id) !!}
                            {!! Form::hidden('name', $love->name) !!}
                            {!! Form::hidden('price', $love->price) !!}
                            {!! Form::hidden('quantity', 1) !!}
                            <button type="submit" class="btn btn-primary  pr-3 pl-3" style="font-size: 14px">ADD TO CART &nbsp;&nbsp; KES {{$love->price}}</button>
                            {!!Form::close()!!}
                            <div class="saved">
                                {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'pull-right'])!!}
                                <div class="form-group">
                                    {!! Form::hidden('product_id', $love->id) !!}
                                    {!! Form::hidden('user_id', Auth::id()) !!}
                                    <button type="submit" class="btn"> <i class="far fa-heart mr-2"></i></button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
