@extends('layouts.cerve_admin')
@section('title', $user->name)
@section('content')
<section>
    <div class="card">
        <div class="card-header">
            <h4>Account Overview <a href="{{route('users.edit', $user->id)}}" class="float-right"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Edit User</a> </h4>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-sm-10 col-md-5 col-lg-5 mx-auto">
                   <div class="card">
                       <div class="card-header">
                          <h3>Account Details</h3>
                       </div>
                       <div class="card-body">
                           <blockquote class="blockquote mb-0">
                               <p><span>{{$user->name}}&nbsp;{{$user->lastname}}</span></p>
                               <footer class="blockquote-footer">
                                  {{$user->email}}
                               </footer>
                           </blockquote>
                       </div>
                   </div>
               </div>
               <div class="col-sm-10 col-md-5 col-lg-5 mx-auto">
                   <div class="card">
                       <div class="card-header">
                           <h3>Address Details</h3>
                       </div>
                       <div class="card-body">
                           <blockquote class="blockquote mb-0">
                               <p><span>{{$user->name}}&nbsp;{{$user->lastname}}</span><br>
                               {{$user->email}}</p>
                           </blockquote>
                           <p>{{$user->country? $user->country:'Null'}}&nbsp;
                               {{$user->town? $user->town:'Null'}}&nbsp;
                               {{$user->street? $user->street:'Null'}}</p>
                           <p>{{$user->cellphone}}</p>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</section>
@endsection
