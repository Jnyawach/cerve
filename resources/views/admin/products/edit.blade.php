@extends('layouts.cerve_admin')
@section('title', 'Edit Product')
@section('content')
    <section>
        <h4>{!! $product_header='Edit Products' !!}</h4>
        @include('includes.product_menu')
        @include('includes.editor')


        <div class="mt-5">
            <img src="{{asset($product->getFirstMedia('product_photos')? $product->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png' )}}" alt="{{$product->name}}">
            {!!Form::model($product,['method'=>'PATCH', 'action'=>['ProductAdminController@update', $product->id],'files'=>true])!!}
            <div class="form-group ">
                {!!Form::label('name', 'NAME:')!!}
                {!!Form::text('name', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('is_active', 'Status:')!!}
                {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
            </div>
            <div class=" form-group row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('category_id', 'CATEGORY:')!!}
                    {!!Form::select('category_id',[''=>'Choose Category']+$category, null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('color', 'COLOR:')!!}
                    {!!Form::text('color', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('weight', 'WEIGHT:')!!}
                    {!!Form::text('weight', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    {!!Form::label('size', 'Size:')!!}
                    {!!Form::text('size', null, ['class'=>'form-control'])!!}
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('description', 'DESCRIPTION:')!!}
                {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'description-editor'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('features', 'KEY FEATURES:')!!}
                {!!Form::textarea('features', null, ['class'=>'form-control','id'=>'key-editor'])!!}

            </div>

            <div class=" form-group row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    {!!Form::label('price', 'PRICE(1-10):')!!}
                    {!!Form::text('price', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    {!!Form::label('price_2', 'PRICE(11-30):')!!}
                    {!!Form::text('price_2', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    {!!Form::label('price_3', 'PRICE(31-50)')!!}
                    {!!Form::text('price_3', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    {!!Form::label('price_4', 'PRICE:(51+)')!!}
                    {!!Form::text('price_4', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <h4>Please add stock per size if apparel</h4>
            <div class="form-group row">

                <div class="col-sm-6 col-md-2 col-lg-2">
                    {!!Form::label('stock', 'IN STOCK:')!!}
                    {!!Form::text('stock', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    {!!Form::label('S', 'Small:')!!}
                    {!!Form::text('S', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    {!!Form::label('M', 'Medium:')!!}
                    {!!Form::text('M', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    {!!Form::label('L', 'Large:')!!}
                    {!!Form::text('L', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    {!!Form::label('XL', 'Extra-Large:')!!}
                    {!!Form::text('XL', null, ['class'=>'form-control'])!!}
                </div>

            </div>
            <div class=" form-group row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    {!!Form::label('photos', 'PRODUCT IMAGE:')!!}
                    {!!Form::file('photos[]',  ['class'=>'form-control-file', 'multiple'=>'multiple'])!!}
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    {!!Form::label('video', 'ASSOCIATED VIDEO:')!!}
                    {!!Form::file('video',  ['class'=>'form-control-file'])!!}
                </div>





            </div>
            <h4 class="mt-5">Printing Type</h4>
            <div class="form-group row">

                @foreach($printing as $pricing)
                    <div class="col-sm-12 col-md-4 col-lg-4 m-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input{{$pricing->name}}" id="customCheck1{{$pricing->name}}" name="branding_id[]" value="{{$pricing->id}}">
                            <label class="custom-control-label{{$pricing->name}}" for="customCheck1{{$pricing->name}}">{{$pricing->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                {!!Form::submit('Update Product', ['class'=>'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}
            @include('includes.form_error')

        </div>
    </section>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description-editor', );
    </script>
    <script>
        CKEDITOR.replace( 'key-editor', );
    </script>
    <script>
        CKEDITOR.replace( 'brand-editor', );
    </script>
@endsection

