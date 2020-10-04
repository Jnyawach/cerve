@extends('layouts.cerve')
@section('title', 'Our Previous work')
@section('content')
    <section class="container mt-5">
        <h3 class="text-center">View Through Our Previous Work</h3>
        @if($portfolios->count()>0)
        <div class="row mb-5">
            @foreach($portfolios as $portfolio)
            <div class="col-sm-12 col-md-4 col-lg-4">
                <a href="{{route('previousWork', $portfolio->slug)}}" title="{{$portfolio->title}}">
                    <img src="{{$portfolio->getFirstMedia('portfolio_photos')->getUrl('portfolio_card')}}" class="img-fluid" title="{{$portfolio->title}}" >
                </a>


            </div>
                @endforeach
        </div>
            @else
            <h5 class="text-center text-info">There are no Previous work to display</h5>
            @endif
    </section>
@endsection
