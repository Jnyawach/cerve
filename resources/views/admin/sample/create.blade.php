@extends('layouts.cerve_admin')
@section('title', 'Add Samples')
@section('content')
    <section class="container">
        {!!Form::open(['method'=>'POST', 'action'=>'AdminSampleController@store','files'=>true])!!}
          <div class="form-group row required">
              <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="form-group ">
                      {!!Form::label('title', 'TITLE:', ['class'=>'control-label'])!!}
                      {!!Form::text('title', null, ['class'=>'form-control','required'])!!}
                  </div>

              </div>
              <div class="col-sm-12 col-md-6 col-lg-6">
                  {!!Form::label('product_category_id', 'CATEGORY:')!!}
                  {!!Form::select('product_category_id',[''=>'Choose Category']+$category, null, ['class'=>'form-control'])!!}
              </div>

          </div>
        <div class="form-group">
            {!!Form::label('branded', 'BRANDED PHOTO:')!!}
            {!!Form::file('branded',  ['class'=>'form-control-file'])!!}

        </div>
        <div class="form-group">
            {!!Form::label('brand', 'HOW TO BRAND THIS PRODUCT:')!!}
            {!!Form::textarea('brand', null, ['class'=>'form-control','id'=>'brand-editor'])!!}


        </div>
        <div class="form-group">
            {!!Form::submit('ADD SAMPLE', ['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
        @include('includes.form_error')

    </section>
@endsection
