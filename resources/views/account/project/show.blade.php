@extends('layouts.cerve')
@section('title','Review Application')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="far fa-newspaper mr-3"></i> Print On Demand </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h6>{{$project->title}}</h6>
                                <p class="text-success">Delivered</p>
                                <h6>{{$project->created_at->isoFormat('MMMM Do YYYY')}}</h6>
                                <p>Printing type: {{$project->brand->name}}</p>
                                <p>{!! $project->description !!}</p>
                                <a href="{{ asset($project->artwork->path) }}" class="btn btn-primary" >View artwork</a>
                            </div>

                        </div>


                    </div>
                    <div class="card-footer">

                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection

