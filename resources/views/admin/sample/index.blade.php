@extends('layouts.cerve_admin')
@section('title', 'Samples')
@section('content')
<section>
    <div class="row">
        <div class="col-sm-6 coml-md-4 col-lg-3 ">
            <a href="{{route('sample.create')}}" class="btn btn-primary">Add Sample</a>
        </div>
    </div>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
</section>
    <section>
        @if($categories->count()>0)
            <div>
                @foreach($categories as $category)
                    <h5>{{$category->name}}</h5>
                    <hr>
                <div class="row">

                        @if($category->sample->count()>0)
                            @foreach($category->sample as $sample)
                            <div class="col-4 col-sm-4 col-md-2 col-lg-2 text-center">
                                <div class="card">
                                    {!!Form::open(['method'=>'DELETE', 'action'=>['AdminSampleController@destroy', $sample->id]])!!}

                                    <img src="{{asset($sample->getFirstMedia('sample_image')?$sample->getFirstMedia('sample_image')->getUrl('sample_card'):'/images/no-image.png')}}" class="img-fluid" title="{{$sample->title}}" style="height: 80px">

                                    <div class="card-footer m-0 p-0">
                                        <button type="submit" class="btn btn-block text-danger ">Delete</button>
                                    </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                                @endforeach
                        @else
                            <p>No sample attached to this category</p>
                        @endif

                </div>


                    @endforeach
            </div>
            @else
            <h3>No Categories available to display samples</h3>
            @endif
    </section>
@endsection
