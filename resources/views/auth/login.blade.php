@extends('layouts.forms')
@section('title','Login')
@section('content')
<div class=" pt-5 contact-form m-lg-5">
    <div class="row shadow  m-lg-5 rounded m-2">
        <div class="col-sm-12 col-md-5 col-lg-5 mx-auto side-contact d-none d-lg-block ">
            <div class="pt-5 mt-5">
                <h4 class="mt-5 ml-4">Brand Strategist</h4>
                <p class=" ml-4">Fly your brand high to recognizable heights</p>
            </div>
            <img src="{{asset('images/contact.png')}}" class="img-fluid mt-5">
        </div>

        <div class="col-sm-12 col-md-7 col-lg-7 mx-auto  form-side ">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
                <h5 class="text-center mt-3">Please Login to Proceed</h5>

                        <div class="form-group required ">
                            <label for="email" class=" control-label">{{ __('Email:') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group required">
                            <label for="password" class="control-label">{{ __('Password:') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">

                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mt-3" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                        </div>

                        <div class="form-group mt-5 ">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                <h5>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a> |
                    <a class="btn btn-link" href="{{ route('register') }}">
                       Register
                    </a>
                </h5>



                    </form>
                </div>


</div>
</div>
@endsection
