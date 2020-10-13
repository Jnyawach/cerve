@extends('layouts.cerve')
@section('title', 'Orders')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Number: {{$order->id}}</h5>
                    </div>
                    <div class="card-body">
                        @foreach(json_decode($order->cart_data) as $item)
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset($photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')? $photo=\App\Product::findOrFail($item->id)->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}"
                                         alt="{{$item->name}}" class="img-fluid" >
                                </div>
                                <div class="col-9">
                                    <h5>{{$item->name}}</h5>
                                    <h6>Quantity:{{$item->quantity}}</h6>
                                    <h6>Printing Guideline</h6>
                                    @if($item->attributes->printDescription)
                                        <p>{!! $item->attributes->printDescription !!}</p>
                                    @if($item->attributes->printArtwork)
                                            <a href="{{asset($item->attributes->printArtwork)}}" class="btn btn-primary" >View artwork</a>
                                        @endif

                                    @else

                                        <p>Not Available</p>
                                        @endif
                                </div>
                            </div>

                            <hr class="broken">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
