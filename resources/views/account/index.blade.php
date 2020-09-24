@extends('layouts.cerve')
@section('title', 'My Cerve Account')
@section('content')
    <section >
        <div class="container">
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow">
                    <h6 class="card-header p-3 user-head" style="font-size: 18px" >Account Details</h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Account Details<a href="{{route('profile.index')}}" class="btn float-right  p-0" title="Edit details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</h5>
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Total Orders Count<a href="#" class="btn float-right p-0" title="View Details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>Your Total orders count are:</h5>
                                        <p>Delivered:500</p>
                                        <p>Pending Delivery:500</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Saved Items<a href="#" class="btn float-right  p-0" title="View details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>You Have:</h5>
                                        <p> 8 saved items</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Newsletter Preference<a href="#" class="btn float-right  p-0" title="Edit details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>You are currently subscribed to following newsletters:</h5>
                                        <p>weekly newsletter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Reviews<a href="#" class="btn float-right  p-0" title="View details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>You Have:</h5>
                                        <p> 0 Reviews</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-5 mx-auto m-2">
                                <div class="card detail">
                                    <h5 class="card-header w-100">Job Application<a href="#" class="btn float-right  p-0" title="View details"><i class="fas fa-external-link-alt"></i></a> </h5>
                                    <div class="card-body">
                                        <h5>You Have:</h5>
                                        <p> 2 Job applications</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
