@extends('layouts.cerve')
@section('title', Auth::user()->name)
@section('content')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100 user-head" style="font-size: 18px" ><i class="far fa-user mr-3"></i>Account Details<a href="{{route('profile.edit', Auth::user()->id)}}" class="btn float-right" title="Edit details" style="color: white"><i class="far fa-edit"></i> Edit Account</a> </h6>
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-8">
                                @if(Session::has('user_message'))
                                    <p class="text-success">{{session('user_message')}}</p>
                                @endif
                                <img src="{{asset('images/kindpng_2697881.png')}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-fluid img-thumbnail" style="height: 120px">
                                <h6 class="mt-2 text-capitalize" style="font-size: 18px">{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</h6>
                                <table class="w-100">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td><span>{{Auth::user()->email}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Member Since:</td>
                                        <td><span>{{Auth::user()->created_at->isoFormat('MMMM Do YYYY')}}</span></td>

                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td><span>{{Auth::user()->street}}&nbsp;
                                                {{Auth::user()->town}}&nbsp;{{Auth::user()->country}}</span></td>

                                    </tr>
                                    <tr>
                                        <td>Tel:</td>
                                        <td><span>{{Auth::user()->cellphone}}</span></td>

                                    </tr>
                                    <tr>
                                        <td>Subscription:</td>
                                        <td><span>Weekly Newsletter</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-5 col-md-3 col-lg-4 p-3">

                                <ul class="useful_link">
                                    <h6>USEFUL LINKS</h6>
                                    <li class="list-unstyled">
                                        <a href="#" title="About Us">About Us<i class="fas fa-external-link-alt"></i></a>
                                    </li>
                                    <li class="list-unstyled">
                                        <a href="#" title="Privacy Policy">Privacy Policy<i class="fas fa-external-link-alt"></i></a>
                                    </li>
                                    <li class="list-unstyled">
                                        <a href="#" title="Privacy Policy">Terms and Condtions<i class="fas fa-external-link-alt"></i></a>
                                    </li>
                                    <li class="list-unstyled">
                                        <a href="#" title="Contact Us">Contact Us<i class="fas fa-external-link-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

