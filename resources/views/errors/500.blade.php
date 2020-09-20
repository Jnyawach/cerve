@extends('layouts.error_page')
@section('title','503-Page')
<section class="error-page">

    <div class="row text-center">
        <div class="col-11 text-center mx-auto">
            <div class="text-center mx-auto ">
                <img src="{{asset('images/cerve logo.png')}}" alt="Cerve log" class="img-fluid" style="height: 40px">
            </div>
            <div class="error-title">
                <h5>500-INTERNAL SERVER ERROR!</h5>
                <hr>
            </div>

            <div class="infomartion">
                <h6>We are sorry for the inconvenience. If the problem persists please contact
                our support desk via <span>support@cervekenya.com</span></h6>

            </div>


        </div>
    </div>
</section>


