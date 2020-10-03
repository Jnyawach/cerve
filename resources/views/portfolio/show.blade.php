@extends('layouts.cerve')
@section('title', $portfolio->title)
@section('content')
    <section>
        <div class="row">
            <div class="col-12 mx-auto">
                <img src="{{asset($portfolio->getFirstMedia('portfolio_photos')->getUrl())}}" class="img-fluid" title="{{$portfolio->title}}" >
            </div>
        </div>
    </section>
    <section class="portfolio">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-8 mx-auto text-center">
                    <h5 class="text-uppercase">{{$portfolio->created_at->isoFormat('MMMM Do YYYY')}}</h5>
                    <h2 class="mt-5">{{$portfolio->title}}</h2>
                    <h5 class="text-uppercase">{{$portfolio->client}}</h5>
                    <p class="text-left">{!! $portfolio->description !!}</p>
                </div>
            </div>
            <div class="row p-5">

                @foreach($photos as $photo)

                    <div class="col-sm-12 col-md-4 col-lg-4">

                        <img src="{{asset($photo->getUrl())}}" class="img-fluid" title="{{$portfolio->title}} " >


                    </div>

                    @endforeach
                    <div class="col-sm-10 col-md-4 col-lg-4 ">
                        @if($portfolio->getFirstMedia('video_id')->getUrl())
                            <div>

                                <div class="embed-responsive embed-responsive-16by9" data-toggle="modal" data-target="#exampleModal{{$portfolio->video_id}}">
                                    <iframe class="embed-responsive-item" src="{{asset($portfolio->getFirstMedia('video_id')->getUrl()) }}" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </section>

@endsection
