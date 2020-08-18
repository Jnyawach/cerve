@extends('layouts.cerve')
@section('title', 'Privacy Policy')
@section('content')
    <h2 class="text-center mt-5">Terms and Conditions</h2>

    <section>
        <div class="row mt-5">
            <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                @if($policies->count()>0)
                    @foreach($policies as $policy)
                        <h6>{{$policy->updated_at? $policy->updated_at->isoFormat('dddd, MMMM Do YYYY'):$policy->created_at->isoFormat('dddd, MMMM Do YYYY')}}</h6>
                        <p>{!! $policy->policy !!}</p>

                    @endforeach
                @else
                    <h1 class="text-center">Cerve has not Updated It's Terms and conditions!</h1>
                @endif
            </div>
        </div>
    </section>

@endsection

