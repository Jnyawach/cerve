@extends('layouts.cerve_admin')
@section('title', $product->name)
@section('content')
   <div class="card">
       <div class="card-header">
           <h4><span class="text-primary">{{$product->category->name}}</span> | {{$product->name}}<a href="{{route('products.edit', $product->id)}}" class="float-right"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Edit Product</a> </h4>
       </div>
       <div class="card-body">
           <div class="row">
               @foreach(json_decode($product->path) as $photo)

                   <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                   <img src="{{url('images/'.$photo)}}" class="img-fluid" title="{{$product->name}}">


                   </div>
                   @endforeach

           </div>
           <div class="row">
               <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                   <p>{!! $product->description !!}</p>
                   <p>{!! $product->features !!}</p>
               </div>
               <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
                   <h4>Branding Guideline</h4>
                  <p>{!! $product->brand? $product->brand:'No branding guideline provided' !!}</p>
                   @if($product->video)
                   <div>
                       <h4>Associated Video</h4>
                       <div class="embed-responsive embed-responsive-16by9">
                           <iframe class="embed-responsive-item" src="{{url($product->video->path) }}" allowfullscreen></iframe>
                       </div>
                   </div>
                       @endif
               </div>
           </div>


       </div>
       <div class="card-footer">
           <div class="row">
               <div class="col-sm-4 col-md-3 col-lg-2">
                   <h4 class=" bg-primary p-2">Available:&nbsp;{{$product->stock}}</h4>
               </div>
               <div class="col-sm-4 col-md-3 col-lg-2">
                   <h4 class=" bg-primary p-2">Price:&nbsp;{{$product->price}}</h4>
               </div>
               <div class="col-sm-4 col-md-3 col-lg-2">
                   <h4 class=" bg-primary p-2">Color:&nbsp;{{$product->color? $product->color:'N/A'}}</h4>
               </div>
               <div class="col-sm-4 col-md-3 col-lg-2">
                   <h4 class=" bg-primary p-2">Weight:&nbsp;{{$product->weight?$product->wieght:'N/A'}}kgs</h4>
               </div>
               <div class="col-sm-4 col-md-3 col-lg-2">
                   <h4 class=" bg-primary p-2">Size:&nbsp;{{$product->size?$product->size:'N/A'}}</h4>
               </div>
           </div>

       </div>
   </div>
@endsection
