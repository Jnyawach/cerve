@extends('layouts.cerve_admin')
@section('title', $project->title)
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12 mx-auto">

                <h3>{{$project->title}}</h3>
                <h6>{{$project->user->name}}&nbsp;{{$project->user->lastname}}</h6>
                <p class="text-success">
                    @if($project->status==0)
                       Pending
                @elseif($project->status==2)
                    class="text-info">Completed
                @elseif($project->status==3)
                   Cancelled
                @else
                    Processing
                    @endif
                </p>
                <h6>{{$project->created_at->isoFormat('MMMM Do YYYY')}}</h6>
                <p>{!! $project->description !!}</p>
                <a href="{{ asset($project->artwork->path) }}" class="btn btn-primary" >View artwork</a>
           <div class="mt-4">
               {!!Form::open(['method'=>'DELETE', 'action'=>['AdminPrintOnDemandController@destroy', $project->id]])!!}
               <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

               {!!Form::close()!!}
           </div>

            </div>
        </div>

    </section>

@endsection
