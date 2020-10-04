@extends('layouts.cerve_admin')
@section('title', 'Application')
@section('content')
    <section class="container">
        <h4>{{$applicant->user->name}} {{$applicant->user->lastname}}</h4>
        <h5>{{$applicant->job->title}}</h5>
        <h6>{{$applicant->user->email}}</h6>
        <h6>{{$applicant->user->cellphone}}</h6>
        <p>{!! $applicant->letter !!}</p>
        <a href="{{$applicant->getFirstMedia('resume')->getUrl()}}" class="btn btn-primary" target="_blank">View resume</a>

    </section>
@endsection
