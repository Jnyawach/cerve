@extends('layouts.cerve_admin')
@section('title', $job->title)
@section('content')
    @include('includes.jobs_menu')
    <section>
        <div class="m-3">
            <h3>{{$job->title}}</h3>
            <div class="p-3" style="background: white; border-left: 5px solid #0E0C28">
                <h4>Posted On: {{$job->created_at->isoFormat('MMMM Do YYYY')}}<br>
                Active Until: {{$date = \Carbon\Carbon::createFromFormat('Y-m-d', $job->duration)->isoFormat('MMMM Do YYYY')}}<br>
                Total Applicants: 15</h4>
                <div class="row">
                    <div class="col-2">
                    <a class="btn btn-primary" href="{{route('jobs.edit', $job->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
                </div>
                <div class="col-3">
                    {!!Form::open(['method'=>'DELETE', 'action'=>['JobAdminController@destroy', $job->id]])!!}
                    <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>
                </div>
                    {!!Form::close()!!}
                </div>
            </div>
            <p>{!! $job->description !!}</p>
        </div>
    </section>
@endsection
