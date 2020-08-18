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
                    <h6>Branding</h6>
                    <a href="#">

                        <p class="brand">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since</p>
                    </a>
                </div>
                <hr>
                <div>
                    <h6>Printing</h6>
                    <a href="#">
                        <p class="brand">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since</p>
                    </a>
                </div>
                <hr>
                <div>
                    <h6>Graphic Design</h6>
                    <a href="#">
                        <p class="brand">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since</p>
                    </a>
                </div>

                <div class="trusted">
                    <h6>TRUSTED BY</h6>
                    <img src="images/360.png" class=" img-fluid p-2" alt="360 Studio Logo">
                    <img src="images/allee-de.png" class=" img-fluid p-2" alt="Allee-DE Logo">
                    <img src="images/Echo-media.png" class=" img-fluid p-2" alt="Echo Media Logo">
                    <img src="images/global-desart.png" class="img-fluid p-2" alt="Global Desart Logo">
                    <img src="images/logo.png" class=" img-fluid p-2" alt="Creative Haven Logo">
                    <img src="images/ramona.png" class=" img-fluid p-2" alt="Ramona Logo">

                </div>

            </div>

        </div>
    </div>


@include('includes.brand_shop')

@endsection

