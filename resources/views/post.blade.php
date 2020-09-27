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
    @include('includes.brand_shop')

    @include('includes.subscribe')
@endsection
