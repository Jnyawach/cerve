@extends('layouts.shop')
@section('title', 'Brand Shop')
@section('content')

    <section >

        <div class="row mt-2 p-3 d-none d-lg-flex">
            <div class="  col-md-4 col-lg-4 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-3">
                        <img src="{{asset('images/free-shipping.png')}}" class="img-fluid" alt="free shipping">
                    </div>
                    <div class="col-9">
                        <h4 class="p-0 m-0">FREE SHIPPING</h4>
                        <p>Free shipping on all orders above KES 5000 within Nairobi</p>
                    </div>

                </div>

             </div>
             <div class=" col-md-4 col-lg-4 mx-auto shop-info p-2 ">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset('images/right-on-time.png')}}" class="img-fluid" alt="Right on time delivery">
                    </div>
                    <div class="col-9">
                        <h4 class="p-0 m-0">RIGHT ON TIME</h4>
                        <p>We deliver right on time</p>
                    </div>

                </div>

             </div>
             <div class=" col-md-4 col-lg-4 mx-auto shop-info p-2 ">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset('images/discount.png')}}" class="img-fluid" alt="free shipping">
                    </div>
                    <div class="col-9">
                        <h4 class="p-0 m-0">DISCOUNT</h4>
                        <p>Great discount for bulk purchases</p>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="row mt-1   shop-car">

            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto  ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block  text-left">
                                <h1>The Ultimate Experience</h1>
                                <p style="width: 600px; font-size:25px"> Enhance Your visibility from all corners.
                                Make your brand discoverable!</p>
                                <a href="https://cervekenya.com/brand-shop/category/general-branding" class="btn btn-primary">SHOP NOW</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/banner2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block text-left">
                                <h1>When it is this personal </h1>
                                <p style="width: 600px; font-size:25px">It is not a gift anymore.... It is love. We help you reward love</p>
                                <a href="https://cervekenya.com/brand-shop/category/home-living" class="btn btn-primary">SHOP NOW</a>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img src="images/banner3.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block text-left">
                                <h1>We explore all dimensions</h1>
                                <p style="width: 600px; font-size:25px">To get you out there,
                                we explore all dimensions</p>
                                <a href="https://cervekenya.com/brand-shop/category/clothing-apparel" class="btn btn-primary">SHOP NOW</a>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <section class="shop-home">

        @if($products->count()>0)

                <div class="row mt-3 p-3">
                    <div class="col-sm-12 col-md-3 col-lg-3 mx-auto">
                        <div class="card">
                            <div class="card-header shadow-none p-3">
                                <h3 class="p-0 m-0">Category<i class="fa fa-bars float-right" aria-hidden="true"></i></h3>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($categories as $category)
                                    <div class="col-12 shop-category p-1">
                                        <a href="{{route('category',$category->slug)}}" title="{{$category->name}}"><h6 class="m-3">{{$category->name}}</h6></a>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
                        <div class="row">
                            @foreach( $products as $product )
                                <div class="col-sm-4 col-md-4 col-lg-3  text-center m-2 mx-auto">
                                    <div class="card h-100">
                                    <div class="card-body ">
                                    <a href="{{route('brand-shop.show', $product->slug)}}" title="{{$product->slug}}">
                                        <img src="{{asset($product->getFirstMedia('product_photos')? $product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" class="img-fluid card-img-top" alt="{{$product->slug}}">
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

                                    <h6 class="text-capitalize text-center m-1" style="color: black">{{$product->name}}</h6>
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
                                        <div class="card-footer mt-3 p-0">
                                            <a id="price" href="{{route('brand-shop.show', $product->slug)}}" class="btn btn-block m-0" style="font-size: 12!important;px">ADD TO CART &nbsp;&nbsp KES {{$product->price}}</a>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>

        @endif

    </section>

<div class="row">
    <div class="col-10 mx-auto ">
        <h3 class="text-right">{{ $products->links() }}</h3>
    </div>
</div>


@endsection
