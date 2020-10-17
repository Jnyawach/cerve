@extends('layouts.cerve_admin')
@section('title','Messages')
@section('content')
    <section>
        <h4>{{$message->subject}}</h4>
        <h6>{{$message->first_name}} {{$message->last_name}} | {{$message->email}}</h6>
        <p>{!! $message->body !!}</p>
    </section>
@endsection
