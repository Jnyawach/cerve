@extends('layouts.shop')
@section('title','Checkout')
@section('content')
    <section>
        @if(Session::has('checkout_message'))
            <p class="text-danger">{{session('checkout_message')}}</p>
        @endif
        <div class="row mt-4">
            <div class="col-sm-10 col-md-7 col-lg-7 mx-auto mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm ">
                            <div class="card-header  " >
                                <h6>1. Address Details</h6>
                            </div>
                            <div class="card-body" >
                                <div class="row">
                                    <div class="col-sm-12 col-md-8 col-lg-8 mx-auto m-2 ">
                                        <h6>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</h6>
                                        <h5 class="p-0">{{Auth::user()->email}},CBD-Nairobi Kenya</h5>
                                        <h5 class="p-0">+254717109280</h5>
                                        <h5></h5>

                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 mx-auto">
                                        <a href="{{route('profile.edit',Auth::id())}}" class="btn btn-primary"><i class="fas fa-pen mr-2"></i>Change</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-sm mt-2 ">
                            <div class="card-header  " >
                                <h6>2. Delivery Method & Payment</h6>
                            </div>
                            <div class="card-body" >
                                <div class="row">
                                    @include('includes.form_error')
                                </div>
                                <div class="row">
                                    <div class="col-12 mx-auto m-2 ">
                                        {!!Form::open(['method'=>'POST', 'action'=>'CheckoutController@store'])!!}

                                        <div class="form-check-inline">
                                            <input class="form-check-input d-block" type="radio" name="shipping" id="shipping" value="1" style="height:20px; width:20px; vertical-align: middle;" required>
                                            <label class="form-check-label " for="shipping">  <h5 class="p-0 m-0">Pick Up at Cerve Offices</h5></label>

                                        </div>
                                        <p>Winglobal Hse. Keekorok Rd. Nairobi</p>
                                        <div class="form-check-inline">
                                            <input class="form-check-input d-block" type="radio" name="shipping" id="shipping1" disabled value="2" style="height:20px; width:20px; vertical-align: middle;" required>
                                            <label class="form-check-label" for="shipping1">  <h5 class="p-0 m-0">Local Delivery</h5></label>

                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset('images/wells_fargo.jpg')}}" class="img-fluid" style="height: 50px">
                                            <p>Wells Fargo <span class="text-danger"> Not available now</span></p>

                                        </div>
                                        <hr>
                                        <h3>Payment Method</h3>
                                        <h6>How do you want to pay for you order?</h6>
                                        <div class="form-check-inline">
                                            <input class="form-check-input d-block" type="radio" name="payment" id="exampleRadios1" value="1" style="height:20px; width:20px; vertical-align: middle;" required>
                                            <label class="form-check-label" for="exampleRadios1">
                                               <img src="{{asset('images/mpesa_logo.png')}}"class="img-fluid" alt="Mpesa">
                                            </label>
                                        </div>

                                        <div class="form-check-inline">
                                            <input class="form-check-input d-block" type="radio" name="payment" id="exampleRadios2" value="2" style="height:20px; width:20px; vertical-align: middle;" required>
                                            <label class="form-check-label" for="exampleRadios2">
                                               Bank Transfer
                                            </label>
                                        </div>

                                        <div class="form-group row mt-5">
                                            <div class="col-sm-5 m-2">
                                                <a href="{{route('cart.index')}}" class="btn btn-primary">Back to Cart</a>
                                            </div>
                                            <div class="col-sm-5 m-2">
                                                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                                            </div>
                                        </div>
                                        {!!Form::close()!!}



                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto mt-2">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto ">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h6>Summary</h6>
                            </div>
                            <div class="card-body">
                                <h5>Subtotal<span class="float-right">KES {{number_format(Cart::session(Auth::id())->getSubTotal(),2)}}</span></h5>
                                <h5> Delivery & Handling<span class="float-right">KES 00</span></h5>
                                <h5> Tax(16%)<span class="float-right">KES {{number_format(0,2)}}</span></h5>
                                <hr>
                                <h5>Total<span class="float-right">KES {{number_format(Cart::session(Auth::id())->getTotal(),2)}}</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto mt-2">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h6>In my Cart ({{Cart::session(Auth::id())->getContent()->count()}})</h6>
                            </div>
                            <div class="card-body">
                                @foreach(Cart::session(Auth::id())->getContent() as $item)
                                    <div class="row">
                                        <div class="col-sm-3 col-md-4 col-lg-4">
                                            <img src="{{asset($item->model->getFirstMedia('product_photos')?$item->model->getFirstMedia('product_photos')->getUrl('product_card'):'/images/no-image.png')}}" alt="#" title="#" class="img-fluid">
                                        </div>
                                        <div class="col-sm-7 col-md-8 col-lg-8">

                                            <h6 style="font-size: 14px">{{$item->model->name}}</h6>
                                            <h5 >Quantity&nbsp;:&nbsp;{{$item->quantity}}</h5>
                                            <h5 >Size&nbsp;:&nbsp;{{$item->model->size}}</h5>
                                            <h6>KES &nbsp;{{number_format( $item->getPriceSumWithConditions(),2)}}</h6>


                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                <a href="{{route('cart.index')}}" class="btn btn-primary">Edit Cart</a>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        for (i=0; i<document.test.shipping.length; i++){
            if (document.test.shipping[i].checked !=true)
                document.test.shipping[i].disabled='true';
        }
    </script>
@endsection
