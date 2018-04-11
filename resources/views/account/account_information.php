<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 22.02.2018
 * Time: 14:24
 */

?>
<!DOCTYPE html>
<html>
<?php include "head.blade.php"; ?>
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        <?php include "header.blade.php";?>
        <!--Login form-->


        <div class="content-area" style="background: whitesmoke">

            <div class="account-page">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">
                            <h2>My Account</h2>
                            <ul>
                                <li><a href="account.blade.php">Account Control Panel</a></li>
                                <li  class="active"><a href="account_information.php">Personal Information</a></li>
                                <li><a href="account_order.php">My Orders</a></li>
                                <li><a href="account_cart.blade.php">My Carts</a></li>
                                <li><a href="account_reviews.php">My Reviews and Ratings</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <h2>Edit Account</h2>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <form method="post" class="cmxform" action="" id="signUpForm">

                                        <div class="form-group row">
                                            <label for="firstname" class="col-sm-2 form-control-label">First Name:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="firstname" class="form-control" id="firstname" value="getName" name="name" minlength="2" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastname" class="col-sm-2 form-control-label">Last Name:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="lastname" class="form-control" id="lastname" value="getName">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-control-label">Email:</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" class="form-control email" id="email" value="getMail">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 form-control-label">Username:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="username" class="form-control" id="username" value="getUser">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-control-label">Current Email:</label>
                                            <div class="col-sm-8">
                                                <p class="form-control-static">getCurrentEmail</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 form-control-label">New Email:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" class="form-control" id="email" value="InputNew">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="birthdate" class="col-sm-2 form-control-label">BirthDate:</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="birthdate" id="birthdate"value="getBirthday" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-offset-2 col-sm-8">
                                                <input type="submit" class="btn btn-yellow btn-lg" id="submitForm" value="Save" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!--End Row-->
                        </div>
                    </div> <!--End Row-->

                </div>
            </div> <!--End Account page div-->

        </div> <!-- End content Area class -->



        <!--End Login form-->
        <?php include "footer.blade.php"; ?>
    </div> <!-- End wrapper -->
    <!-- Scripts -->
    <script type="text/javascript" src="../../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../../public/js/wow.min.js"></script>
    <script type="text/javascript" src="../../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../public/js/webslidemenu.js"></script>
    <script type="text/javascript" src="../../../public/js/main.js"></script>

</body>
</html>


