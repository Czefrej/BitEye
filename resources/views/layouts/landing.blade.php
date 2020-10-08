<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>BitEye | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset("assets/biteye-signet.svg")}}">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{asset("assets/css/landing/style.css")}}">
</head>
<body>
<!-- Preloader-->
<div id="preloader">
    <div class="apland-load"></div>
</div>
<!-- Content Wrapper Area-->
@yield('content')
<!-- jQuery(necessary for all JavaScript plugins)-->
<script src="{{asset("assets/js/landing/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/landing/popper.min.js")}}"></script>
<script src="{{asset("assets/js/landing/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/landing/owl.carousel.min.js")}}"></script>
<script src="{{asset("assets/js/landing/waypoints.min.js")}}"></script>
<script src="{{asset("assets/js/landing/jquery.easing.min.js")}}"></script>
<script src="{{asset("assets/js/landing/default/classy-nav.min.js")}}"></script>
<script src="{{asset("assets/js/landing/default/sticky.js")}}"></script>
<script src="{{asset("assets/js/landing/default/mail.js")}}"></script>
<script src="{{asset("assets/js/landing/default/scrollup.min.js")}}"></script>
<script src="{{asset("assets/js/landing/default/one-page-nav.js")}}"></script>
<script src="{{asset("assets/js/landing/jarallax.min.js")}}"></script>
<script src="{{asset("assets/js/landing/jarallax-video.min.js")}}"></script>
<script src="{{asset("assets/js/landing/jquery.counterup.min.js")}}"></script>
<script src="{{asset("assets/js/landing/jquery.countdown.min.js")}}"></script>
<script src="{{asset("assets/js/landing/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("assets/js/landing/wow.min.js")}}"></script>
<script src="{{asset("assets/js/landing/default/active.js")}}"></script>
</body>
</html>
