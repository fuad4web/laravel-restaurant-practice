<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" href="assets/css/mystyle.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/redirects')}}" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            
                            @auth 
                                <li class="scroll-to-section"><a href="{{url('/showcart', Auth::user()->id)}}">Cart[{{$count}}]</a></li>
                            @endauth

                            @guest
                                <li class="scroll-to-section"><a href="#">Cart[0]</a></li>
                            @endguest

                            <li>
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                            <li>
                                                <x-app-layout> 
                                                </x-app-layout>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                            </li>

                                            @if (Route::has('register'))
                                                <li>
                                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                </li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li>
                        </ul>        
                        <!-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> -->
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <form action="{{url('/savecart')}}" method="post">
                    @csrf

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th> Foodname </th>
                                <th> Price </th>
                                <th> Quantity </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                    @foreach($cart_items as $cart_item)
                        <tr>
                            <td>
                                {{$cart_item -> id}}
                            </td>
                            <td>
                                {{$cart_item -> title}}
                                <input type="hidden" name="foodname[]" value="{{$cart_item -> title}}">
                            </td>
                            <td>
                                ${{$cart_item -> price * $cart_item -> quantity}}
                                <input type="hidden" name="foodprice[]" value="${{$cart_item -> price * $cart_item -> quantity}}">
                            </td>
                            <td>
                                {{$cart_item -> quantity}}
                                <input type="hidden" name="foodquantity[]" value="{{$cart_item -> quantity}}">
                            </td>
                        </tr>
                    @endforeach

                    @foreach($cart_items2 as $cart_item2)
                        <tr>
                            <td><a href="{{url('/removecart', $cart_item2->id)}}" style="text-decoration: none;">Remove</a></td>
                        </tr>
                    @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

        <center>
            <div class="col-lg-12">
                <button type="button" id="show-cart-info" class="main-button-icon btn btn-success py-2 px-5 my-5">Show my Info</button>
            </div>
        </center>

    <section class="section">
        <div class="container">
            <div id="cart-info" class="contact-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-center my-4">My Informations</h2>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <input name="name" type="text" value="{{$infoname}}" id="name" placeholder="Your Name*" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <input name="phone" type="number" id="phone" placeholder="Phone Number*" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <fieldset>
                                <input name="address" type="text" id="" placeholder="Your Address" required="">
                            </fieldset>
                        </div>
                    </div>
                    <center>
                        <div class="col-lg-8 col-sm-12">
                            <fieldset>
                                <button type="submit" id="" class="main-button-icon btn btn-danger py-2 px-5 my-5">Order</button>
                            </fieldset>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </section>

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/myjs.js"></script>
    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>