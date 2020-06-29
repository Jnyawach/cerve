@extends('layouts.cerve_admin')
@section('title', 'Edit Product')
@section('content')
    <section>
        <h4>{!! $product_header='Edit Products' !!}</h4>
        @include('includes.product_menu')
        @include('includes.editor')

        <div class="mt-5">
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
            <div class="form-group">
                {!!Form::label('brand', 'HOW TO BRAND THIS PRODUCT:')!!}
                {!!Form::textarea('brand', null, ['class'=>'form-control','id'=>'brand-editor'])!!}

            </div>
            <div class=" form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('price', 'PRICE:')!!}
                    {!!Form::text('price', null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('stock', 'IN STOCK:')!!}
                    {!!Form::text('stock', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('product_id', 'PRODUCT IMAGE:')!!}
                    {!!Form::file('product_id[]',  ['class'=>'form-control-file', 'multiple'=>'multiple'])!!}
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('video_id', 'ASSOCIATED VIDEO:')!!}
                    {!!Form::file('video_id',  ['class'=>'form-control-file'])!!}
                </div>


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

