<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 16.02.2018
 * Time: 17:31
 */
?>
<head>
    <title>Skyshop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta http-equiv="Content-Language" content="en-US"/>
    <meta name="_token" content="{{csrf_token()}}" />
    <!-- CSS links -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} "/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/datepicker.css') }} " />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/flexslider.css') }} "/>
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/animate.css') }} " />

    <!-- Owl Carousel CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }} " />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }} " />

    <!-- Mega navigation bar -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/webslidemenu.css') }} " />

    <!-- Main css link -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }} " />
    {{--jquery-3.3.1.min.js adaugat ultimul--}}
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{asset('js/bootstrap-rating-input.min.js')}}" type="text/javascript"></script>
</head>
