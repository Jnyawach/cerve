@extends('layouts.cerve')
@section('title', $job->title)
@section('content')
    @include('includes.editor')
    <section>
        <div class="row p-5 text-center show-job">
        <div class="col-10 col-md-8 col-lg-8 mx-auto">
            <h5>Apply for</h5>
            <h2>{{$job->title}}-{{$job->town}}</h2>
            <h5 class="text-uppercase" style="color: black">
                @if($job->type==1)
                    PART TIME
                    @else
                    FULL TIME
                    @endif
                {{$job->city}},&nbsp;{{$job->country}}</h5>

            @if($date=\Carbon\Carbon::now()<$job->duration)
                <h5>Active until {{$date = \Carbon\Carbon::createFromFormat('Y-m-d', $job->duration)->isoFormat('MMMM Do YYYY')}}</h5>
            @else
                <h5 class="text-danger">This position has been closed</h5>
            @endif
        </div>
        </div>
    </section>
    <section class="m-5 pt-5">
        <h4 class="text-center">Applying as {{Auth::user()->name}} {{Auth::user()->lastname}}</h4>
        <div class="row">
            <div class="col-12 mx-auto">
                @if($date=\Carbon\Carbon::now()<$job->duration)
                    {!!Form::open(['method'=>'POST', 'action'=>'CareerController@store', 'files'=>true])!!}
                    {!! Form::hidden('job_id',$job->id) !!}
                    <div class="form-group">
                        {!!Form::label('letter', 'Cover Letter:')!!}
                        {!!Form::textarea('letter', null, ['class'=>'form-control','id'=>'req-editor'])!!}

                    </div>
                    <div class="form-group">
                        {!!Form::label('resume_id', 'Resume:')!!}
                        <p>File formats doc, docx, pdf</p>
                        {!!Form::file('resume_id',  ['class'=>'form-control-file'])!!}
                    </div>

                    <div class="form-group">
                        {!!Form::submit('Submit Application', ['class'=>'btn btn-primary'])!!}
                    </div>

                    {!!Form::close()!!}

                    <div class="row">
                        @include('includes.form_error')
                    </div>
                @else
                @endif
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'req-editor', );
    </script>
    @endsection
