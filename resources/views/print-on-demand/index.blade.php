@extends('layouts.cerve')
@section('title', 'Print On Demand')
@section('content')
    @include('includes.editor')
    <section class="container">
        @if(Session::has('print_message'))
            <p class="text-success text-center mt-4">{{session('print_message')}}</p>
        @endif
        <div class="row my-auto">
            <div class="col-sm-12 col-md-6 col-lg-6 mx-auto p-5 order" >
                <h1>A convenient way to brand your business</h1>
                <p>Order your next printing job and have them delivered
                to your doorstep!</p>
                <a href="#printing" class="btn btn-primary ml-4" title="Print on Demand">Submit your artwork</a>
            </div>
            <div class="col-sm-12 col-md-6 col=lg-6 mx-auto">
                <img src="{{asset('images/print-demand.png')}}" alt="Print on Demand" class="img-fluid">
            </div>
        </div>
    </section>
    <section >

        <div class="row mt-2 p-3">
            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-01.png')}}" class="img-fluid" alt="Embroidery" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">EMBROIDERY</h5>

                    </div>

                </div>

            </div>

            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-02.png')}}" class="img-fluid" alt="Engraving" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">ENGRAVING</h5>

                    </div>

                </div>

            </div>

            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-03.png')}}" class="img-fluid" alt="Digital Printing" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">DIGITAL PRINTING</h5>

                    </div>

                </div>

            </div>
            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-07.png')}}" class="img-fluid" alt="Large Format Printing" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">LARGE FORMAT PRINTING</h5>

                    </div>

                </div>

            </div>

            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-05.png')}}" class="img-fluid" alt="Uv Printing" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">UV PRINTING</h5>

                    </div>

                </div>

            </div>

            <div class="  col-md-2 col-lg-2 mx-auto shop-info p-2 " >

                <div class="row ">
                    <div class="col-4">
                        <img src="{{asset('images/printing-04.png')}}" class="img-fluid" alt="Heat Transfer Printing" style="height: 50px">
                    </div>
                    <div class="col-8">
                        <h5 class="p-0 m-0">HEAT TRANSFER PRINTING</h5>

                    </div>

                </div>

            </div>


        </div>
    </section>

    <section id="printing" class="mt-5 container">
        <h3 class="text-center mb-5">Submit your project for printing</h3>
        {!!Form::open(['method'=>'PATCH', 'action'=>'PrintOnDemandController@update', 'class' =>'mb-5','files'=>true])!!}

        <div class="form-group row">
            <div class="col-sm-3 col-md-1 col-lg-1">
                {!!Form::label('title', 'TITLE:')!!}
            </div>
            <div class="col-sm-9 col-md-11 col-lg-11">
                {!!Form::text('title', null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col-md-2 col-lg-2">
                {!!Form::label('brand_id', 'PRINTING TYPES:')!!}
            </div>
            <div class="col-sm-9 col-md-10 col-lg-10">
                {!!Form::select('brand_id',[''=>'Choose Category']+$branding, null, ['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('description', 'DESCRIPTION:')!!}
            {!!Form::textarea('description', null, ['class'=>'form-control','id'=>'description-print'])!!}
        </div>
        <p class="text-danger">So that we can serve you better attain high print quality we recommend that you
            submit vector files such as PDF, SVG, EPS, CDR or AI.</p>

        <div class="form-group">
            {!!Form::label('artwork_id', 'ARTWORK:')!!}
            {!!Form::file('artwork_id')!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Submit Project', ['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </section>
    <div>
        @include('includes.form_error')
    </div>
@endsection
@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description-print', );
    </script>
    @endsection
