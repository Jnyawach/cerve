@extends('layouts.cerve')
@section('title','Cerve Blog')
@section('content')
    <section>
        <div class="container">
            <div class="row mt-5">
            <div class="col-10 col-md-8 col-lg-8 mx-auto" >
                <div class="post-header">
                    <h2>{{$post->title}}</h2>
                    <img height="50px" class="img-fluid" src="{{$post->photo ? $post->photo->path: '/images/person.jpg'}}" alt="Post photo">

                    <h5>By <span>{{$post->user->name}}  {{$post->user->lastname}}</span> on {{$post->created_at->isoFormat('dddd, MMMM Do YYYY')}} </h5>

                </div>
                <div class="summary">

                    <p>{!! $post->summary !!}</p>
                </div>
                <div class="blog">
                    <p>{!! $post->body !!}</p>
                </div>
                    <hr>
                <div class="comments">
                    <h4>COMMENTS </h4>
                    <div class="leave-comment p-4">
                        <div id="disqus_thread"></div>

                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://cerve-2.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <script id="dsq-count-scr" src="//cerve-2.disqus.com/count.js" async></script>

                    </div>

                </div>
             </div>

                <div class="col-10 col-md-4 col-lg-4 mx-auto" >
                    <h2 class="text-center">Recent from the Blog</h2>
                    @if($blogs->count()>0)
                        @foreach($blogs as $blog)
                            <a href="{{route('post', $blog->slug)}}" title="{{$blog->title}}">
                                <img src="{{$post->photo? $post->photo->path:'images.cerve logo.png'}}" class="img-fluid">

                            </a>
                            <h4>{{$blog->title}}</h4>
                        @endforeach
                    @else
                        <h3 class="text-center">There are no posts to be displayed</h3>
                    @endif



                </div>
            </div>
        </div>
    </section>
    <section class="shop text-center P-5">
        <h3>Brand Shop</h3>


        @if($products->count()>0)

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">


                <div class="carousel-inner" role="listbox">

                    @foreach($products->chunk(4) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">

                                @foreach( $chunk as $product )
                                    <div class="col-5 col-md-3 col-lg-3 mx-auto text-center">
                                        <a href="#" title="{{$product->slug}}">
                                            <div class="text-center">  <img height="50px" class="img-fluid m-2" src="{{$product->photos->first() ? $product->photos->first()->path: '/images/person.jpg'}}" alt="{{$product->name}}" style="height: 200px"></div>

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
                                        </a>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        @endif
        <a href="#" title="Brand Shop"><h4>Discover More Products<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></h4></a>
    </section>
    @include('includes.subscribe')
@endsection
