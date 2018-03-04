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

</body>
</html>
