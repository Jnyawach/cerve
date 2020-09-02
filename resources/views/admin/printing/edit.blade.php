@extends('layouts.cerve_admin')
@section('title','Edit Project')
@section('content')
    @include('includes.editor')
    <section id="printing" class="mt-5 container">
        <h3 class="text-center mb-5">Submit your project for printing</h3>
        {!!Form::model($project,['method'=>'PATCH', 'action'=>['PrintOnDemandController@update',$project->id], 'class' =>'mb-5','files'=>true])!!}

        <div class="form-group row">
            <div class="col-sm-3 col-md-1 col-lg-1">
                {!!Form::label('title', 'TITLE:')!!}
            </div>
            <div class="col-sm-9 col-md-11 col-lg-11">
                {!!Form::text('title', null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col-md-2 col-lg-2">
                {!!Form::label('brand_id', 'PRINTING TYPES:')!!}
            </div>
            <div class="col-sm-9 col-md-10 col-lg-10">
                {!!Form::select('brand_id',[''=>'Choose Category']+$branding, null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col-md-2 col-lg-2">
                {!!Form::label('status', 'STATUS:')!!}
            </div>
            <div class="col-sm-9 col-md-10 col-lg-10">
                {!!Form::select('status',[''=>'Choose Category',0=>'Active',
                1=>'Processing', 2=>'completed',3=>'Cancel'], null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('description', 'DESCRIPTION:')!!}
            {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'description-print'])!!}
        </div>
        <p class="text-danger">So that we can serve you better attain high print quality we recommend that you
            submit vector files such as PDF, SVG, EPS, CDR or AI.</p>

        <div class="form-group">
            {!!Form::label('artwork_id', 'ARTWORK:')!!}
            {!!Form::file('artwork_id')!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Edit Project', ['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </section>
    <div>
        @include('includes.form_error')
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description-print', );
    </script>
@endsection
