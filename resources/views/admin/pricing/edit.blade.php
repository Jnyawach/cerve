@extends('layouts.cerve_admin')
@section('title', 'Service Pricing')
@section('content')
    <section>
        <h4>Edit Brand Guideline and Pricing</h4>
        <div class="container">
            {!!Form::model($pricing,['method'=>'PATCH', 'action'=>['PricingController@update', $pricing->id]])!!}
            <div class="form-group required">
                {!!Form::label('name', 'NAME:',['class'=>'control-label'])!!}
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
                {!!Form::submit('Edit Pricing', ['class'=>'btn btn-primary'])!!}
            </div>

            {!!Form::close()!!}

        </div>
        <div class="row">
            @include('includes.form_error')
        </div>
    </section>
@endsection

