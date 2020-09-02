@extends('layouts.cerve')
@section('title', 'Applications')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="fas fa-briefcase mr-3"></i>Jobs  </h6>
                    <div class="card-body">
                        @if(Session::has('job_message'))
                            <p class="text-success">{{session('job_message')}}</p>
                        @endif
                        <div class="row">
                            @if($jobs->count()>0)
                                @foreach($jobs as $job)
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-8 col-md-8">
                                                <h6>{{$job->career->title}}</h6>
                                            </div>
                                            <div class="col-sm-12 col-lg-4 col-md-4">
                                            <a href="{{route('career.show', $job->id)}}" title="View Application" class="btn">
                                                <i class="fa fa-link mr-2" aria-hidden="true"></i>View
                                            </a>
                                            {!!Form::open(['method'=>'DELETE', 'action'=>['CareerController@destroy',$job->id],'class'=>'float-right ml-5'])!!}
                                            <div class="form-group">
                                                <button type="submit" class="btn text-danger"><i class="far fa-trash-alt mr-2"></i>Delete</button>
                                            </div>
                                            {!!Form::close()!!}
                                            </div>
                                        </div>

                                        <hr>

                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-center">You have never applied for a job</h4>
                            @endif
                        </div>


                    </div>
                    <div class="card-footer">
                        {{$jobs->links()}}
                    </div>
                </div>


            </div>

        </div>
    </section>
@endsection

