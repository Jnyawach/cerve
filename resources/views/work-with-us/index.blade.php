@extends('layouts.cerve')
@section('title', 'Work with Us')
@section('content')
    <section>
        <div class="row text-center starter p-5">
            <div class="col-8 col-md-8 col-lg-8 mx-auto">

                <h1>Love Cerve?</h1>
                <h1>Guess What! You will fit right in!</h1>
                <p class="mt-4">We’re looking for dedicated, creative people to
                    join us in making Cerve even better. Is that you?</p>
                <a href="#target" class="btn btn-primary mt-4" title="Careers">View Openings</a>
            </div>
        </div>
        <div class="row ">
            <div class="col-8 col-md-8 col-lg-8 mx-auto why m-4 ">
                <h2 class="text-center">Why work with us?</h2>
                <p >At Cerve, our most valuable resource is our people,
                    A diversity of background, ideas, options, and life experiences. We are
                    open to ideas and taking risks because all this is learning and mastery.
                    Besides, it is  an opportunity to be yourself and impact the lives of other
                    millions
                </p>
            </div>

        </div>

    </section>
    <section class="team ">
        <img src="{{asset('images/nairobi-skyline.png')}}" class="img-fluid">
        <div class="row m-4 p-5">

            <div class="col-8 col-md-5 col-lg-5 mx-auto">
                <h2 class="text-center">Work as a team in Nairobi</h2>
            </div>
            <div class="col-8 col-md-5 col-lg-5 mx-auto">
                <p class="text-justify">Team Cerve is only just over a ten people — still a
                    tight-knit group, considering everything that’s happened so far.
                    Every day brings new challenges, and every day we work together to meet them.
                    (We also have plenty of fun together: hack days, happy hours,
                    trips, workshops, movies, lunches, and a lot of laughing.)</p>
            </div>
        </div>
    </section>
    <section class="p-5">
        @if($careers->count()>0)
            <div class="row " id="target">

                <div class="col-8 col-md-8 col-lg-8 ">
                    <h2 >Current Openings</h2>
                    @foreach($careers as $index=>$career)
                        <div >
                            <a href="{{route('work-with-us.show', $career->slug)}}" class="brand" title="click to view opening"> {{$index+1}}.&nbsp;&nbsp;{{$career->title}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h2>There are no openings currently!</h2>
        @endif
    </section>
@endsection

