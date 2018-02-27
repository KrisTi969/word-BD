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

        <div class="content-area">
            <div class="login-page">
                <div class="container">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center" style="color: honeydew">Sign In Your Account</h2>
                            <form method="post" class="cmxform" action="" id="loginForm">

                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 form-control-label" style="color: honeydew">Username/Email:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username   " required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 form-control-label" style="color: honeydew">Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required />
                                    </div>
                                </div>

                                <div class="form-group row col-sm-offset-2">

                                    <input type="checkbox" id="remember" name="remember" />
                                    <label for="remember" style="color:#093; font-weight: normal"><span style="opacity:.5">

                                        </span>Remember Me</label><br />
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <input type="submit" class="btn btn-success btn-lg btn-block" id="submitForm" value="Sign In" />
                                    </div>
                                </div>

                                <div class="forget">
                                    <p class="pull-left"><a href="forgot_password.html">Forgot Password</a></p>
                                    <p class="pull-right" style="color: honeydew">Not a memeber yet ?<br>
                                        <a href="../register.php">Create a new account</a>
                                    </p>
                                    <div class="clearfix"></div>
                                </div>

                            </form>

                        </div>
                    </div> <!--End Row-->

                </div>
            </div> <!--End Registration page div-->

        </div> <!-- End content Area class -->


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
