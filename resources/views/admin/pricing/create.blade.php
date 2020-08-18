@extends('layouts.cerve_admin')
@section('title', 'Service Pricing')
@section('content')
    <section>
        <h4>Add Brand Guideline and Pricing</h4>
        <div class="container">
            {!!Form::open(['method'=>'POST', 'action'=>'PricingController@store'])!!}
            <div class="form-group required">
                {!!Form::label('name', 'NAME:',['class'=>'control-label'])!!}
                {!!Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('quantity_1', 'QUANTITY(1-3):',['class'=>'control-label'])!!}
                    {!!Form::text('quantity_1', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('quantity_2', 'QUANTITY(4-15):',['class'=>'control-label'])!!}
                    {!!Form::text('quantity_2', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('quantity_3', 'QUANTITY(16-PLUS):',['class'=>'control-label'])!!}
                    {!!Form::text('quantity_3', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::submit('Add Pricing', ['class'=>'btn btn-primary'])!!}
            </div>

            {!!Form::close()!!}

        </div>
        <div class="row">
            @include('includes.form_error')
        </div>
    </section>
@endsection
