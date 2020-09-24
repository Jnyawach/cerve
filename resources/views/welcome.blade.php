@extends('layouts.cerve')
@section('title', 'Discover The New Ways
To Craft Your Visibility')
@section('content')

    <section class="intro  text-center p-lg-5 p-md-3 p-sm-2">
        <div class="row p-lg-5 p-md-3 p-sm-2">
            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto p-lg-5 p-md-3 p-sm-2">
                <h1  class="mt-4" style="font-size: 45px">Discover The New Ways<br> To Craft Your Visibility!</h1>
                <p style="font-size: 18px">Try Cerve Today. Grow your business with us</p>
                <a href="{{route('print-on-demand.index')}}" class="btn btn-primary m-2">Find Out More</a>
                <a href="{{route('portfolio.index')}}" class="btn btn-info m-2">See Portfolio</a>

            </div>

        </div>
    </section>

    <section class="client p-3">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 mxt-auto">
                    <h3 class="text-center">Trusted By 100+ Businesses</h3>
                </div>

            </div>
        </div>
    </section>
   <section class="port-serve">
       <div  >
           <div class="row">
               <div class="col-sm-12 col-md-8 col-lg-8">
                   <h6 >Design, Printing, Branding & Many more</h6>
                   <p>Cerve has got all it takes to help you grow your business. In print
                   is a  means of speech. We ensure that you speak to everyone from all corners.
                       we protect brands against the economic and cultural elements . Bright ideas guide us,
                       they are lifeblood of our business and we take pride in crafting
                       and shaping the the brightest ideas into memorable and valuable brands</p>

               </div>
               <div class="col-sm-12 col-md-4 col-lg-4 my-auto ">
                   <a href="{{route('portfolio')}}" class="btn btn-primary float-right">See Portfolio<i class="fa fa-long-arrow-right ml-5" aria-hidden="true"></i></a>
               </div>
           </div>
           <div class="row mt-5 services">
               <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-05.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Design</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-12 col-md-4 col-lg-4 mt-3 ">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-02.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Printing</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-12 col-md-4 col-lg-4 mt-3 ">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-06.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Branding</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-01.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Web development</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-03.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Brand shop</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
                   <div class="row pb-5">
                       <div class="col-2">
                           <img src="{{asset('images/service-04.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Print on demand</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Branding is a very significant tool in product and name promotion.
                               For your product or name to create a major edge in the competitive</p>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
    @include('includes.brand_shop')

    <section class="mt-5 blog mb-5">
        <div class="container p-5">
            <h3 class="text-center" > Cerve Stories</h3>

            <div class="row mt-5">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                    <div class="card">


                    <a href="{{route('post', $post->slug)}}" title="{{$post->slug}}">
                    <img src="{{$post->photo ? $post->photo->path:'images/cerve logo.png'}}" class="img-fluid">

                <h4 class="m-3">{{$post->title}}</h4>
                    </a>
                    </div>
                </div>
                    @endforeach
                    @endif
            </div>
            </div>
        <div class="text-center">
            <a href="{{route('blog')}}" class="btn btn-outline-primary">Read More<i class="fa fa-long-arrow-right ml-5" aria-hidden="true"></i></a>
        </div>

    </section>
    <section class="choose p-5">
        <div class="container">
            <div class="row p-4">
                <div class="col-10 mx-auto text-center p-3">
                    <h1 class="m-4">Choose a better way to communicate</h1>
                    <a href="{{route('print-on-demand.index')}}" class="btn btn-light m-2">SUBMIT A PROJECT</a>
                    <a href="{{route('contact-us.index')}}" class="btn btn-outline-light m-2">CONTACT SALES</a>
                </div>
            </div>

        </div>

    </section>
@endsection
