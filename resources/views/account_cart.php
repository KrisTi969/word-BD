<!DOCTYPE html>
<html>
<?php include "head.blade.php"; ?>
<body>
<div class="wrapper">
    <!-- Header part  -->
    <?php include "header.blade.php";?>
    <!-- Header part  -->


    <div class="content-area" style="background: whitesmoke">

        <div class="account-page">
            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                        <h2>My Account</h2>
                        <ul>
                            <li><a href="account.php">Account Control Panel</a></li>
                            <li><a href="account_information.php">Personal Information</a></li>
                            <li><a href="account_carts.html">My All Orders</a></li>
                            <li class="active"><a href="account_cart.php">My Carts Products</a></li>
                            <li><a href="account_reviews.html">My Reviews and Ratings</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <h2>Account Carts</h2>
                        <div class="cart-page">
                            <form action="checkout.php" method="post">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="50%">Item</th>
                                        <th width="10%">Quantity</th>
                                        <th width="20%">Unit Price</th>
                                        <th width="20%">Total Price</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="images/product-slide/product2.png" width="50" alt="image sau nu ?" class="img img-thumbnail pull-left">
                                            <span class="pull-left cart-product-option">

                                            <strong>Digital Camera</strong><br />
                                            <form action="cart_remove.php" method="get" accept-charset="utf-8">
                                                <input type="hidden" name="product_id" value="1">
                                                <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                            </form>

                                        </span>
                                            <div class="clearfix"></div>
                                        </td>
                                        <td><input type="number" min="1" name="product_quantity_p1" value="2" class="form-control product_quantity_p1" /></td>
                                        <td>200$</td>
                                        <td><p class="total_ammount_p1">400$</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/product-slide/product1.png" width="50" alt="" class="img img-thumbnail pull-left">
                                            <span class="pull-left cart-product-option">

                                            <strong>Samsung Galaxy J7</strong><br />
                                            <form action="cart_remove.php" method="get" accept-charset="utf-8">
                                                <input type="hidden" name="product_id" value="1">
                                                <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                            </form>

                                        </span>
                                            <div class="clearfix"></div>
                                        </td>
                                        <td><input type="number" min="1" name="product_quantity_p2" value="4" class="form-control product_quantity_p2" /></td>
                                        <td>300$</td>
                                        <td><p class="total_ammount_p2">1200$</p></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td colspan="1"><strong>Total:</strong></td>
                                        <td></td>
                                        <td>
                                            <p><span class="total_product_sum">1600$</span></p>
                                        </td>
                                        <div class="clearfix"></div>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <input type="submit"  class="btn btn-yellow btn-lg pull-right margin-bottom-20" name="" value="Continue to Checkout" />
                                            <a href="products.html" class="btn btn-success btn-lg pull-right margin-right-20">
                                                <i class="fa fa-plus"></i> Add More Products</a>

                                            <div class="clearfix"></div>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                            </form>
                        </div> <!--End Cart page-->

                    </div>
                </div> <!--End Row-->



            </div>
        </div> <!--End Account page div-->

    </div> <!-- End content Area class -->


    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-top-address wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                        <div class="header-logo" style=" text-align: center;border-bottom: 1px dotted rgba(247, 12, 38, 0.24);">
                            <a href="index.html">
                                <img src="images/logo.png" alt="Your Shop Logo" class="img img-responsive" style="max-width: 100px">
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Patuakhali Science & Technology University, Dumki-8602, Patuakhali</li>
                            <li><i class="fa fa-mobile"></i> +8801951233084 </li>
                            <li><i class="fa fa-phone"></i> +222 11 4444 </li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:manirujjamanakash@gmail.com"> manirujjamanakash@gmail.com</a></li>
                        </ul>
                    </div>


                </div>
                <div class="col-md-8">
                    <div class="subscribe wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                        <h3>Subscribe here to get some exciting offers</h3>
                        <form action="#" method="post">
                            <input type="text" name="email" placeholder="Enter your Email..." required="">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="all-footer-links">
                        <div class="col-md-4">
                            <h3>Company</h3>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-grids">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="login.html">Returns</a></li>
                                <li><a href="faq.html" class="link">FAQ</a></li>
                                <li><a href="#">Site Map</a></li>
                                <li><a href="login.html">Order Status</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 footer-grids">
                            <h3>Payment Methods</h3>
                            <ul>
                                <li><i class="fa fa-paypal" aria-hidden="true"></i> Paypal</li>
                                <li><i class="fa fa-money" aria-hidden="true"></i> visa</li>
                                <li><i class="fa fa-pie-chart" aria-hidden="true"></i>EMI Conversion</li>
                                <li><i class="fa fa-gift" aria-hidden="true"></i> E-Gift Voucher</li>
                                <li><i class="fa fa-credit-card" aria-hidden="true"></i> Debit/Credit Card</li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="payment-links">
                        <ul>
                            <li><i class="fa fa-cc-paypal" style="color: #FFCC80"></i></li>
                            <li><i class="fa fa-cc-mastercard" style="color: #FFEB3B"></i></li>
                            <li><i class="fa fa-cc-stripe" style="color: yellow"></i></li>
                            <li><i class="fa fa-credit-card" style="color: #FF9800"></i></li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </div> <!-- End Footer top -->

    <div class="footer-bottom">
        <p class="footer-credit">
            &copy;2017 - All rights reserved <a href="index.html">Your shop</a> | Designed by <a href="https://maniruzzaman-akash.blogspot.com"> Maniruzzaman Akash </a>
        </p>
    </div> <!--End Footer bottom -->

    <div class="scroll">
        <a href="#top" class="scroll-to-top hidden">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


</div> <!-- End wrapper -->



<!-- Scripts -->
<script type="text/javascript" src="../../public/js/jquery.min.js"></script>
<script type="text/javascript">
    // Cart adding product increasinf price too
    $(document).ready(function(){

        var product_price_p1 = 200;
        var product_price_p2 = 300;
        var total_product_sum = 0;

        $('.product_quantity_p1, .product_quantity_p2').bind('keyup mouseup change click keydown focus', (function(){

            var quantity_p1 = $('.product_quantity_p1').val();
            var quantity_p2 = $('.product_quantity_p2').val();

            total_ammount_p1 = quantity_p1 * product_price_p1;
            total_ammount_p2 = quantity_p2 * product_price_p2;

            $('.total_product_sum').html(total_product_sum+"$");
            $('.total_ammount_p1').html(total_ammount_p1+"$");
            $('.total_ammount_p2').html(total_ammount_p2+"$");
            total_product_sum = total_ammount_p1 + total_ammount_p2;
            $('.total_product_sum').html(total_product_sum+"$");
        }));
    });

</script>
<script type="text/javascript" src="../../public/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="../../public/js/custom_validations.js"></script>
<script src="../../public/js/wow.min.js"></script>

<script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/js/webslidemenu.js"></script>
<script type="text/javascript" src="../../public/js/main.js"></script>
</body>
</html>