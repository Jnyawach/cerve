@extends('layouts.shop')
@section('title','Branding Guideline')
@section('content')
    @include('includes.editor')

    <section class="container mt-5">
        <h5 class="text-center">Printing Guideline</h5>
        @if(Session::has('cart_message'))
            <p class="text-success text-center p-2">{{session('cart_message')}}</p>

        @endif
    <hr>
        @if(Cart::session('branding')->getContent()->count()>0)
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 col-md-10 col-lg-10 mx-auto ">

                    <div class="row">
                        @foreach(Cart::session('branding')->getContent() as $cart)
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <a href="{{route('brand-shop.show', $cart->model->slug)}}">

                                <img src="{{asset($cart->model->photo? $cart->model->photo->path:'images/cerve logo.png')}}" alt="{{$cart->model->name}}" title="{{$cart->model->name}}" class="img-fluid">
                                <h6 class="mt-2">Branded sample</h6>

                            </a>
                        </div>
                            <div class="col-sm-12 col-md-9 col-lg-9 mx-auto">
                                <h4>{{$cart->model->name}}</h4>
                                @if($cart->model->category->name=='Clothing/Apparel')
                                    <table class="table" >
                                        <thead class="thead thead-light">
                                        <tr>
                                            <th scope="col"><h4 class="p-0 m-0">Image</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">S</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">M</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">L</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">XL</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Total Quantity</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                            <th scope="col"><h4 class="p-0 m-0">Color</h4></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th >
                                                <img src="{{url('images/'. json_decode($cart->model->path)[0] )}}" class="img-fluid" title="{{$cart->model->name}}" style="height: 40px" >
                                            </th>
                                            <th class="font-bold">{{$cart->attributes->small}}</th>
                                            <td class="font-bold">{{$cart->attributes->medium}}</td>
                                            <td class="font-bold">{{$cart->attributes->large}}</td>
                                            <td class="font-bold">{{$cart->attributes->extra_large}}</td>
                                            <td class="font-bold">{{$cart->qty}}</td>
                                            <th class="font-bold">{{$cart->subtotal}}</th>
                                            <td class="font-bold">
                                                <h6 class="text-capitalize">
                                                    <svg width="20" height="20">
                                                        <rect width="30" height="30" style="fill:{{$cart->model->color}};" />
                                                    </svg>&nbsp;</h6></td>
                                        </tr>


                                        </tbody>
                                    </table>

                                @else
                                <table class="table" >
                                    <thead class="thead thead-light">
                                    <tr>
                                        <th scope="col"><h4 class="p-0 m-0">Image</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Price(KES)</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">Color</h4></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <img src="{{url('images/'. json_decode($cart->model->path)[0] )}}" class="img-fluid" title="{{$cart->model->name}}" style="height: 40px" >
                                        </th>
                                        <th ><h6 class="p-0 m-0">{{$cart->quantity}}</h6></th>
                                        <th class="font-bold">{{number_format(Cart::session('branding')->getSubTotal(),2)}}</th>
                                        <td class="font-bold">
                                            <h6 class="text-capitalize">
                                                <svg width="20" height="20">
                                                    <rect width="30" height="30" style="fill:{{$cart->model->color}};" />
                                                </svg>&nbsp;</h6></td>
                                    </tr>
                                    </tbody>
                                </table>
                                @endif
                                <p>{!! $cart->model->brand !!}</p>

                                <table class="table" >
                                    <thead class="thead thead-light">
                                    <tr>
                                        <th scope="col"><h4 class="p-0 m-0">Printing Type</h4></th>
                                        <th scope="col" colspan="4"><h4 class="p-0 m-0 text-center">Pricing(KES)</h4></th>

                                    </tr>
                                    <tr>
                                        <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">1-3</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">4-15</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">16-50</h4></th>
                                        <th scope="col"><h4 class="p-0 m-0">50+</h4></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->model->costs as $cost)
                                    <tr>
                                        <th>{{$cost->name}}</th>
                                        <th >{{$cost->cost_1}}</th>
                                        <th >{{$cost->cost_2}}</th>
                                        <td >{{$cost->cost_3}}</td>
                                        <td>{{$cost->cost_4}}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                            </div>


                    </div>

                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-10 mx-auto">
                    <hr class="broken">
                    {!!Form::open(['method'=>'POST', 'action'=>'BrandingController@store','files'=>true])!!}
                    @include('includes.form_error')
                    {!! Form::hidden('product_id', $cart->model->id) !!}
                    {!! Form::hidden('name', $cart->model->name) !!}
                    {!! Form::hidden('quantity', $cart->quantity) !!}
                    {!! Form::hidden('total_price', Cart::session('branding')->getSubTotal()) !!}
                    {!! Form::hidden('price', $cart->price) !!}
                    {!! Form::hidden('small', $cart->attributes->small) !!}
                    {!! Form::hidden('medium', $cart->attributes->medium) !!}
                    {!! Form::hidden('large', $cart->attributes->large) !!}
                    {!! Form::hidden('extra_large', $cart->attributes->extra_large) !!}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">PRINTING TYPE</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="printing">

                            @foreach($cart->model->costs as $checkbox)
                                <option value="{{$checkbox->id}}">{{$checkbox->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {!!Form::label('description', 'DESCRIPTION:')!!}
                        <p class="text-danger" >Please give a detailed description on how this product should be branded. Include the placements, size and color(s)</p>
                        {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'brand-editor','required'])!!}

                    </div>
                    <p class="text-danger">So that we can serve you better attain high print quality we recommend that you submit vector files such as
                        PDF, SVG, EPS, CDR or AI.</p>
                    <div class="form-group">
                        {!!Form::label('artwork_id', 'ATTACH ARTWORK:')!!}
                        {!!Form::file('artwork_id', null, ['class'=>'form-control-file','required'])!!}

                    </div>
                    @foreach($cart->model->costs as $checkbox)

                    @endforeach


                    <p>Please note that all prices are inclusive of printing costs.
                    Additional costs may be incurred when:</p>
                    <ul>
                        <li>When the product is to be printed on places exceeding one. <a href="#" title="Request a quote" class="text-primary">Please request a quote</a> for such a case</li>
                        <li>Costs incurred during delivery-when the client requests that the product(s) be delivered to their premises</li>
                    </ul>
                    <div>
                        <h6>You don't seem to find what you are looking for?</h6>
                        <a href="#" title="Request for a quote" class="btn btn-primary" style="font-size: 11px">Contact us</a>
                        <a href="#" title="Request for a quote" class="btn btn-primary" style="font-size: 11px">Request of a quote</a>
                        <a href="#" title="Request for a sample" class="btn btn-primary" style="font-size: 11px">Request of a sample</a>
                    </div>
                    <hr class="broken">
                    <div class="form-group row">
                        <div class="col-3">
                            <a href="{{ url()->previous() }}" title="Back to Product" class="btn btn-secondary"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Back to product</a>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-info" >Proceed to Cart<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>

            </div>
            @endforeach
        @endif
    </section>
@endsection
@section('scripts')
    <script>
        CKEDITOR.replace( 'brand-editor', );
    </script>
@endsection
