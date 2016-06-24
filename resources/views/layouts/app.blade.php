<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wimtech</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<!--header-->
    @if(\Auth::guest())
           @if(Request::getRequestUri() == '/laptops' || Request::is('category/*') || Request::is('product/*'))

                <link href="{{ asset('css/style_laptop.css')}}" rel="stylesheet" type="text/css" media="all" />
               <script src="{{ asset('js/jquery.min.js')}}"></script>
                <link href="{{ asset('css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all" />
                <script type="text/javascript" src="{{ asset('js/megamenu.js')}}"></script>
                <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
                <script src="{{ asset('js/menu_jquery.js')}}"></script>
                <script src="{{ asset('js/simpleCart.min.js')}}"> </script>
                <script type="text/javascript" src="{{ asset('js/move-top.js')}}"></script>
                <script type="text/javascript" src="{{ asset('js/easing.js')}}"></script>
                <script type="text/javascript">
                			jQuery(document).ready(function($) {
                				$(".scroll").click(function(event){
                					event.preventDefault();
                					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                				});
                			});
                </script>
                <script type="text/javascript" src="{{ asset('js/jquery.jscrollpane.min.js')}}"></script>
                		<script type="text/javascript" id="sourcecode">
                			$(function()
                			{
                				$('.scroll-pane').jScrollPane();
                			});
                		</script>

                <!-- header_top -->
                <div class="top_bg" id="home">
                	<div class="container">
                		<div class="header_top">
                			<div class="top_right">
                				<ul>
                					<li><a href="#">WIMTECH</a></li>
                					<li><a href="#">Collectios</a></li>
                					<li><a href="#"></a></li>
                				</ul>
                			</div>
                			<div class="top_left">
                				<h6><span></span> Call us : 032 2352 782</h6>
                			</div>
                				<div class="clearfix"> </div>
                		</div>
                	</div>
                </div>
                <!-- header -->
           @endif

           @if(Request::getRequestUri() == '/')
               <!--menu-->
               <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
               <!--//menu-->
               <!--theme-style-->
               <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />


            <div class="navigation">
                    <div class="container-fluid">
                        <nav class="pull">
                            <ul>
                                <li><a  href="index.html">Home</a></li>
                                <li></li>
                                <li></li>
                                <li><a  href="terms.html">Terms</a></li>
                                <li></li>
                                <li><a  href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
            </div>

            <div class="header">
                <div class="container">
                    <!--logo-->
                        <div class="logo">
                            <h1><a href="index.html">WIMTECH collections</a></h1>
                        </div>
                    <!--//logo-->
                    <div class="top-nav">
                        <ul class="right-icons">
                            <li><span ><i class="glyphicon glyphicon-phone"> </i></span></li>
                             </a></li>

                        </ul>
                        <div class="nav-icon">
                            <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                                    <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
                            </div>
                            <!---
                            <a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
                        --->
                        </div>
                    </div>
                </div>
            </div>
            @endif

    @endif



    @if(!\Auth::guest())

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   Wimtech Admin
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('category/create') }}">Add Category</a></li>
                    <li><a href="{{ url('orders') }}">Orders</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @endif

    @yield('content')


    @if(Request::getRequestUri() == '/')
    @if(\Auth::guest())
    <!--header-bottom-->
    	<div class="banner-bottom-top">
    			<div class="container">
    			<div class="bottom-header">
    				<div class="header-bottom">
    				    @if($categories->count())
    				    @foreach($categories as $category)
    					<div class=" bottom-head">
    						<a href="{{url('category/'.$category->id)}}">
    							<div class="buy-media">
    								<i class="{{$category->category_class}}"> </i>
    								<h6>{{$category->category_name}}</h6>
    							</div>
    						</a>
    					</div>
    					@endforeach
    					@endif

    					<div class="clearfix"> </div>
    				</div>
    			</div>
    	</div>
    	</div>
    	@endif
    	@endif
    			<!--//-->

    	@if(Request::getRequestUri() == '/')

    	@if(\Auth::guest())

    	<!--//header-bottom-->


    		<div class="footer-bottom">
        		<div class="container">
        			<div class="col-md-4 footer-logo">
        				<h2><a href="index.html">WIMTECH </a></h2>
        			</div>
        			<div class="col-md-8 footer-class">
        				<p >© 2016 WIMTECH collections LTD. All Rights Reserved | Design by  <a href="http:/" target="_blank">Bethoven</a> </p>
        			</div>
        		<div class="clearfix"> </div>
        	 	</div>
        	</div>
        </div>
        <!--//footer-->

        @endif
        @endif

    <!-- JavaScripts -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="{{ asset('js/responsiveslides.min.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
       <script>
        $(function () {
          $("#slider").responsiveSlides({
          	auto: true,
          	speed: 500,
            namespace: "callbacks",
            pager: true,
          });
        });
      </script>

<script>
   simpleCart({
   currency: "Kshs",
   checkout: {
         type: "SendForm" ,
          url: "/checkout" ,
          method: "POST" ,
          success: "checkout/success" ,
          cancel: "checkout/cancel",

                  extra_data: {
                    name: document.getElementById('name').value,
                    phone_number  : document.getElementById('phone_number').value,
                    email: document.getElementById('email').value,
                    town: document.getElementById('town').value,
                  }
   },
   cartColumns: [
    { attr: "name", label: "Name" } ,
    { attr: "price" , label: "Price", view: 'currency' } ,
    { attr: "quantity" , label: "Qty" } ,
    { attr: "total" , label: "SubTotal", view: 'currency' } ,
    { view: "remove" , text: "Remove Item" , label: false }
],
cartStyle : "table"
   });

   simpleCart.currency({
       code: "Kshs" ,
       name: "Kenya Shilling" ,
       symbol: "Kshs" ,
       delimiter: " " ,
       decimal: "," ,
       after: true ,
       accuracy: 3
   });

   simpleCart.bind( 'beforeCheckout' , function( data ){
   data.name = document.getElementById("name").value;
   data.phone_number = document.getElementById("phone_number").value;
   data.email = document.getElementById("email").value;
   data.town = document.getElementById("town").value;
   });

</script>
</body>
</html>
