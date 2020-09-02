@extends('layouts.cerve_admin')
@section('title', 'Work with us')
@section('content')
    @include('includes.editor')

    <section>
        <h3>Add Careers For Application</h3>

        <section>

            {!!Form::model($job,['method'=>'PATCH', 'action'=>['JobAdminController@update',$job->id]])!!}


            <div class="form-group">
                {!!Form::label('title', 'Title:')!!}
                {!!Form::text('title', null, ['class'=>'form-control'])!!}

            </div>
            <div class="form-group">
                {!!Form::label('type', 'Type:')!!}
                {!!Form::select('type', array(1=>'PART TIME', 0=>'FULL TIME'), null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('town', 'Town:')!!}
                    {!!Form::text('town', null, ['class'=>'form-control'])!!}

                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('country', 'Country:')!!}
                    {!!Form::text('country', null, ['class'=>'form-control'])!!}

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('duration', 'Duration:')!!}
                    {!!Form::date('duration', null, ['class'=>'form-control-file'])!!}
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('is_active', 'Status:')!!}
                    {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('description', 'Requirements:')!!}
                {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'req-editor'])!!}

            </div>

            <div class="form-group">
                {!!Form::submit('Update Job', ['class'=>'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}

            <div class="row">
                @include('includes.form_error')
            </div>
        </section>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'req-editor', );
        </script>


    </section>
@endsection
