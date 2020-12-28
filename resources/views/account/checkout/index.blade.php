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
                                <p>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}<br>
                                    {{Auth::user()->cellphone}}<br>
                                </p>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <h3>REF NUMBER</h3>
                                <p>

                                </p>
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

                        <img src="{{asset('images/mpesa_logo.png')}}" class="img-fluid" alt="Lipa Na Mpesa">
                        <h5>Lipa Na Mpesa Cerve Limited</h5>

                        <ol>
                            <li>Go to M-PESA on your phone</li>
                            <li>Select Lipa Na Mpesa</li>
                            <li>Select Paybill</li>
                            <li>Enter Business Number:<span style="color: var(--primary); font-weight: bold">4042451</span> </li>
                            <li>Enter the Account No:<span style="color: var(--primary); font-weight: bold">{{Auth::user()->name}}</span></li>
                            <li>Enter the Amount:<span style="color: var(--primary); font-weight: bold"> {{Cart::session(Auth::id())->getTotal()}}</span></li>
                            <li>Enter your M-PESA PIN and send</li>
                            <li>You will receive a confirmation message from M-PESA</li>
                        </ol>
                        <h6>Enter the your number then press complete</h6>
                        <!--
                        This is the form that processes the payment;
                        The hidden fields will submit the amount, reference & sender phone
                        I have decided to recollect users cellphone number instead of retrieving from the
                        user model to allow for flexibility just in case someone may decide to pay from different line
                        -->
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        {!!Form::open(['method'=>'POST', 'action'=>'PaymentController@store','class'=>'form-inline'])!!}
                        <div class="form-group">
                            {!! Form::hidden('amount', 6000) !!}
                            {!! Form::hidden('user_id', Auth::id()) !!}
                            {!! Form::hidden('account_reference', Auth::user()->account) !!}

                            {!!Form::text('reference', null, ['class'=>'form-control mr-2','placeholder'=>'Enter Transaction Code','required'])!!}

                        </div>
                        <div class="form-group">
                            {!!Form::submit('Confirm', ['class'=>'btn btn-primary'])!!}
                        </div>

                        {!!Form::close()!!}

                        <hr class="broken mt-3">
                        <h6 class="text-center">Cerve Limited | Keekorok Rd. Winglobal Hse| Phone:+254717109280 | Email:cerve@cervekenya.com| www.cervekenya.com</h6>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
@section('scripts')

    @endsection
