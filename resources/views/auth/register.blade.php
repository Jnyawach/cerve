@extends('layouts.forms')
@section('title',  'Sign Up')
@section('content')
<div class="container pt-5 contact-form">
    <div class="pt-5" >
<div class="row shadow  m-5 rounded ">
<div class="col-sm-10 col-md-5 col-lg-5 mx-auto side-contact  ">
    <div class="pt-5 mt-5">
    <h4 class="mt-5 ml-4">Brand Strategist</h4>
    <p class=" ml-4">Fly your brand high to recognizable heights</p>
    </div>
    <img src="{{asset('images/contact.png')}}" class="img-fluid mt-5">
</div>
    <div class="col-sm-10 col-md-7 col-lg-7 mx-auto  form-side p-5">
        <form method="POST" action="{{ route('register') }}">

                        @csrf
            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="name" class="control-label">First Name:</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="lastname" class="control-label">Last Name:</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

            </div>
            <div class="form-group required row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                <label class="control-label" for="email">Email:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group required row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="password" class="control-label">Password:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="password-confirm" class="control-label">Confirm Password:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div>
                <h5 >Shipping Address</h5>
                <hr>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="cellphone" class="control-label">Cellphone:</label>
                    <input id="cellphone" type="tel" class="form-control @error('cellphone') is-invalid @enderror" name="cellphone" value="{{ old('cellphone') }}" required autocomplete="cellphone" autofocus>

                    @error('cellphone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="country" class="control-label">Country:</label>
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus placeholder="Example, Kenya">

                    @error('country')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="town" class="control-label">Town/City:</label>
                    <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" autofocus placeholder="Example, Nairobi">

                    @error('town')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <label for="street" class="control-label">Street/Road/Building:</label>
                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus placeholder="Example, Kimathi Hse. Kimathi street">

                    @error('street')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="g-recaptcha" data-sitekey="6LeIPN4ZAAAAANQBqg82ujMZFul26ELMWUYUFZFL">

                    </div>
                </div>

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 ">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Sign Up') }}
                    </button>
                            </div>
                        </div>
                    </form>
        <p style="font-size:20px">Already A member? <a href="{{route('login')}}" title="login">Login</a></p>



</div>

</div>
    </div>
</div>
@endsection
