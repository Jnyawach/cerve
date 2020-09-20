@extends('layouts.cerve')
@section('title', 'Frequently Asked Questions')
@section('content')
    <div class="container mt-5">
        <h4>Get Answer about</h4>
        <div class="pills-regular shadow">
            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('faqs-panel')) ? 'active' : '' }}" id="pills-home-tab" href="{{route('faqs-panel.index')}}" role="tab" aria-controls="home" aria-selected="true">All</a>
                </li>

                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('faqs-panel/show/'.$category->id)) ? 'active' : '' }}" id="pills-home-tab" href="{{route('faqs-panel.show', $category->id)}}" role="tab" aria-controls="home" aria-selected="true">{{$category->name}}</a>
                    </li>
                @endforeach

            </ul>

        </div>
    </div>

    <div class="container">
        <div class="row mt-5 mb-5">
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
    </div>


@endsection
