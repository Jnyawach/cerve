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
        <div class="row m-3">
            @foreach( $products as $product )
                <div class="col-6 col-sm-6 col-md-4 col-lg-3  text-center m-2 mx-auto">
                    <div class="card">
                        <a href="{{route('brand-shop.show', $product->slug)}}" title="{{$product->slug}}">
                            <img src="{{url('images/'. json_decode($product->path)[0] )}}" class="img-fluid" title="{{$product->name}}" >
                        </a>
                        <h5 class="mt-2">
                            @if($product->reviews->count()>0)
                                @for($i = 0; $i < 5; $i++)
                                    <span><i class="fa fa-star{{$product->reviews->sum('rating')/$product->reviews->count()  <= $i ? '-o' : '' }}"></i></span>
                                @endfor

                            @else
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                            @endif

                        </h5>

                        <h6 class="text-capitalize text-center m-2" style="color: black">{{$product->name}}</h6>
                        <div class="saved">
                            {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'form-inline my-2 my-lg-0'])!!}
                            <div class="form-group">
                                {!! Form::hidden('product_id', $product->id) !!}
                                {!! Form::hidden('user_id', Auth::id()) !!}
                                <button class="btn" type="submit" title="Add to Wish list"><i class="far fa-heart"></i></button>
                            </div>
                            {!!Form::close()!!}



                        </div>
                        <div class="card-footer mt-3 p-0">
                            <a id="price" href="{{route('brand-shop.show', $product->slug)}}" class="btn btn-block m-0" style="font-size: 12!important;px">ADD TO CART &nbsp;&nbsp KES {{$product->price}}</a>
                        </div>

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

