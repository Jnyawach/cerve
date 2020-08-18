@extends('layouts.cerve_admin')
@section('title', 'Product Category')
@section('content')
<section>
    <div class="container">
        @if(Session::has('category_message'))
            <p class="text-success text-center">{{session('category_message')}}</p>
        @endif
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-6">
                @if($categories->count()>0)
                    <ul>
                        @foreach($categories as $index=>$category)
                    <li class="list-unstyled"><h4>{{$index+1}}.&nbsp;{{$category->name}}<a href="{{route('product-category.edit', $category->id)}}">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>
                        </h4> </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-sm-12 col-md-5 col-lg-6 mx-auto">
                {!!Form::open(['method'=>'POST', 'action'=>'ProductCategoryController@store'])!!}
                <div class="form-group">
                    {!!Form::label('name', 'Category Name:')!!}
                    {!!Form::text('name', null, ['class'=>'form-control'])!!}

                </div>

                <div class="form-group">
                    {!!Form::submit('Add Category', ['class'=>'btn btn-primary'])!!}
                </div>

                {!!Form::close()!!}
            </div>
        </div>
    </div>
</section>
@endsection
