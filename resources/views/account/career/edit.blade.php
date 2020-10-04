@extends('layouts.cerve')
@section('title','Review Application')
@section('content')
    @include('includes.editor')
    <section>
        <div class="row mt-4">
            @include('includes.sidebar')
            <div class="col-sm-11 col-md-8 col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <h6 class="card-header p-3 w-100" style="font-size: 18px" > <i class="fas fa-briefcase mr-3"></i>Jobs  </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-8 col-md-8">
                                        <h6>{{$job->job->title}}</h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-4 col-md-4">
                                        {!!Form::open(['method'=>'DELETE', 'action'=>['CareerController@destroy',$job->id],'class'=>'float-right ml-5'])!!}
                                        <div class="form-group">
                                            <button type="submit" class="btn text-danger"><i class="far fa-trash-alt mr-2"></i>Delete</button>
                                        </div>
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                                    {!!Form::model($job,['method'=>'PATCH', 'action'=>['CareerController@update',$job->id], 'files'=>true])!!}
                                    {!! Form::hidden('career_id',$job->id) !!}
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
                                        {!!Form::submit('Update Application', ['class'=>'btn btn-primary'])!!}
                                    </div>

                                    {!!Form::close()!!}




                            </div>

                        </div>


                    </div>
                    <div class="card-footer">

                    </div>
                </div>


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

