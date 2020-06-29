@extends('layouts.cerve_admin')
@section('title','Edit Project')
@section('content')
    @include('includes.editor')
    <section>
        <h3>App Project to Portfolio</h3>
        {!!Form::model($portfolio,['method'=>'PATCH', 'action'=>['PortfolioAdminController@update', $portfolio->id],'files'=>true,])!!}
        <div class="form-group">
            {!!Form::label('title', 'TITLE:')!!}
            {!!Form::text('title', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('client', 'CLIENT:')!!}
            {!!Form::text('client', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-6 col-lg-6">
                {!!Form::label('category_id', 'Category:')!!}
                {!!Form::select('category_id',[''=>'Choose Category']+$category, null, ['class'=>'form-control'])!!}

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('is_active', 'Status:')!!}
                {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('description', 'DESCRIPTION:')!!}
            {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'description-editor'])!!}

        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('portfolio_id', 'PORTFOLIO IMAGE:')!!}
                {!!Form::file('portfolio_id[]',  ['class'=>'form-control-file', 'multiple'=>'multiple'])!!}
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('video_id', 'ASSOCIATED VIDEO:')!!}
                {!!Form::file('video_id',  ['class'=>'form-control-file'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::submit('Update Portfolio', ['class'=>'btn btn-primary'])!!}
        </div>



        {!!Form::close()!!}

        <div class="row">
            @include('includes.form_error')
        </div>
    </section>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description-editor', );
    </script>
@endsection

