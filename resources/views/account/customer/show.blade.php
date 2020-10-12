@extends('layouts.cerve')
@section('title', 'Orders')
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Number: {{$order->id}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
