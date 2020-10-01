@extends('layouts.shop')
@section('title', $product->name)
@section('styles')
    <link href="{{asset('css/better-rating.css')}}" rel="stylesheet">

@endsection
@section('content')
    <div class="pt-5 p-2 d-inline-flex">
        <a href="{{route('brand-shop.index')}}" title="Cerve Brand MarketPlace"><h6>Home</h6></a><h6 class="ml-2 mr-2">|</h6>
        <a href="{{route('category', $product->category->slug)}}" title="Cerve Brand MarketPlace"><h6>{{$product->category->name}}</h6></a><h6 class="ml-2 mr-2">|</h6>
        <h6>{{$product->name}}</h6>

    </div>
    <div class="ml-5">
        @if(Session::has('rating_message'))
            <p class="text-success">{{session('rating_message')}}</p>
        @endif
    </div>


    <section class="product  text-left">
        <div class="row product-temp m-1">
            <div class="col-sm-12 col-md-10 col-lg-5 mx-auto">
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>
                        <!-- Wrapper for slides -->
                        <div class='carousel-inner'>

                            @foreach(json_decode($product->path) as $photo=>$path)
                                <div class='carousel-item {{$photo==0? 'active' : '' }}'>
                                    <img src="{{url('images/'.$path)}}" class=" img-fluid">
                                </div>
                            @endforeach




                        </div>

                        <!-- Controls -->
                        <div class="carousel-control">
                            <a class="carousel-control-prev" href="#carousel-custom" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-custom" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <!-- Indicators -->
                    <ol class='carousel-indicators'>
                        @foreach(json_decode($product->path) as $photo=>$key)
                            <li data-target='#carousel-custom' data-slide-to='{{$photo}}' class='active'><img src="{{url('images/'.$key)}}" class=" img-fluid img-thumbnail"></li>

                        @endforeach

                    </ol>
                </div>
                @if($product->photo)
                <div class="branded mt-4">
                    <h4>Branded Sample</h4>
                    <img src="{{asset($product->photo->path)}}" class="img-fluid" style="height: 400px">
                </div>
                    @endif
            </div>


            <div class="col-sm-12 col-md-12 col-lg-6 mx-auto product-description ">
                <h4 class="text-capitalize mt-3">{{$product->name}}  </h4>

                <div class="row">
                    <div class="review col-sm-12 col-md-6 col-lg-6">
                    <h5 >
                        @if($reviews->count()>0)
                            @for($i = 0; $i < 5; $i++)
                                <span><i class="fa fa-star{{$reviews->sum('rating')/$reviews->count()  <= $i ? '-o' : '' }}"></i></span>
                            @endfor

                        @else
                            <span><i class="fa fa-star-o"></i></span>
                            <span><i class="fa fa-star-o"></i></span>
                            <span><i class="fa fa-star-o"></i></span>
                            <span><i class="fa fa-star-o"></i></span>
                            <span><i class="fa fa-star-o"></i></span>
                        @endif
                        Based on {{$reviews->count()}} Reviews</h5>
                    </div>
                  <div class="review col-sm-12 col-md-6 col-lg-6">
                    {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store'])!!}
                    <div class="form-group">
                        {!! Form::hidden('product_id', $product->id) !!}
                        {!! Form::hidden('user_id', Auth::id()) !!}
                        <button type="submit" class="btn   p-0"> <i class="far fa-heart mr-2"></i>Add to wish List</button>
                    </div>
                    {!!Form::close()!!}


                  </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12 quantity-table">
                        <table class="table">
                            <thead class="thead">
                            <tr>
                                <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">1-10</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">11-30</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">31-50</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">50+</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th ><h4 class="p-0 m-0">Price (KES)</h4></th>
                                <th class="font-bold">{{$product->price}}</th>
                                <td class="font-bold">{{$product->price_2}}</td>
                                <td class="font-bold">{{$product->price_3}}</td>
                                <td class="font-bold">{{$product->price_4}}</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                {!!Form::open(['method'=>'POST', 'action'=>'CartController@store'])!!}
                <div class="form-group ">
                    {!! Form::hidden('id', $product->id) !!}
                    {!! Form::hidden('name', $product->name) !!}

                    {!! Form::hidden('price', $product->price) !!}
                </div>
                @if($product->brand)
                <div class="form-group">
                    {!!Form::label('branding', 'Do You want this product Branded?')!!}
                    {!!Form::select('branding', array(''=>'Please select',1=>'YES', 0=>'NO'), null, ['class'=>'form-control','required'])!!}
                </div>
                    @else
                    <h4 class="text-success">There is no branding guideline for this product!</h4>
                @endif

                <div class="form-group row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3" >
                        <div class="row">
                            <div class="col-sm-12 col-md-2 col-lg-4">
                                <h5>In stock:&nbsp; {{$product->stock}}</h5>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <h5 class="text-capitalize">Color:&nbsp;
                                    <svg width="20" height="20">
                                        <rect width="30" height="30" style="fill:{{$product->color}};" />
                                    </svg>&nbsp;&nbsp;{{$product->color}}</h5>

                            </div>
                        </div>

                    </div>
                    @if($product->category->name=='Clothing/Apparel')
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
                            <h6 class="text-left"><i class="fa fa-info-circle mr-3" aria-hidden="true"></i>Add Quantity to the size(s) you want</h6>
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
                                    <th class="font-bold"> <input class="quantity"   type="number" value="0" min="0" max="1500" name="quantity_small"/></th>
                                    <td class="font-bold"> <input  class="quantity"  type="number" value="0" min="0" max="1500" name="quantity_medium"/></td>
                                    <td class="font-bold"> <input class="quantity"   type="number" value="0" min="0" max="1500" name="quantity_large"/></td>
                                    <td class="font-bold"> <input class="quantity"   type="number" value="0" min="0" max="1500" name="quantity_extralarge"/></td>
                                </tr>
                                </tbody>
                            </table>
                            @if(session()->has('message'))
                                <p class="text-danger">
                                    {{ session()->get('message') }}
                                </p>
                                @endif
                        </div>

                        @else
                        <div class="col-sm-6 col-md-6 col-lg-6 m-2">
                            <label for="quantity">Quantity:</label>
                            <input  id="quantity" class="quantity" name="quantity_small" required type="number" value="" min="1" max="1500" style="width:250px"/>
                            <input   type="hidden" value="0"  name="quantity_medium"/>
                            <input   type="hidden" value="0"  name="quantity_large"/>
                            <input   type="hidden" value="0"  name="quantity_extralarge"/>
                        </div>
                    @endif

                    <div class="col-sm-6 col-md-6 col-lg-6 " >
                            <button type="submit" class="btn btn-primary  pr-3 pl-3 m-2" style="font-size: 12px">ADD TO CART &nbsp;&nbsp; KES {{$product->price}}</button>
                    </div>


                </div>


                {!!Form::close()!!}

                <div class="tabs mt-5">
                    <div class="tab">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true"><h6>Description</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false"><h6>Brand Guideline</h6></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-outline-three" data-toggle="tab" href="#outline-three" role="tab" aria-controls="contact" aria-selected="false"><h6>Associated Video</h6></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                         <p>{!! $product->description !!}</p>
                                <p>{!! $product->features !!}</p>
                            </div>
                            <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                              <p>{!! $product->brand? $product->brand:'No branding guideline provided' !!}</p>
                            </div>
                            <div class="tab-pane fade" id="outline-three" role="tabpanel" aria-labelledby="tab-outline-three">
                                @if($product->video)
                                    <div>

                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{url($product->video->path) }}" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    @else
                                    <h6>No video associated with this product</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

    </section>
    <section>

        <div class="row p-3">
            <div class="col-12">
                <div class="simple-card">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Review this product</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                            @if($reviews->count()>0)
                                @foreach($reviews as $review)
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“{{$review->comment}}”</p>
                                <div class="rating-star mb-4">
                                    @for($i = 0; $i < 5; $i++)
                                        <span><i class="fa fa-star{{ $review->rating  <= $i ? '-o' : '' }}"></i></span>
                                    @endfor
                                </div>
                                <span class="text-dark font-weight-bold">{{$review->user->name}}&nbsp;{{$review->user->lastname}}</span>
                            </div>
                                    <hr>
                                @endforeach
                                @else
                                <h3>Be the first to review this product!</h3>
                                @endif
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                            {!!Form::open(['method'=>'POST', 'action'=>'ReviewController@store'])!!}
                            <div class="form-group">
                                {!! Form::hidden('product_id', $product->id) !!}
                                {!! Form::hidden('user_id', Auth::id()) !!}
                            </div>
                             <div class="form-group">
                                 <h4>Rating:</h4>
                                 <div class="rating">
                                     <i class="fa fa-star" data-rate="1"></i>
                                     <i class="fa fa-star" data-rate="2"></i>
                                     <i class="fa fa-star" data-rate="3"></i>
                                     <i class="fa fa-star" data-rate="4"></i>
                                     <i class="fa fa-star" data-rate="5"></i>
                                     <input type="hidden" id="rating-count" name="rating" value="0">
                                 </div>
                             </div>

                            <div class="form-group">
                                {!!Form::label('comment', 'Review:')!!}
                                {!!Form::textarea('comment', null, ['class'=>'form-control','required'])!!}

                            </div>
                            <div class="form-group">
                                {!!Form::submit('Submit', ['class'=>'btn btn-primary' ])!!}
                            </div>


                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="m-5">
        <h2 class="text-center">Related Products</h2>
        @if($related->count()>0)
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">


            <div class="carousel-inner" role="listbox">

                @foreach($related->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row">

                            @foreach( $chunk as $product )
                                <div class="col-12 col-md-3 col-lg-3 mx-auto text-center">
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

                                    <h6 class="text-capitalize text-center m-1" style=" color: black">{{$product->name}}</h6>

                                        <div class="saved">
                                        {!!Form::open(['method'=>'POST', 'action'=>'UserWishlistController@store','class'=>'form-inline my-2 my-lg-0'])!!}
                                        <div class="form-group">
                                            {!! Form::hidden('product_id', $product->id) !!}
                                            {!! Form::hidden('user_id', Auth::id()) !!}
                                            <button class="btn" type="submit" title="Add to Wish list"><i class="far fa-heart"></i></button>
                                        </div>

                                        {!!Form::close()!!}



                                    </div>
                                        <div class="card-footer p-0 mt-3">
                                            <a id=price href="{{route('brand-shop.show', $product->slug)}}" class="rounded-0 btn btn-block m-0 ">ADD TO CART &nbsp;&nbsp; KES {{$product->price}}</a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @endif

    </section>
@endsection
@section('scripts')
    <script src="{{asset('js/better-rating.js')}}"></script>
    <script>
        $(function(){

            $('#better-rating-form').betterRating();

        });
    </script>

@endsection
