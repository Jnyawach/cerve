@extends('layouts.cerve_admin')
@section('title', $portfolio->title)
@section('content')
    <div class="card">
        <div class="card-header">
            <h4><span class="text-primary">{{$portfolio->category->name}}</span> | {{$portfolio->title}}<a href="{{route('portfolio.edit', $portfolio->id)}}" class="float-right"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Edit Project</a> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($portfolio->photos as $photo)
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                        <img src="{{$photo->path? $photo->path:'images/cerve logo.png'}}" class="img-fluid">
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                    <p>{!! $portfolio->description !!}</p>

                </div>
                <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
                    @if($portfolio->video)
                        <div>
                            <h4>Associated Video</h4>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{url($portfolio->video->path) }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>
        <div class="card-footer">
            <h4>Client: {{$portfolio->client}}</h4>
        </div>
    </div>
@endsection
