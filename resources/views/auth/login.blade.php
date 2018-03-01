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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" style="color:honeydew;">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right" style="color:honeydew;">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color:honeydew;">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row col-sm-offset-9">
                            <div class="col-md-10s offset-md-4">
                                <div class="checkbox">
                                    <label style="color: red; "id="rememeber" name="remember">
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span style="opacity: .5">Remember Me
                                        </span></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row col-sm-offset-2">

                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <label for="remember" style="color:#093; font-weight: normal"><span style="opacity:.5">

                                        </span>Remember Me</label><br />
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
