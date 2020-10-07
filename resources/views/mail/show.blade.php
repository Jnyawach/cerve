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
   <section style="padding-top: 30px">
       <div >
           <div style="background: #11054E; padding: 60px; text-align: center;" >
               <h1 style="color: white;">Thank You For Contacting Cerve</h1>
               <p  style="color:white; font-weight: normal;">We will get back to you shortly</p>
           </div>

           <section >
               <h6 style="padding: 30px">#Issue Number 2345</h6>
               <hr style=" border-top: 1px dashed #11054E;">
               <h6 style="margin-top:40px;padding-left: 30px;padding-right: 30px  ">Subject: Printing</h6>
               <p style="padding: 30px; color: black">Do not just decide to print any image that catches your eye online.
                   This can be quite disastrous especially if you do not want to end up with a
                   highly pixelated image. Always check and make sure that your image is between 300
                   PPI (pixels per inch) and 400 PPI. Even if your image looks great
                   on-screen always check the PPI just to be sure of the final output.</p>
               <h6 style="margin-top:40px;padding-left: 30px;padding-right: 30px ">Antony Gichuki</h6>
               <h6 style="padding-left: 30px;padding-right: 30px ">Email: gichuki@gmail.com</h6>
               <hr style=" border-top: 1px dashed #11054E;">
           </section>
           <section style="background: #e8f1f2; padding-top: 30px; padding-bottom: 30px;padding-left: 10px;">
               <h5 style=";padding-left: 30px; color:#11054E;  " >Kind Regards<br>
               This email was sent to: gichuki@gmail.com</h5>
           </section>
           <section style="color: white; background:#11054E; padding: 60px; text-align: center; ">
               <p class="text-center">Contact: +254 717 109280| Email:support@cervekenya.com |
               Winglobal Hse. Keekorok Rd.</p>

           </section>
       </div>
   </section>
@endsection
