@extends('layouts.cerve')
@section('title', $portfolio->title)
@section('content')
    <section>
        <div class="row">
            <div class="col-12">
                <img src="{{url('images/'. json_decode($portfolio->path)[0] )}}" class="img-fluid" title="{{$portfolio->title}}" >
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

                @foreach(json_decode($portfolio->path) as  $photo)

                    <div class="col-sm-12 col-md-4 col-lg-4">

                        <img src="{{url('images/'.$photo)}}" class="img-fluid" title="{{$portfolio->title}} " >


                    </div>

                    @endforeach
                    <div class="col-sm-10 col-md-4 col-lg-4 ">
                        @if($portfolio->video)
                            <div>

                                <div class="embed-responsive embed-responsive-16by9" data-toggle="modal" data-target="#exampleModal{{$portfolio->video_id}}">
                                    <iframe class="embed-responsive-item" src="{{url($portfolio->video->path) }}" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </section>
   
@endsection
