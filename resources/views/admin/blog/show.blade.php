@extends('layouts.cerve_admin')
@section('title', $post->title)
@section('content')
    <section>
        <div>

        </div>
        <h2>{{$post->title}}</h2>
        <img src="{{$post->photo? $post->photo->path:'images/cerve logo.png'}}" class="img-fluid ">
        <div class="d-inline-flex">
            <h4 class="mr-2">Author: {{$post->user->name}} {{$post->user->lastname}}</h4>
            <h4 class="mr-2">Created: {{$post->created_at->isoFormat('MMMM Do YYYY')}}</h4>
            <h4>Updated:{{$post->updated_at? $post->updated_at->isoFormat('MMMM Do YYYY'):'N/A'}}</h4>
        </div>
        <p >{!! $post->summary !!}</p>
        <p class="float-right">
            {!! $post->body !!}
        </p>
        <div class="row">
            <div class="col-3">
                {!!Form::open(['method'=>'DELETE','class'=>'dropdown-item', 'action'=>['BlogAdminController@destroy', $post->id]])!!}
                <button type="submit" class="btn btn-primary">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

                {!!Form::close()!!}

            </div>
            <div class="col-3">
                <a class="btn btn-outline-primary" href="{{route('blog.edit', $post->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
@endsection
