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

        <br><br><br><br><br>
    <div class="container">
        <div class="row col-md-offset-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header col-md-offset-4 Whitish \" >Reset Password</div>
                    <br><br><br>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label Whitish">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div >
                                <div>
                                    <button type="submit" class="btn btn-primary col-md-offset-5 red">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <br>
        <br><br><br><br><br><br><br>
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
