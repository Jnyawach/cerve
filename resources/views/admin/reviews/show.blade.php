@extends('layouts.cerve_admin')
@section('title','Product Review')
@section('content')
<section>
    <h4>{{$review->user->name}}&nbsp;{{$review->user->lastname}}</h4>
    <div class="rating-star mb-4 d-inline-flex">
        @for($i = 0; $i < 5; $i++)
            <span><i class="fa fa-star{{ $review->rating  <= $i ? '-o' : '' }}"></i></span>
        @endfor
        <p class="ml-3">Based on {{$review->rating}} ratings</p>
    </div>
    <p>{{$review->comment}}</p>
</section>
    <section class="mt-5">
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4 col-md-2 col-lg-3">
                <img src="{{asset($review->product->getFirstMedia('product_photos')? $review->product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" alt="{{$review->product->name}}" class="igm-fluid img-thumbnail">
            </div>
            <div class="col-6 col-sm-8 col-md-7 col-lg-7">
                <h5>{{$review->product->name}}</h5>
                <p>{!! $review->product->description !!}</p>
            </div>
        </div>
    </section>
@endsection
