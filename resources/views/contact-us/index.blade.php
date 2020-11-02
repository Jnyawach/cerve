@extends('layouts.cerve')
@section('title', 'Contact Us')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <div class="text-center m-5 top">
                    <h6>GOT A QUESTION?</h6>
                    <h1>Contact Cerve</h1>
                    <p>We’re here to help and answer any question you might have.
                        We look forward to hearing from you </p>

                </div>


            </div>

        </div>
    </div>
    <div class="down">
        <div class="row  ">
            <div class="col-10 col-md-10 col-lg-5 mx-auto contacte">
                {!!Form::open(['method'=>'POST', 'action'=>'ContactController@store'])!!}
                @if(Session::has('contact_message'))
                    <p class="text-danger">{{session('contact_message')}}</p>
                @endif

                <div class="form-group row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        {!!Form::label('first_name', 'FIRST NAME:')!!}
                        {!!Form::text('first_name', null, ['class'=>'form-control'])!!}
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6">
                    {!!Form::label('last_name', 'LAST NAME:')!!}
                    {!!Form::text('last_name', null, ['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">


                    {!!Form::label('email', 'EMAIL:')!!}
                    {!!Form::text('email', null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('subject', 'SUBJECT:')!!}
                    {!!Form::text('subject', null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('body', 'MESSAGE:')!!}
                    {!!Form::textarea('body', null, ['class'=>'form-control','id'=>'message'])!!}

                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="g-recaptcha" data-sitekey="6LeIPN4ZAAAAANQBqg82ujMZFul26ELMWUYUFZFL">

                        </div>
                    </div>

                </div>
                <div class="form-group">

                    {!!Form::submit('SUBMIT', ['class'=>'btn btn-block mt-2'])!!}
                </div>
                {!!Form::close()!!}
                @include('includes.form_error')


                <div class="contact p-4 mb-5">
                    <h5>Contact Information</h5>
                    <div class="icon d-flex"><i class="fas fa-map-marker-alt mr-4"></i><p>Cerve <br>
                            WinGlobal HSE. Keekorok RD. Nairobi</p>
                    </div>
                    <div class="icon d-flex"><i class="fas fa-phone-alt mr-4"></i><p>+254 717 109 280</p>
                    </div>
                    <div class="icon d-flex"><i class="fas fa-envelope mr-4"></i><p>contact@cerve.co.ke</p>
                    </div>

                </div>

            </div>
            <div class="col-10 col-md-10 col-lg-5 mx-auto better">
                <h3>How Can We Serve You Better?</h3>
                <p>Please select a topic below related to your inquiry.
                    If you don’t find what you need, fill out our contact form.</p>

                <div>
                    <h6>Printing</h6>
                    <a href="{{route('faqs-panel.index')}}">

                        <p class="brand">High-quality pocket-friendly printing.
                            We ensure the right on-time delivery. Read through and find the solution you need.</p>
                    </a>
                </div>
                <hr>
                <div><h6>Design</h6>
                    <a href="{{route('faqs-panel.index')}}">
                        <p class="brand">Are you having a Problem with the design? Read a list of our
                        common problems and their solutions</p>
                    </a>
                </div>
                <hr>
                <div>
                    <h6>Ordering</h6>
                    <a href="{{route('faqs-panel.index')}}">
                        <p class="brand">See through problems you are likely to encounter when placing orders</p>
                    </a>
                </div>
                <hr>


                <div class="trusted mt-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3  my-auto">
                            <h6 class="text-center">TRUSTED BY</h6>
                        </div>


                        <div class="col-sm-3 col-md-2 col-lg-2 mxt-auto">
                            <img src="{{asset('images/our_clients_03.png')}}" alt="GSM Systems"class="img-fluid" >
                        </div>

                        <div class="col-sm-3 col-md-2 col-lg-2 mxt-auto">
                            <img src="{{asset('images/our_clients_08.png')}}" alt="Upstyle"class="img-fluid" >
                        </div>

                        <div class="col-sm-3 col-md-2 col-lg-2 mxt-auto">
                            <img src="{{asset('images/our_clients_07.png')}}" alt="Rig"class="img-fluid" >
                        </div>

                        <div class="col-sm-3 col-md-2 col-lg-2 mxt-auto">
                            <img src="{{asset('images/our_clients_10.png')}}" alt="Resolution Insurance" class="img-fluid" >
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


@include('includes.brand_shop')

@endsection

