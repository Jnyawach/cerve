@extends('layouts.cerve')
@section('title', 'Work with us')
@section('content')
    <section class="p-5">
        <div class="row p-5 text-center show-job">
            <div class="col-10 col-md-8 col-lg-8 mx-auto">
                <h2>{{$career->title}}-{{$career->city}}</h2>
                <h5 class="text-uppercase">FULL TIME {{$career->city}},{{$career->country}}</h5>
            </div>
            <div class="col-3 col-md-3 col-lg-3 mx-auto">
                <a href="{{route('career.create')}}" class="btn btn-primary">Apply for this job</a>
            </div>
        </div>
        <div class="row job">
            <div class="col-10 col-md-8 col-lg-8 mx-auto">
                <p>{!! $career->description !!}</p>
                <p>Location:  {{$career->city}},{{$career->country}}</p>
                <a href="{{route('career.create')}}" class="btn btn-primary text-center" title="Careers">Apply for this job</a>
            </div>
        </div>
    </section>
@endsection
