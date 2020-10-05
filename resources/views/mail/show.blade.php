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
        .foot{
           background: var(--dark);
        }
        .base{
            background: var(--primary);
        }
    </style>
@endsection
@section('content')
   <section>
       <div class="container mt-5">
           <div class="header-page p-5">
               <h1 class="text-center">Thank You For Contacting Cerve</h1>
               <h5 class="text-center" style="color:white; font-weight: normal; font-size: 20px">We will get back to you shortly</h5>
           </div>

           <section class="mt-5">
               <h6>#Issue Number 2345</h6>
               <hr class="broken mt-5">
               <h6 class="mt-5">Subject: Printing</h6>
               <p>Do not just decide to print any image that catches your eye online.
                   This can be quite disastrous especially if you do not want to end up with a
                   highly pixelated image. Always check and make sure that your image is between 300
                   PPI (pixels per inch) and 400 PPI. Even if your image looks great
                   on-screen always check the PPI just to be sure of the final output.</p>
               <h6>From: Antony Gichuki</h6>
               <h6>Email: gichuki@gmail.com</h6>
               <hr class="broken">
           </section>
           <section class="foot p-3">
               <h5 class="text-center" >Kind Regards<br>
               This email was sent to: gichuki@gmail.com</h5>
           </section>
           <section style="color: white" class="base p-5">
               <p class="text-center">Contact: +254 717 109280| Email:support@cervekenya.com |
               Winglobal Hse. Keekorok Rd.</p>

           </section>
       </div>
   </section>
@endsection
