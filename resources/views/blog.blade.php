@extends('layouts.cerve')
@section('title', 'Cerve Blog')
@section('content')

    <section class="mt-5 mb-5">
        <div class="container">
            <h2 class="text-center">Blog</h2>
            <div class="row blog">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                <div class="col-sm-12 col-md-4 col-lg-4 mx-auto">
                    <a href="{{route('post', $post->slug)}}" title="{{$post->slug}}">
                    <img src="{{asset($post->getFirstMedia('blog_photo')->getUrl('blog_card'))}}" class="img-fluid">
                    </a>
                        <h4>{{$post->title}}</h4>
                    <p>{!! Illuminate\Support\Str::limit($post->body, 100) !!}</p>

                </div>
                    @endforeach
                    @else
                    <h3 class="text-center">There are no posts to be displayed</h3>
                    @endif
            </div>
        </div>
    </section>
   @include('includes.subscribe')



@endsection
