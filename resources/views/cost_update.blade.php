@extends('layouts.cerve_admin')
@section('title','Add Printing Cost')
@section('content')
    <section class="container">
        @if(Session::has('print_message'))
            <p class="text-success text-center">{{session('print_message')}}</p>
        @endif
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mx-auto">
                <a href="{{route('products.show', $cost->product->slug)}}">
                <img src="{{asset($cost->product->getFirstMedia('product_photos')->getUrl('product_card'))}}" title="{{$cost->product->name}}" alt="{{$cost->product->name}}" class="img-fluid">
                </a>
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
                <h5>{{$cost->product->name}}</h5>
                <p>{!! $cost->product->brand !!}</p>
            </div>
        </div>
        <hr class="broken">
        {!!Form::model($cost,['method'=>'PATCH', 'action'=>['ProductAdminController@costUpdated',$cost->id]])!!}
        <h4>Printing types</h4>
        {!! Form::hidden('product_id', $cost->product_id) !!}

            <div class="form-group">
                {!!Form::label('name', 'Printing type:')!!}
                {!!Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
        <div class="form-group row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                {!!Form::label('cost_1', 'Price(1-3):')!!}
                {!!Form::text('cost_1', null, ['class'=>'form-control'])!!}
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                {!!Form::label('cost_2', 'Price(4-15):')!!}
                {!!Form::text('cost_2', null, ['class'=>'form-control'])!!}
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                {!!Form::label('cost_3', 'Price(16-50):')!!}
                {!!Form::text('cost_3', null, ['class'=>'form-control'])!!}
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                {!!Form::label('cost_4', 'Price(50+):')!!}
                {!!Form::text('cost_4', null, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::submit('Create Price', ['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </section>
@endsection

