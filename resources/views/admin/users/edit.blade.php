@extends('layouts.cerve_admin')
@section('title','Create User')
@section('content')
    <div class="container">
    <div class="card">
        <h5 class="card-header">Update User</h5>
        <div class="card-body">
            {!!Form::model($user,['method'=>'PATCH', 'action'=>['UserAdminController@update', $user->id]])!!}

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
                <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                    {!!Form::label('role_id', 'Role:')!!}
                    {!!Form::select('role_id', [''=>'Choose Options']+$role, null, ['class'=>'form-control'])!!}
                </div>
                <div class="col-sm-7 col-md-6 col-lg-6 mx-auto">
                    {!!Form::label('is_active', 'Status:')!!}
                    {!!Form::select('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}
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
                <div class="form-group row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                        {!!Form::submit('Update User', ['class'=>'btn btn-primary'])!!}
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>

    </div>
    </div>

@endsection

