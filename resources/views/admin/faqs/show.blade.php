@extends('layouts.cerve_admin')
@section('title', 'Frequently Asked Question')
@section('content')
    <section>
        @include('includes.faq_menu')
        @if(Session::has('policy_message'))
            <p class="text-success">{{session('policy_message')}}</p>
        @endif
        <h3>Frequently Asked Questions</h3>
        <div class="row">
            @if($faqs->count()>0)

                @foreach($faqs as $faq)
                    <div class="col-12 mx-auto">
                        <div class="accrodion-regular">
                            <div id="accordion3">
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven{{$faq->id}}" aria-expanded="true" aria-controls="collapseSeven">
                                                <span class="fas fa-angle-down mr-3"></span>{{$faq->question}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven{{$faq->id}}" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3">
                                        <div class="card-body">
                                            <p class="lead"> {!! $faq->answer !!}</p>

                                            <div class="row">
                                                <div class="col-2">
                                                    <a class=" btn btn-primary" href="{{route('faqs.edit', $faq->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="col-2">
                                                    {!!Form::open(['method'=>'DELETE', 'action'=>['FaqAdminController@destroy', $faq->id]])!!}
                                                    <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>

                                                    {!!Form::close()!!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <h4>There is no data available</h4>
            @endif

        </div>
    </section>
@endsection
