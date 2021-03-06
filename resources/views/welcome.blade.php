@extends('layouts.cerve')
@section('title', 'Discover The New Ways
To Craft Your Visibility')
@section('styles')

    @endsection
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
    <section class="p-5 how-it">
        <h3 class="text-center mt-5">HOW IT WORKS</h3>
        <div class="row mt-5 mb-5">
            <div class="col-10 col-sm-10 col-md-3 col-lg-3 mx-auto how-box mt-5">
                <img src="{{asset('images/how-01.png')}}" class="img-fluid">
                <h5 class="text-center">SELECT A PRODUCT</h5>
                <p class="text-center">Sign Up Or Login. Go to Brand shop and select a product.
                Upload the design you that you want to be printed. Submit printing guidelines</p>

            </div>

            <div class="col-10 col-sm-10 col-md-3 col-lg-3 mx-auto how-box mt-5">
                <img src="{{asset('images/how-02.png')}}" class="img-fluid">
                <h5 class="text-center">PLACE AN ORDER AND PAY</h5>
                <p class="text-center">Enter the quantity you want. Choose between delivering to your doorstep or
                picking up from our offices. place an order then pay.</p>

            </div>

            <div class="col-10 col-sm-10 col-md-3 col-lg-3 mx-auto how-box mt-5">
                <img src="{{asset('images/how-03.png')}}" class="img-fluid">
                <h5 class="text-center">PRINTING AND DELIVERY</h5>
                <p class="text-center">
                    Our team will get started on your
                    order immediately. Once done you will
                    either pick the item from our offices or have it delivered to you
                </p>

            </div>
        </div>
    </section>

    <section class="client p-1">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 mx-auto my-auto">
                    <h3 class="text-center">Trusted By 100+ Businesses</h3>
                </div>


                <div class="col-3 col-sm-3 col-md-2 col-lg-2 mxt-auto">
                    <img src="{{asset('images/our_clients_03.png')}}" alt="GSM Systems"class="img-fluid" >
                </div>

                <div class="col-3 col-sm-3 col-md-2 col-lg-2 mxt-auto">
                    <img src="{{asset('images/our_clients_08.png')}}" alt="Upstyle"class="img-fluid" >
                </div>

                <div class="col-3 col-sm-3 col-md-2 col-lg-2 mxt-auto">
                    <img src="{{asset('images/our_clients_07.png')}}" alt="Rig"class="img-fluid" >
                </div>

                <div class="col-3 col-sm-3 col-md-2 col-lg-2 mxt-auto">
                    <img src="{{asset('images/our_clients_10.png')}}" alt="Resolution Insurance" class="img-fluid" >
                </div>

            </div>
        </div>
    </section>
   <section class="port-serve">
       <div class="row">
               <div class="col-sm-10 col-md-11 col-lg-8">
                   <h6 >Design, Printing, Branding & Many more</h6>
                   <p>Cerve has got all it takes to help you grow your business. In print
                   is a  means of speech. We ensure that you speak to everyone from all corners.
                       we protect brands against the economic and cultural elements . Bright ideas guide us,
                       they are lifeblood of our business and we take pride in crafting
                       and shaping the the brightest ideas into memorable and valuable brands</p>

               </div>
               <div class="col-sm-11 col-md-4 col-lg-4 mx-auto  my-auto">
                   <a href="{{route('portfolio')}}" class="btn btn-primary m-2 ">See Portfolio<i class="fa fa-long-arrow-right ml-5" aria-hidden="true"></i></a>
               </div>
           </div>
           <div class="row mt-5 services">
               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-05.png')}}" alt="Brand Shop" class="img-fluid" >
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Design</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Meet the best and experienced graphic designers to help you steer the course.
                               Highly optimized designs to produce the best quality printing.</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-02.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Printing</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Every detail matters, every pixel is worth it.
                               High-quality pocket-friendly printing.
                               We ensure the right on-time delivery.</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
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

               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-01.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Web development</h5>
                               <hr class="float-left" >
                           </div>

                           <p> Online presence is one of the key generators of revenue for an organization. We get you out there in style and ensure that you
                               utilize all the resources to stimulate your growth.</p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
                   <div class="row">
                       <div class="col-2">
                           <img src="{{asset('images/service-03.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Brand shop</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Lots of amazing products-unique custom print waiting for you.
                               Find out what you need for your next project.
                           </p>

                       </div>
                   </div>
               </div>

               <div class="col-sm-11 col-md-4 col-lg-4 mt-3 mx-auto">
                   <div class="row pb-5">
                       <div class="col-2">
                           <img src="{{asset('images/service-04.png')}}" alt="Brand Shop" class="img-fluid">
                       </div>
                       <div class="col-9">
                           <div class="position-relative mb-5">
                               <h5 class="p-0 m-0">Print on demand</h5>
                               <hr class="float-left" >
                           </div>

                           <p>Requesting for samples? Or you want your next print project
                               done? Submit your artwork and guidelines
                           </p>

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
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mx-auto">
                    <div class="card">


                    <a href="{{route('post', $post->slug)}}" title="{{$post->slug}}">
                    <img src="{{asset($post->getFirstMedia('blog_photo')->getUrl('blog_card'))}}" class="img-fluid">

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
    <section class="choose pt-5 pb-5">
        <div class="row pt-4 pb-4">
                <div class="col-12 mx-auto text-center">
                    <h1 class="m-4">Choose a better way to communicate</h1>
                    <a href="{{route('print-on-demand.index')}}" class="btn btn-light m-2">SUBMIT A PROJECT</a>
                    <a href="{{route('contact-us.index')}}" class="btn btn-outline-light m-2">CONTACT SALES</a>
                </div>
            </div>



    </section>
@endsection
@section('scripts')


@endsection
