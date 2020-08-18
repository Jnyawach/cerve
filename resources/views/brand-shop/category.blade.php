@extends('layouts.shop')
@section('title', $category->slug)
@section('content')
    <div class="p-3 d-inline-flex">
        <a href="{{route('brand-shop.index')}}" title="Cerve Brand MarketPlace"><h6>Home</h6></a><h6 class="ml-2 mr-2">|</h6>
        <a href="{{route('category', $category->slug)}}" title="Cerve Brand MarketPlace"><h6>{{$category->name}}</h6></a><h6 class="ml-2 mr-2">|</h6>

    </div>
    <h2 class="text-center text-uppercase" style="font-size: 20px">{{$category->name}}&nbsp;({{$products->count()}})</h2>

    <hr>

    <div class="container">
        @if($products->count()>0)
        <div class="row m-5">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto text-center">
                <a href="{{route('brand-shop.show', $product->slug)}}" title="{{$product->slug}}">
                    <img src="{{url('images/'. json_decode($product->path)[0] )}}" class="img-fluid" title="{{$product->name}}" >
                </a>
                <p>
                    <span><i class="fa fa-star-o"></i></span>
                    <span><i class="fa fa-star-o"></i></span>
                    <span><i class="fa fa-star-o"></i></span>
                    <span><i class="fa fa-star-o"></i></span>
                    <span><i class="fa fa-star-o"></i></span>

                </p>

                <h6 class="text-capitalize text-center m-1">{{$product->name}}</h6>

                {!!Form::open(['method'=>'POST', 'action'=>'AdminController@store','class'=>''])!!}
                {!! Form::hidden('id', $product->id) !!}
                {!! Form::hidden('name', $product->name) !!}
                {!! Form::hidden('price', $product->price) !!}
                {!! Form::hidden('quantity', 1) !!}
                <button type="submit" class="btn btn-primary  pr-3 pl-3" style="font-size: 14px">ADD TO CART &nbsp;&nbsp; KES {{$product->price}}</button>
                {!!Form::close()!!}

                <div class="saved">
                    <form>
                        <button class="btn" type="submit" title="Add to Wish list"><i class="far fa-heart"></i></button>
                    </form>
                </div>
            </div>
                @endforeach
        </div>
            @else
            <h3 class="text-center p-5">Oops! There are no products in this category</h3>
            @endif
    </div>


    <div class="row">
        <div class="col-10 mx-auto ">
            <h3 class="text-right">{{ $products->links() }}</h3>
        </div>
    </div>
@endsection

