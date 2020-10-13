@extends('layouts.cerve')
@section('title', 'Payment')
@section('styles')
    <script src="https://js.stripe.com/v3/"></script>
    @endsection
@section('content')
    <section class="container checkout mb-5">
        <div class="row mt-5">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Payment</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <h3>BILL TO</h3>
                                <p>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}<br>
                                {{Auth::user()->cellphone}}<br>
                                    {{Auth::user()->street}},
                                    {{Auth::user()->town}} </p>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <h3>SHIP TO</h3>
                                <p>N/A</p>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 justify-content-end">
                                <h3>INVOICE</h3>
                                <p>Ref No: 234567</p>
                            </div>

                        </div>
                        <hr class="broken">
                        <table class="table mt-5 mb-5 table-responsive" >
                            <thead class="thead thead-light">
                            <tr>
                                <th scope="col"><h4 class="p-0 m-0">Quantity</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Description</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Printing(KES)</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Unit Price(KES)</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Total Price(KES)</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Total Printing(KES)</h4></th>
                                <th scope="col"><h4 class="p-0 m-0">Amount(KES)</h4></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::session(Auth::id())->getContent() as $item)
                            <tr>

                                <td class="font-bold">{{$item->quantity}}</td>
                                <td class="font-bold">{{$item->model->name}}</td>
                                <td class="font-bold">{{number_format($item->attributes->printing, 2)}}</td>
                                <td class="font-bold">{{number_format($item->price, 2)}}</td>
                                <td class="font-bold">{{number_format($item->getPriceSum(), 2)}}</td>
                                <td class="font-bold">{{number_format($item->attributes->totalPrinting, 2)}}</td>
                                <td class="font-bold">{{number_format( $item->getPriceSumWithConditions(),2)}}</td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <hr class="broken">
                        <h5 class="bg-light p-3">Summary</h5>
                        <table class="w-100">
                            <tbody>
                            <tr>
                                <td><h5>Shipping</h5></td>
                                <td><h6>0.00</h6></td>
                            </tr>
                            <tr>
                                <td><h5>Tax(16%)</h5></td>
                                <td><h6>0.00</h6></td>
                            </tr>
                            <tr>
                                <td><h5>Sub Total (KES)</h5></td>
                                <td><h6>{{number_format(Cart::session(Auth::id())->getSubTotal(),2)}}</h6></td>

                            </tr>
                            <tr>
                                <td><h5>Total (KES)</h5></td>
                                <td><h6>{{number_format(Cart::session(Auth::id())->getTotal(),2)}}</h6></td>
                            </tr>
                            </tbody>
                        </table>
                        <hr class="broken">
                    <h4>Payment details</h4>
                        @if($payment==1)
                        <img src="{{asset('images/mpesa_logo.png')}}" class="img-fluid" alt="Lipa Na Mpesa">
                        <h5>Lipa Na Mpesa{{$payment}}</h5>
                        <ol>
                            <li>Go to M-PESA on your phone</li>
                            <li>Select Lipa Na Mpesa</li>
                            <li>Select Buy Goods and Services</li>
                            <li>Enter the Amount {{number_format(Cart::session(Auth::id())->getTotal(),2)}}</li>
                            <li>Enter your M-PESA PIN and send</li>
                            <li>You will receive a confirmation message from M-PESA</li>
                        </ol>
                        <h6>Enter the transaction code the press complete</h6>
                        {!!Form::open(['method'=>'POST', 'action'=>'PaymentController@store','class'=>'form-inline'])!!}
                        <div class="form-group">
                            {!! Form::hidden('amount',Cart::session(Auth::id())->getTotal()) !!}
                            {!!Form::text('town', null, ['class'=>'form-control rounded-0'])!!}
                        </div>
                        <div class="form-group">
                            {!!Form::submit('COMPLETE', ['class'=>'btn btn-primary btn-sm ml-3'])!!}
                        </div>

                        {!!Form::close()!!}
                            @elseif($payment==2)
                            <div class="row">

                                <div class="col-5">
                                    <form>
                                        <img src="{{asset('images/351652.png')}}" class="img-fluid">
                                        <div class="form-group">
                                            <label for="name">Name on Card</label>
                                            <input type="text" class="form-control" id="name1">

                                        </div>

                                       <div class="form-group">

                                           <label>Card
                                               <div id="card-element"></div>
                                           </label>

                                           <label for="card-element">Card</label>
                                           <div id="card-element"></div>

                                           <script>
                                               cardElement.mount('#card-element');
                                           </script>
                                       </div>

                                        <button type="submit" class="btn btn-block">Complete Order</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <hr class="broken mt-3">
                        <h6 class="text-center">Cerve Limited | Keekorok Rd. Winglobal Hse| Phone:+254717109280 | Email:billing@cervekenya.com| www.cervekenya.com</h6>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
@section('scripts')

    @endsection
