@extends('layouts.cerve')
@section('title', 'Print On demand')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="far fa-newspaper mr-3"></i> Print On Demand  </h6>
                    <div class="card-body">
                        @if(Session::has('job_message'))
                            <p class="text-success">{{session('job_message')}}</p>
                        @endif
                        <div class="row">
                            @if($projects->count()>0)
                                @foreach($projects as $project)
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-10 col-md-10">
                                                <h3>{{$project->title}}</h3>
                                                <h6>{{$project->created_at->isoFormat('MMMM Do YYYY')}}</h6>
                                                <p>Printing type: {{$project->brand->name}}</p>
                                                <p>{!! Illuminate\Support\Str::limit($project->description, 200) !!}</p>
                                                @if($project->status==1)
                                                    <p class="text-success">You cannot cancel this project</p>
                                                    @endif
                                            </div>
                                            <div class="col-sm-12 col-lg-2 col-md-2">
                                                <a href="{{route('project.show', $project->id)}}" title="View Application" class="btn">
                                                    <i class="fa fa-link mr-2" aria-hidden="true"></i>View
                                                </a>
                                                @if($project->status==0)
                                                    {!!Form::open(['method'=>'PATCH', 'action'=>['UserPrintOnDemandController@update', $project->id]])!!}
                                                    {!! Form::hidden('status', 3) !!}
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                    {!!Form::close()!!}
                                                @elseif($project->status==3)
                                                    <p class="text-danger">Cancelled</p>
                                                    @elseif($project->status==1)
                                                    <p class="text-success">Processing</p>
                                                @else
                                                    <p class="text-success">Completed</p>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>

                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-center">You have never submitted a project</h4>
                            @endif
                        </div>


                    </div>
                    <div class="card-footer">
                        {{$projects->links()}}
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection


