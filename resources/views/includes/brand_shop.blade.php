<section class="shop text-center P-5">
    <h3 class="mb-5">Brand Shop</h3>


    @if($products->count()>0)

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">


            <div class="carousel-inner" role="listbox">

                @foreach($products->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row">

                            @foreach( $chunk as $product )
                                <div class="col-sm-10 col-md-3 col-lg-3 mx-auto text-center m-2">
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
                                    <a href="{{route('brand-shop.show', $product->slug)}}" class="btn btn-primary">ADD TO CART &nbsp;&nbsp; KES {{$product->price}}</a>

                                    <div class="saved">
                                        {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'form-inline my-2 my-lg-0'])!!}
                                        <div class="form-group">
                                            {!! Form::hidden('product_id', $product->id) !!}
                                            {!! Form::hidden('user_id', Auth::id()) !!}
                                            <button class="btn" type="submit" title="Add to Wish list"><i class="far fa-heart"></i></button>
                                        </div>
                                        {!!Form::close()!!}



                                    </div>


                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    @endif
    <a href="{{route('brand-shop.index')}}" title="Brand Shop"><h4 class="mt-5">Discover More Products<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></h4></a>
</section>
