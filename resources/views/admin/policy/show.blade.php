@extends('layouts.cerve_admin')
@section('title', 'Cerve Policies')
@section('content')
    <section>
        <h4> @if($policy->category==1)
                Privacy Policy
            @else
                Terms and Condition
            @endif</h4>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-primary" href="{{route('policy.edit', $policy->id)}}">Edit<i class="fa fa-pencil-square-o ml-2" aria-hidden="true"></i></a>
            </div>
            <div class="col-3">
                {!!Form::open(['method'=>'DELETE', 'action'=>['PolicyAdminController@destroy', $policy->id]])!!}
                <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash-o ml-2" aria-hidden="true"></i> </button>
            </div>
            {!!Form::close()!!}
        </div>

        <p>{!! $policy->policy !!}</p>

    </section>
@endsection
