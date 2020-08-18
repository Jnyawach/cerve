<html lang="en">
<head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{asset('fonts/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    @yield('styles')
    <script src="https://kit.fontawesome.com/7432138d16.js" crossorigin="anonymous"></script>
    <title> @yield('title')</title>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand" href="/"><img src="{{asset('images/cerve logo.png')}}" alt="Cerve Logo" style="height: 40px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav mx-auto ">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('brand-shop.index')}}">Brand Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Print On Demand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('portfolio')}}" title="Portfolio">Portfolio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact-us.index')}}">Contact Us</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown ">
                        <a class="nav-link text-capitalize " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('account.index')}}"><i class="far fa-user-circle mr-3"></i> Account</a>
                            <a class="dropdown-item" href="{{route('wishlist.index')}}"><i class="far fa-heart mr-3"></i>Saved Items</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-shopping-basket mr-3"></i> Orders</a>
                            <span class="dropdown-item">

                @if(Route::has('login'))
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                          <button type="submit" class="btn btn-block">Logout</button>
                                    </form>
                                @endif

          </span>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                @endauth
                <li class="nav-item cart  position-relative">
                    <a href="{{route('cart.index')}}" class="nav-link"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;Basket
                        @if(Cart::instance('default')->count()>0)
                            <span class="badge badge-pill badge-danger" style="font-size: 10px; top:-5px">{{Cart::instance('default')->count()}}</span>
                        @endif
                    </a>

                </li>

            </ul>


        </div>
    </nav>



</header>

<main>
    @yield('content')
</main>

<footer class="pt-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 mx-auto" >
                <h5 class="text-uppercase">ABOUT COMPANY</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('about-us')}}" >About Us</a>
                    </li>
                    <li>
                        <a href="{{route('work')}}">Work with us</a>
                    </li>
                    <li>
                        <a href="#">Testimonials</a>
                    </li>

                </ul>


            </div>
            <div class="col-6 col-md-4 col-lg-3 mx-auto">

                <!-- Links -->
                <h5 class="text-uppercase">SUPPORT</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('faqs')}}">Faqs</a>
                    </li>
                    <li>
                        <a href="{{route('policy')}}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{route('terms')}}">Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="{{route('contact-us.index')}}">Contact Us</a>
                    </li>
                </ul>

            </div>
            <div class="col-6 col-md-4 col-lg-3 mx-auto">

                <!-- Links -->
                <h5 class="text-uppercase">RESOURCES</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('brand-shop.index')}}">Brand Shop</a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}">Blog</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}">Sign Up</a>
                    </li>
                    <li>
                        <a href="{{route('portfolio')}}">Portfolio</a>
                    </li>
                </ul>

            </div>
            <div class="col-6 col-md-4 col-lg-3 mx-auto">

                <!-- Links -->
                <h5 class="text-uppercase">SERVICES</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#">Branding</a>
                    </li>
                    <li>
                        <a href="#">Printing</a>
                    </li>
                    <li>
                        <a href="#">Embroidey</a>
                    </li>
                    <li>
                        <a href="#">Design</a>
                    </li>
                </ul>

            </div>


        </div>
    </div>


    <!-- Copyright -->
    <div class="container text-center py-3">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 mx-auto" >
                <a href="/" title="home page">  Cerve Networks |&nbsp;&copy;{{date('Y')}} cerve</a>
            </div>
            <div class="col-6 col-md-4 col-lg-8 mx-auto text-right ">
                <a href="#" class="p-1 "><u>Facebook</u></a>
                <a href="#" class="p-1 "><u>Instagram</u></a>
                <a href="#" class="p-1 "><u>Twitter</u></a>
                <a href="#" class="p-1 "><u>Pinterest</u></a>
                <a href="#" class="p-1 "><u>Youtube</u></a>
            </div>

        </div>

    </div>
    <!-- Copyright -->

</footer>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
@yield('scripts')
</body>
</html>
