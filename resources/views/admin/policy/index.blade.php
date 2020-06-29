@extends('layouts.cerve_admin')
@section('title','policy')
@section('content')
    <section>
        @if(Session::has('policy_message'))
            <p class="text-success">{{session('policy_message')}}</p>
        @endif
        <h3>Terms and Conditions/ Privacy Policy</h3>
        <div class="row">
            @if($policies->count()>0)
                @foreach($policies as $policy)
                <div class="col-12 col-m-6 col-lg-6">
                    <div class="card border-3 border-top border-top-primary">
                        <a href="{{route('policy.show', $policy->id)}}" >
                        <div class="card-body">
                            <h5 class="text-muted">
                                @if($policy->category==1)
                                    Privacy Policy
                                    @else
                                    Terms and Condition
                                    @endif
                            </h5>

                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">Last Updated: {{$policy->updated_at->isoFormat('MMMM Do YYYY')}}</h3>
                            </div>

                        </div>
                        </a>
                    </div>

                </div>
                @endforeach
                @else
                <h4>There are no terms and conditions in the database</h4>
            @endif
        </div>
    </section>
@endsection
