@extends('layouts.cerve')
@section('title', 'Discover The New Ways
To Craft Your Visibility')
@section('content')

    <section class="intro p-5 text-center">
        <div class="row p-5">
            <div class="col-12 col-md-8 col-lg-8 mx-auto">
                <h1 style="font-size: 45px">Discover The New Ways<br> To Craft Your Visibility!</h1>
                <p style="font-size: 18px">Try Cerve Today. Grow your business with us</p>
                <a href="#" class="btn btn-primary ">Find Out More</a>
                <a href="#" class="btn btn-info ">See Portfolio</a>

            </div>

        </div>
    </section>
    <section>
        <div class="services text-center ">
            <h6 class="m-4" style="font-size: 18px">Design, Printing, Embroidery & More</h6>

            <div class="row  p-4">
                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2 ">
                    <a href="#" title="Design">
                        <img src="{{asset('images/design.png')}}" alt="Graphic Design">
                        <h5>Design</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>
                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2 ">
                    <a href="#" title="branding">
                        <img src="{{asset('images/branding.png')}}" alt="Branding">
                        <h5>Branding</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>
                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2">
                    <a href="#" title="Printing">
                        <img src="{{asset('images/printing.png')}}" alt="Printing">
                        <h5>Printing</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>
            </div>
            <div class="row mb-5">

                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2">
                    <a href="#" title="Print-On-Demand">
                        <img src="{{asset('images/embroidery.png')}}" alt="Print-On-Demand">
                        <h5>Print On Demand</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>
                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2 ">
                    <a href="#" title="BRand Shop">
                        <img src="{{asset('images/printing.png')}}" alt="Brand Shop">
                        <h5>Brand Shop</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>
                <div class="col-8 col-md-3 col-lg-3 mx-auto serve m-2 ">
                    <a href="#" title="Web Development">
                        <img src="{{asset('images/web.png')}}" alt="Web Development">
                        <h5>Web Development</h5>
                        <p>Branding is a very significant tool in product and name promotion.
                            For your product or name to create a major edge in the competitive
                        </p>
                    </a>

                </div>

            </div>
        </div>

    </section>
    @include('includes.brand_shop')
    <section class="client">
        <div class="container">
        <h3 class="text-center">Trusted By 100+ Businesses</h3>
        <div class="row">

        </div>
        </div>
    </section>
    <section class="pt-5">
        <div class="container mt-5 mb-5">
            <h3 class="text-center mt-5">Blog</h3>
            <div class="row mt-5">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                    <img src="{{$post->photo ? $post->photo->path:'images/cerve logo.png'}}" class="img-fluid">

                <h4>{{$post->title}}</h4>
                </div>
                    @endforeach
                    @endif
            </div>
            <div class="text-center mt-5">
                <a href="#" title="Brand Shop" class="btn btn-primary">Read More from Our Blog</a>
            </div>
            </div>
    </section>
@endsection
