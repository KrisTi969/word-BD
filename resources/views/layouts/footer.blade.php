<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 16.02.2018
 * Time: 11:05
 */
$file_name = basename($_SERVER['SCRIPT_FILENAME']);

$new_path = "";
if($file_name != "index.blade.php") {
    $new_path = "../../public/";
}
?>
<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-top-address wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                    <div class="header-logo" style=" text-align: center;border-bottom: 1px dotted rgba(247, 12, 38, 0.24);">
                        <a href="<?php echo $new_path?>index.php">
                            <p style="position: sticky; ">SkyShop</p>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <ul>
                        <li><i class="fa fa-map-marker"></i>Strada Victoriei, nr Pi</li>
                        <li><i class="fa fa-mobile"></i>+0748105856</li>
                        <li><i class="fa fa-envelope-o"></i>&nbsp;SkyShop@gmail.com</li>
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
                            <li><a href="../about.html">About Us</a></li>
                            <li><a href="../contact.html">Contact Us</a></li>
                            <li><a href="../privacy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-grids">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="../contact.html">Contact Us</a></li>
                            <li><a href="../login.html">Returns</a></li>
                            <li><a href="../faq.html" class="link">FAQ</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="../login.html">Order Status</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-grids">
                        <h3>Payment Methods</h3>
                        <ul>
                            <li><i class="fa fa-paypal" aria-hidden="true"></i> Paypal</li>
                            <li><i class="fa fa-credit-card" aria-hidden="true"></i> Debit/Credit Card</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="payment-links">
                    <ul>
                        <li><i class="fa fa-cc-paypal" style="color: #FFCC80"></i></li>
                        <li><i class="fa fa-cc-mastercard" style="color: #FFEB3B"></i></li>
                        <li><i class="fa fa-cc-visa" style="color: yellow"></i></li>
                        <li><i class="fa fa-credit-card" style="color: #FF9800"></i></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div> <!-- End Footer top -->

<div class="footer-bottom">
    <p class="footer-credit">
        &copy;<script type="text/javascript">document.write(new Date().getFullYear())</script> - All rights reserved <a href="index.blade.php">SkyShop</a> </a>
    </p>
</div> <!--End Footer bottom -->

<div class="scroll">
    <a href="#top" class="scroll-to-top">
        <i class="fa fa-chevron-circle-up"></i>
    </a>
</div> <!--Up Arrow-->