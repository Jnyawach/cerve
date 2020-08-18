@extends('layouts.cerve_admin')
@section('title', 'Create Frequently Asked Question')
@section('content')
    @include('includes.editor')
    <section>
        <h3>Edit Frequently Asked Question</h3>
        {!!Form::model($faq,['method'=>'POST', 'action'=>['FaqAdminController@store', $faq->id]])!!}
        <div class="form-group">
            {!!Form::label('question', 'QUESTION:')!!}
            {!!Form::text('question', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group row">
            <div class="col-12 col-md-6 col-lg-6">
                {!!Form::label('category_id', 'Category:')!!}
                {!!Form::select('category_id',[''=>'Choose Category']+$category, null, ['class'=>'form-control'])!!}

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                {!!Form::label('is_active', 'Status:')!!}
                {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('answer', 'ANSWER:')!!}
            {!!Form::textarea('answer', null, ['class'=>'form-control','id'=>'description-editor'])!!}

        </div>

        <div class="form-group">
            {!!Form::submit('Update Faqs', ['class'=>'btn btn-primary'])!!}
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
