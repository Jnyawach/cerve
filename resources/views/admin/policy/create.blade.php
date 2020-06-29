@extends('layouts.cerve_admin')
@section('title', 'Add Policy')
@section('content')
    @include('includes.editor')
    <section>
        <h3>Add Policies</h3>

        <section>

            {!!Form::open(['method'=>'POST', 'action'=>'PolicyAdminController@store'])!!}



            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('category', 'Category:')!!}
                    {!!Form::select('category', array(1=>'Policy', 0=>'Terms'), null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('is_active', 'Status:')!!}
                    {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('policy', 'Policy:')!!}
                {!!Form::textarea('policy', null, ['class'=>'form-control','id'=>'policy-editor'])!!}

            </div>

            <div class="form-group">
                {!!Form::submit('Add Policy', ['class'=>'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}

            <div class="row">
                @include('includes.form_error')
            </div>
        </section>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'policy-editor', );
        </script>


    </section>
@endsection
