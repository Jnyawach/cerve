@extends('layouts.cerve_admin')
@section('title','Edit Post')
@section('content')
    @include('includes.editor')

    <h3>Create Posts</h3>

    <section>

        {!!Form::model($post,['method'=>'PATCH', 'action'=>['BlogAdminController@update', $post->id],'files'=>true])!!}


        <div class="form-group">
            {!!Form::label('title', 'Title:')!!}
            {!!Form::text('title', null, ['class'=>'form-control'])!!}

        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('photo_id', 'File:')!!}
                {!!Form::file('photo_id', null, ['class'=>'form-control-file'])!!}
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('is_active', 'Status:')!!}
                {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('summary', 'Summary:')!!}
            {!!Form::textarea('summary', null, ['class'=>'form-control','id'=>'text-editor'])!!}

        </div>
        <div class="form-group">
            {!!Form::label('body', 'Body:')!!}
            {!!Form::textarea('body', null, ['class'=>'form-control','id'=>'article-editor'])!!}

        </div>
        <div class="form-group">
            {!!Form::submit('Update Post', ['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}

        <div class="row">
            @include('includes.form_error')
        </div>
    </section>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'text-editor', );
    </script>

    <script>
        CKEDITOR.replace( 'article-editor', );
    </script>

@endsection

