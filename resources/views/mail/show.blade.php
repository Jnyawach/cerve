@extends('layouts.mail')
@section('title','Contact Us')
@section('styles')
    <style>
        .header-page{
            background: var(--primary);
        }
        .header-page h1{
            color: white;
        }
    </style>
@endsection
@section('content')
   <section>
       <div class="container mt-5">
           <div class="header-page p-5">
               <h1 class="text-center">Thank You For Contacting Us</h1>
           </div>
       </div>
   </section>
@endsection
