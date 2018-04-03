<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 19.02.2018
 * Time: 14:27
 */
?>
        <!DOCTYPE html>
<html>
@include('layouts.head')
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
    @include('layouts.header')
    <!--Login form-->
        @section('content')

            <div class="container">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registration Confirmed</div>
                        <div class="panel-body">
                            Your Email is successfully verified. Click here to <a href=”{{url('/login')}}”>login</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection

        <!--End Login form-->
        @include('layouts.footer')
    </div> <!-- End wrapper -->
</div>
<!-- Scripts -->

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript">
    $("#search").autocomplete({
        source: function(request, response){
            $.get("http://127.0.0.1:8000/autocomplete", {
                term:request.term
            }, function(data){
                response($.map(data, function(item) {
                    return {
                        value: item.id,
                        label: item.title
                    }
                }))
            }, "json");
        },
        select: function( event, ui ) {
            console.log( ui.item ?
                "Selected: " + ui.item.label :
                "Nothing selected, input was " + this.value);
            window.location.href = "/Product/" + ui.item.value;
        },
        minLength: 2,
        dataType: "json",
        cache: false
    });
</script>
</body>
</html>
