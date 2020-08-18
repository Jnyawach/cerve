@extends('layouts.shop')
@section('title','Branding Guideline')
@section('content')

    <section class="container mt-5">
        <h5 class="text-center">Branding Guideline</h5>
        @if(Session::has('cart_message'))
            <p class="text-success text-center p-2">{{session('cart_message')}}</p>

        @endif
    <hr>
        @if(Cart::instance('branding')->count()>0)
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 col-md-10 col-lg-10 mx-auto ">

                    <div class="row">
                        @foreach(Cart::instance('branding')->content() as $cart)
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <a href="{{route('brand-shop.show', $cart->model->slug)}}">

                                <img src="{{asset($cart->model->photo? $cart->model->photo->path:'images/cerve logo.png')}}" alt="{{$cart->model->name}}" title="{{$cart->model->name}}" class="img-fluid">
                                <h6 class="mt-2">Branded sample</h6>

                            </a>
                        </div>
                            <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
                                <h4>{{$cart->model->name}}</h4>
                                @if($cart->model->category->name=='Clothing/Apparel')
                                    <table class="table" >
                                        <thead class="thead thead-light">
                                        <tr>
                                            <th scope="col"><h4 class="p-0 m-0">Image</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">S</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">M</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">L</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">XL</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Total Quantity</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Color</h4></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th >
                                                <img src="{{url('images/'. json_decode($cart->model->path)[0] )}}" class="img-fluid" title="{{$cart->model->name}}" style="height: 40px" >
                                            </th>
                                            <th class="font-bold">{{$cart->options->small}}</th>
                                            <td class="font-bold">{{$cart->options->medium}}</td>
                                            <td class="font-bold">{{$cart->options->large}}</td>
                                            <td class="font-bold">{{$cart->options->extra_large}}</td>
                                            <td class="font-bold">{{$cart->qty}}</td>
                                            <th class="font-bold">{{$cart->subtotal}}</th>
                                            <td class="font-bold">
                                                <h6 class="text-capitalize">
                                                    <svg width="20" height="20">
                                                        <rect width="30" height="30" style="fill:{{$cart->model->color}};" />
                                                    </svg>&nbsp;</h6></td>
                                        </tr>


                                        </tbody>
                                    </table>

                                @else
                                <table class="table" >
                                    <thead class="thead thead-light">
                                    <tr>
                                        <th scope="col"><h4 class="p-0 m-0">Image</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Color</h4></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <img src="{{url('images/'. json_decode($cart->model->path)[0] )}}" class="img-fluid" title="{{$cart->model->name}}" style="height: 40px" >
                                        </th>
                                        <th ><h6 class="p-0 m-0">{{$cart->qty}}</h6></th>
                                        <th class="font-bold">{{$cart->subtotal}}</th>
                                        <td class="font-bold">
                                            <h6 class="text-capitalize">
                                                <svg width="20" height="20">
                                                    <rect width="30" height="30" style="fill:{{$cart->model->color}};" />
                                                </svg>&nbsp;</h6></td>

                                    </tr>


                                    </tbody>
                                </table>
                                @endif
                                <p>{!! $cart->model->brand !!}</p>

                            </div>
                            @endforeach
                    </div>

                </div>
            </div>
        @endif
    </section>
@endsection
