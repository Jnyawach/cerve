@extends('layouts.cerve')
@section('title','About Us')
@section('content')
    <section class="about">
        <img src="{{asset('images/about-01.jpg')}}" class="img-fluid" alt="About Us">
        <h1 class="text-center py-2  ">About us</h1>
        <hr class="underline">

    </section>
    <section class="cont py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 mx-auto" >
                    <p class="text-center">Cerve is a company with its headquarters in
                        Nairobi Kenya. We are a global leader in printing and branding for more than 5yrs.
                        We have the inspiration that endures
                        and gets better with age. This has contributed to our quality, speed, and reputation.
                    </p>
                    <p class="text-center">We believe that printing is a way of speaking. Speaking to family, friends,
                        strangers-speaking to society. This is why we are dedicated to research and
                        innovation to
                        ensure that all our clients achieve the best speech in print.</p>
                </div>
            </div>
        </div>
            <div class="row mt-5 about-quality ">
                <div class="col-12 col-md-4 col-lg-3 mx-auto" >
                    <div class="symbol text-center"><i class="far fa-lightbulb"></i></div>
                    <h5 class="text-center mt-5">CREATIVE CONCEPT</h5>
                    <p class="text-center ">Creativity is just a culture at
                        century Studio. Our team is
                        ready to perceive the world in
                        new ways and generate solutions
                        just for you.</p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mx-auto" >
                    <div class="symbol text-center"><i class="far fa-heart"></i></div>
                    <h5 class="text-center mt-5">UNIQUE DESIGN</h5>
                    <p class="text-center">We offer what you will never
                        find anywhere else. Our products
                        and services has a taste
                        of uniqueness. That is why
                        you are our audience</p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mx-auto" >
                    <div class="symbol text-center"><i class="far fa-star"></i></div>
                    <h5 class="text-center mt-5">GREAT QUALITY</h5>
                    <p class="text-center">Our standards are raised very
                        high. Our unique designs are
                        emraced with quality. High
                        standard is what ranks us
                        among the best!</p>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mx-auto" >
                    <div class="symbol text-center"><i class="far fa-clock"></i></div>
                    <h5 class="text-center mt-5">SUPPORT 24/7</h5>
                    <p class="text-center">Just like life! Time is precious. We are dedicated to
                        delivering to our clients the best quality on the right time</p>
                </div>
            </div>


    </section>
    <section class="mt-4">
        <h2 class="text-center m-5">Our Services and Products</h2>
        <div class="container">
        <div class="our-services row ">
            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto">
                <h3 >Publications</h3>
                <ul class="dashed list-unstyled">
                    <li>Corporate Stationery</li>
                    <li>Brochures</li>
                    <li>Annual Reports</li>
                    <li>Posters</li>
                    <li>Calendars</li>
                    <li>Folders</li>
                    <li>Menus</li>
                    <li>Magazines</li>
                    <li>Company Profiles</li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto">
                <h3 >Global Wear</h3>
                <ul class="dashed list-unstyled">
                    <li>Round Neck T-shirts</li>
                    <li>V-Neck T-shirts</li>
                    <li>Long Sleeve T-shirts</li>
                    <li>Polo T-shirts</li>
                    <li>Corporate Shirts</li>
                    <li>Hoodies</li>
                    <li>Jackets</li>
                    <li>Fleece Blankets</li>
                    <li>Caps</li>

                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto">
                <h3 >POS Materials</h3>
                <ul class="dashed list-unstyled">
                    <li>Wobbler</li>
                    <li>Danglers</li>
                    <li>Perspex Stands</li>
                    <li>Roll up Banners</li>
                    <li>Tear Drop Banners</li>
                    <li>X-Banners</li>
                    <li>Media Banners</li>
                    <li>Shelf Strips</li>
                    <li>Window Graphics</li>

                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto">
                <h3 >Drinkware</h3>
                <ul class="dashed list-unstyled">
                    <li>Thermal Mugs</li>
                    <li>Magic Cups</li>
                    <li>Travel Mugs</li>
                    <li>Plastic Water Bottles</li>
                    <li>Aluminium Water Bottles</li>


                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto">
                <h3 >Bags</h3>
                <ul class="dashed list-unstyled">
                    <li>Back Packs</li>
                    <li>Jute Bags</li>
                    <li>Draw String Bags</li>
                    <li>Packaging Bag</li>
                    <li>Laptop Bags</li>
                    <li>Tote Bags</li>


                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto ">
                <h3 >Gift Items</h3>
                <ul class="dashed list-unstyled">
                    <li>Wrist Bands</li>
                    <li>Umbrellas</li>
                    <li>Key rings</li>
                    <li>Flash Disks</li>
                    <li>Gift Sets</li>
                    <li>Coasters</li>
                    <li>Stress balls</li>
                    <li>Mouse pads</li>


                </ul>


            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto ">
                <h3 >Branded Items</h3>
                <ul class="dashed list-unstyled">
                    <li>Pens</li>
                    <li>Lanyards</li>
                    <li>Calendars</li>
                    <li>Receipts, NCR</li>
                    <li>Business Cards</li>
                    <li>Note Pads</li>



                </ul>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 mx-auto ">
                <h3 >Diaries</h3>
                <ul class="dashed list-unstyled">
                    <li>PU Leather</li>
                    <li>Spring Binding</li>
                    <li>Embossed</li>
                    <li>Art Cover Printed</li>
                    <li>Multi-coloured</li>




                </ul>
            </div>



        </div>

        </div>
    </section>
    <section>


            <div class="row mb-5 mt-5 map ">
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto p-5">
                    <h1>Locate Us</h1>
                    <p>Winglobal House, Keekorok Rd. Nairobi Kenya <br>
                    Email: info@cerve.com<br>
                    Tel: 0717102980</p>

                </div>
                <div class="col-sm-10 col-md-7 col-lg-7 mx-auto">
                    <div id="map"></div>
                </div>

            </div>

    </section>
@endsection
@section('scripts')
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: -1.280882, lng:  36.823197};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?AIzaSyCT2DFNVJag-8mF_Jd8v8NML5e4PSK7uUU&callback=initMap"
            type="text/javascript"></script>
@endsection
