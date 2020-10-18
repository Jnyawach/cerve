@extends('layouts.cerve')
@section('title', 'Thank You')
@section('content')
    <section class="m-5">
        <div class="row mt-5 pt-5">
            <div class="col-10 mx-auto text-center">
                <img src="{{asset('images/cerve logo.png')}}" class="img-fluid" alt="Cerve Logo" style="width: 150px;">
                <h1 class="mt-5" style="font-size: 80px">Thank You!</h1>
                <p style="font-size: 24px">Thank you for your order. Follow the link to track your order
                    <a href="{{route('customer.show',$order->id)}}" title="see details" class="text-success">#Order</a>
                </p>
                <p>Having any Questions? Please
                    <a href="{{route('contact-us.index')}}" title="see details" >Contact us</a>
                </p>
            </div>
        </div>
    </section>
    @endsection
