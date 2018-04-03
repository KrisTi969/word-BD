<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 22.02.2018
 * Time: 14:07
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

        <div class="content-area" style="background: white">

            <div class="account-page">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">
                            <h2>My Account</h2>
                            <ul>
                                <li  class="active"><a href="account.html">Account Control Panel</a></li>
                                <li><a href="account_information.php">Personal Information</a></li>
                                <li><a href="account_orders.php">My Orders(!)</a></li>
                                <li><a href="account/account_cart.blade.php">My Cart Products</a></li>
                                <li><a href="account_reviews.php">My Reviews and Ratings</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <h2>Account Control Panel</h2>
                            <strong>HELLO ( PHP Name For Each )</strong><br />
                            <p>From your account control panel, you can access all of your recent activites, orders, save products and you can edit your personal information and other details.</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="well">
                                        <h3>Contact Information</h3>
                                        <p>Name : ---</p>
                                        <p>Email : ---</p>
                                        <p><a href="account_change_email.html">Change Email</a> | <a href="account_change_password.html">Change Password</a></p>
                                        <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="well">
                                        <h3>News Letters</h3>
                                        <p>Do you want to get the latest product news and promotion offers then make it on otherwise off it.</p>
                                        <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="well">
                                        <h3>Default Billing Address</h3>
                                        <address class="address">
                                            <strong>Name:</strong> --- <br />
                                            <strong>Email:</strong> --- <br />
                                            <strong>Contact No:</strong> Tel<br />
                                        </address>
                                        <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="well">
                                        <h3>Default Delivery Address Address</h3>
                                        <address class="address">
                                            <strong>Name:</strong> --- <br />
                                            <strong>Address:</strong> <br />
                                            ---<br />
                                            Contact No: ---<br />
                                        </address>
                                        <p class="pull-right"><a href="#"><i class="fa fa-edit"></i> Edit</a></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> <!--End Row-->

                </div>
            </div> <!--End Account page div-->

        </div> <!-- End content Area class -->


        <!--End Login form-->
        <?php include "footer.blade.php"; ?>
    </div> <!-- End wrapper -->
    <!-- Scripts -->
    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../public/js/wow.min.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../public/js/webslidemenu.js"></script>
    <script type="text/javascript" src="../../public/js/main.js"></script>

</body>
</html>

