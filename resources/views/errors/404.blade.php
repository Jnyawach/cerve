@extends('layouts.error_page')
@section('title','404-Page')
<section class="error-page">

    <div class="row text-center">
        <div class="col-11 text-center mx-auto">
            <div class="text-center mx-auto ">
                <img src="{{asset('images/cerve logo.png')}}" alt="Cerve log" class="img-fluid" style="height: 40px">
            </div>
            <div class="error-title">
                <h5>404-PAGE NOT FOUND!</h5>
                <hr>
            </div>

            <div class="infomartion">
                <h6>That page cannot be found or has been moved to another location</h6>
                <a href="/" class="btn btn-primary mt-5" title="Home page">Return to Homepage</a>
            </div>


        </div>
    </div>
</section>
