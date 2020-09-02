@extends('layouts.cerve')
@section('title', 'Reviews')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="far fa-comment-alt mr-3"></i>Reviews  </h6>
                    <div class="card-body">
                        @if(Session::has('rating_message'))
                            <p class="text-success">{{session('rating_message')}}</p>
                        @endif
                        <div class="row">
                            @if($reviews->count()>0)
                                @foreach($reviews as $review)

                                    <div class="col-sm-4 col-md-4 col-lg-2 mt-2">
                                        <a href="{{route('brand-shop.show', $review->product->slug)}}" title="View Product">
                                            <img src="{{url('images/'. json_decode($review->product->path)[0] )}}" alt="{{$review->product->name}}" title="{{$review->product->name}}" class="img-fluid" style="height: 100px">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-10">
                                        <h6>{{$review->product->name}}</h6>
                                        <h5 >
                                            @if($reviews->count()>0)
                                                @for($i = 0; $i < 5; $i++)
                                                    <span><i class="fa fa-star{{$reviews->sum('rating')/$reviews->count()  <= $i ? '-o' : '' }}"></i></span>
                                                @endfor

                                            @else
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            @endif
                                            Based on {{$reviews->count()}} Reviews</h5>
                                        <p>{{$review->comment}}</p>

                                        <div class="w-100 ">
                                            <a href="{{route('brand-shop.show', $review->product->slug)}}" class="btn btn-primary">Buy Again KES {{$review->product->price}}</a>
                                            {!!Form::open(['method'=>'DELETE', 'action'=>['ReviewController@destroy',$review->id],'class'=>'float-right ml-5'])!!}
                                            <div class="form-group">
                                                <button type="submit" class="btn text-danger"><i class="far fa-trash-alt mr-2"></i>Delete</button>
                                            </div>
                                            {!!Form::close()!!}
                                        </div>
                                        <hr>
                                    </div>


                                @endforeach
                            @else
                                <h4 class="text-center">You have never reviewed a product</h4>
                            @endif
                        </div>


                    </div>
                    <div class="card-footer">
                        {{$reviews->links()}}
                    </div>
            </div>


                </div>

        </div>
    </section>
@endsection
