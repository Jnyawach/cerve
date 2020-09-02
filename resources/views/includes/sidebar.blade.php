<div class="col-sm-8 col-md-3 col-lg-3 mx-auto user-sidebar">
    <div class="card shadow navbar-expand-lg" >
        <div class="card-header d-flex">
            <button style="color: white !important;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-align-justify" aria-hidden="true"></i>
            </button>
            <h6 class="ml-3 mt-3" style="font-size: 18px"><i class="far fa-user mr-3"></i>{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</h6>
        </div>
        <div class="collapse navbar-collapse " id="sidebarText">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{route('profile.index')}}" title="My account"><i class="far fa-user mr-3"></i> My Account</a> </li>
                    <li class="list-group-item"><a href="#" title="Orders"><i class="fas fa-shopping-basket mr-3"></i> Orders</a></li>
                    <li class="list-group-item"><a href="{{route('wishlist.index')}}" title="Wish list"><i class="far fa-heart mr-3"></i> Saved Items</a></li>
                    <li class="list-group-item"><a href="{{route('review.index')}}" title="Reviews"><i class="far fa-comment-alt mr-3"></i> Reviews</a></li>
                    <li class="list-group-item"><a href="{{route('project.index')}}" title="#"><i class="far fa-newspaper mr-3"></i> Print On Demand</a></li>
                    <li class="list-group-item"><a href="{{route('career.index')}}" title="Careers"><i class="fas fa-briefcase mr-3"></i> Jobs</a></li>

                </ul>



        </div>
        <div class="card-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-block">Logout</button>
            </form>
        </div>


    </div>

</div>
