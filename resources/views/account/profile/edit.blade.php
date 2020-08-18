@extends('layouts.cerve')
@section('title', Auth::user()->name)
@section('content')
    <section>
        <div class="row m-5">
            @include('includes.sidebar')
            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header user-head" style="font-size: 18px" > Edit Account Details  </h6>
                    <div class="card-body">
                        {!!Form::model($user,['method'=>'PATCH', 'action'=>['ProfileController@update', $user->id]])!!}
                        <div class="form-group row">
                            <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                                {!!Form::label('name', 'First Name:')!!}
                                {!!Form::text('name', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                                {!!Form::label('lastname', 'Last Name:')!!}
                                {!!Form::text('lastname', null, ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-7 col-md-7 col-lg-7 mx-auto">
                                {!!Form::label('email', 'Email:')!!}
                                {!!Form::email('email', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-7 col-md-5 col-m-5 mx-auto">
                                {!!Form::label('cellphone', 'Cellphone:')!!}
                                {!!Form::tel('cellphone', null, ['class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                                <label for="password-confirmation">Password Confirm:</label>
                                <input type="password" class="form-control" id="password-confirmation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-md-4 col-lg-4 mx-auto">
                                {!!Form::label('country', 'Country:')!!}
                                {!!Form::text('country', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 mx-auto">
                                {!!Form::label('town', 'Town:')!!}
                                {!!Form::text('town', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 mx-auto">
                                {!!Form::label('street', 'Street:')!!}
                                {!!Form::text('street', null, ['class'=>'form-control'])!!}
                            </div>


                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                                {!!Form::submit('Update User', ['class'=>'btn btn-primary'])!!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        @include('includes.form_error')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
