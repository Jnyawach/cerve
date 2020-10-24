@extends('layouts.cerve_admin')
@section('title', $product->name)
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/css/fixedHeader.bootstrap4.css')}}">

@endsection
@section('content')
   <div class="card">
       <div class="card-header">
           <h4><span class="text-primary">{{$product->category->name}}</span> | {{$product->name}}<a href="{{route('products.edit', $product->id)}}" class="float-right"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Edit Product</a> </h4>
       </div>
       <div class="card-body">
           <div class="row">
               @foreach($photos as $photo)

                   <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                   <img src="{{asset($photo? $photo->getUrl():'/images/no-image.png')}}" class="img-fluid" title="{{$product->name}}">


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
                   @if($product->getFirstMedia('product_video')
                   )
                   <div>
                       <h4>Associated Video</h4>
                       <div class="embed-responsive embed-responsive-16by9">
                           <iframe class="embed-responsive-item" src="{{asset($product->getFirstMedia('product_video')->getUrl()) }}" allowfullscreen></iframe>
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
    <section class="container">
        <div class="card-header">
            @if(Session::has('print_message'))
                <p class="text-success text-center">{{session('print_message')}}</p>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price(1-3)</th>
                        <th>Price(4-15)</th>
                        <th>Price(16-50)</th>
                        <th>Price(50+)</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if($product->branding->count()>0)
                        @foreach($product->branding as $price)

                            <tr>
                                <td>{{$price->id}}</td>
                                <td>{{$price->name}}</td>
                                <td>{{$price->cost_1}}</td>
                                <td>{{$price->cost_2}}</td>
                                <td>{{$price->cost_3}}</td>
                                <td>{{$price->cost_4}}</td>

                            </tr>
                        @endforeach
                    @else
                        <h2>There is no printing Cost set</h2>
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price(1-3)</th>
                        <th>Price(4-15)</th>
                        <th>Price(16-50)</th>
                        <th>Price(50+)</th>

                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('datatables/js/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


@endsection
