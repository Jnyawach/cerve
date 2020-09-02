@extends('layouts.cerve')
@section('title', 'Work with us')
@section('content')
    <section class="p-5">
        <div class="row p-5 text-center show-job">
            <div class="col-10 col-md-8 col-lg-8 mx-auto">

                <h2>{{$career->title}}-{{$career->town}}</h2>
                <h5 class="text-uppercase" style="color: black">
                    @if($career->type==1)
                        PART TIME
                    @else
                        FULL TIME
                    @endif
                    {{$career->city}},&nbsp;{{$career->country}}</h5>
                @if($date=\Carbon\Carbon::now()<$career->duration)
                    <h5>Active until {{$date = \Carbon\Carbon::createFromFormat('Y-m-d', $career->duration)->isoFormat('MMMM Do YYYY')}}</h5>
                @else
                    <h5 class="text-danger">This position has been closed</h5>
                @endif

            </div>
            <div class="col-3 col-md-3 col-lg-3 mx-auto">
                <a href="{{route('application',$career->slug)}}" class="btn btn-primary">Apply for this job</a>
            </div>
        </div>
        <div class="row job">
            <div class="col-10 col-md-8 col-lg-8 mx-auto">
                <p>{!! $career->description !!}</p>
                <p>Location:  {{$career->city}},{{$career->country}}</p>
                <a href="{{route('application',$career->slug)}}" class="btn btn-primary text-center" title="Careers">Apply for this job</a>
            </div>
        </div>
    </section>
@endsection

