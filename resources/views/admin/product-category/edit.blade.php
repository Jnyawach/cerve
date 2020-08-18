@extends('layouts.cerve_admin')
@section('title', 'Product Category')
@section('content')
    <section>
        <div class="container">
            @if(Session::has('category_message'))
                <p class="text-success text-center">{{session('category_message')}}</p>
            @endif
            <div class="row">

                <div class="col-sm-12 col-md-5 col-lg-6 mx-auto">
                    {!!Form::model($category,['method'=>'PATCH', 'action'=>['ProductCategoryController@update', $category->id]])!!}
                    <div class="form-group">
                        {!!Form::label('name', 'Category Name:')!!}
                        {!!Form::text('name', null, ['class'=>'form-control'])!!}

                    </div>

                    <div class="form-group">
                        {!!Form::submit('Edit Category', ['class'=>'btn btn-primary'])!!}
                    </div>

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </section>
@endsection

