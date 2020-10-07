@extends('layouts.cerve')
@section('title', 'Saved items')
@section('content')
<section>
    <div class="row mt-4">
        @include('includes.sidebar')
        <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="far fa-heart mr-3"></i>Saved Items  </h6>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-12">
                            @if(Session::has('wish_message'))
                                <p class="text-success">{{session('wish_message')}}</p>
                            @endif
                            <div class="row">
                                @if($wishlists->count()>0)
                                    @foreach($wishlists as $wishlist)

                                        <div class="col-sm-4 col-md-4 col-lg-3 mt-2">
                                            <a href="{{route('brand-shop.show', $wishlist->product->slug)}}" title="View Product">
                                            <img src="{{url($wishlist->product->getFirstMedia('product_photos')? $wishlist->product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" alt="#" title="#" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                            <h6>{{$wishlist->product->name}}</h6>
                                            <h5 class="mt-2">
                                                @if($wishlist->product->reviews->count()>0)
                                                    @for($i = 0; $i < 5; $i++)
                                                        <span><i class="fa fa-star{{$wishlist->product->reviews->sum('rating')/$wishlist->product->reviews->count()  <= $i ? '-o' : '' }}"></i></span>
                                                    @endfor

                                                @else
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                @endif

                                            </h5>
                                            <div class="w-100 ">
                                                <a href="{{route('brand-shop.show', $wishlist->product->slug)}}" class="btn btn-primary">BUY NOW KES {{$wishlist->product->price}}</a>
                                                {!!Form::open(['method'=>'DELETE', 'action'=>['UserWishlistController@destroy',$wishlist->id],'class'=>'float-right ml-5'])!!}
                                                <div class="form-group">
                                                    <button type="submit" class="btn text-danger"><i class="far fa-trash-alt mr-2"></i>Remove</button>
                                                </div>
                                                {!!Form::close()!!}
                                            </div>
                                            <hr>
                                        </div>


                                    @endforeach
                                    @else
                                    <h4 class="text-center">You have never saved any products</h4>
                                @endif
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
