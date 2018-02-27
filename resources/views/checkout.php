<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 23.02.2018
 * Time: 15:09
 */
?>
<!DOCTYPE html>
<html>
<?php include "head.blade.php";?>
<body>
<div class="wrapper">
    <!-- Header part  -->
    <?php include "header.blade.php"; ?>
    <!-- Header part  -->

    <div class="content-area">
        <div class="container">
            <div class="checkout-page">
                <h2>Checkout  process</h2>
                <div class="checkout-top-ok">
                    <span id="check-one-top">1</span><span class="check-dots">-----></span>
                    <span id="check-two-top">2</span><span class="check-dots">-----></span>
                    <span id="check-three-top">3    </span>
                </div>
                <form action="" method="POST" class="form-horizontal" role="form" id="checkoutForm">

                    <div id="check1">
                        <h3>Basic Informations</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="checkoutEmail">Email: *</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control inputs" id="checkoutEmail" placeholder="Enter email" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="checkoutContact">Contact: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="checkoutContact" placeholder="0748105856 "  required/>
                                <span class="input-hint">Phone number</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn1" name="submit_check1" value="Next..."/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check1 -->


                    <div id="check2" class="hidden">

                        <h3>Shipping Address Informations</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_name">Shipping Name: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="shipping_name" value="getName" placeholder="Enter Your Shipping Name"  required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_contact">Shipping Contact: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" value="getTel" id="shipping_contact" placeholder="Enter Your Shipping Contact No"  required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_primary_address">Shipping Primary Address: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="shipping_primary_address" placeholder="Enter Your Shipping primary Address" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_secondary_address">Shipping secondary Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="shipping_secondary_address" placeholder="Enter Your Shipping Secondary or optional Address" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn2" name="submit_check2" value="Next..."/>

                                <input type="button" class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck1" name="backToCheck1" value="Back"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check2 -->
                    <div id="check3" class="hidden">

                        <h3>Payment Method Informations</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address_primary">Select Payment Option: *</label>
                            <div class="col-sm-10">
                                <select name="payments" id="payments" class="form-control inputs"  required>
                                    <option value="">Select A payment method</option>
                                    <option value="payment_paypal">Paypal</option>
                                    <option value="payment_stripe">Stripe</option>
                                    <option value="payment_visa">Visa</option>
                                </select>
                                <div class="payment-div payment-div-paypal hidden">
                                    <i class="fa fa-cc-paypal"></i> <br />
                                    <a href="" class="btn btn-lg btn-yellow">Payment Via Paypal Now</a>
                                </div>
                                <div class="payment-div payment-div-stripe hidden">
                                    <i class="fa fa-cc-stripe"></i> <br />
                                    <a href="" class="btn btn-lg btn-yellow">Payment Via Stripe Now</a>
                                </div>
                                <div class="payment-div payment-div-visa hidden">
                                    <i class="fa fa-cc-visa"></i> <br />
                                    <a href="" class="btn btn-lg btn-yellow">Payment Via visa Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" class="btn btn-info pull-right  margin-top-20" name="submit_check1" value="Finish Order"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check3 -->

                </form>
            </div> <!--End Checkout page -->
        </div> <!-- End Container -->

    </div> <!-- End content Area class -->

    <?php include "footer.blade.php";?>

</div> <!-- End wrapper -->

<!-- Scripts -->

<script type="text/javascript" src="../../public/js/jquery.min.js"></script>
<script type="text/javascript" src="../../public/js/owl.carousel.min.js"></script>

<script type="text/javascript" src="../../public/js/jquery.validate.min.js"></script>


<script type="text/javascript">
    //Scripts for checkout functions one by one input fields.
    jQuery(document).ready(function() {

        $('.checkbtn1').click(function() {

            var email = $('#checkoutEmail').val();
            var contact = $('#checkoutContact').val();
            var pass_check1 = false;

            if(email == null || email == "" || ((/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i).test(email) == false))
            {
                pass_check1 = false;
                $('#checkoutEmail').focus();
                $('#checkoutEmail').addClass('error-input');
            }else{
                pass_check1 = true;
                $('#checkoutContact').focus();
                $('#checkoutEmail').removeClass('error-input');
                $('#checkoutEmail').addClass('success-input');

                if(contact == null || contact == "" || contact =="")
                {
                    pass_check1 = false;
                    $('#checkoutContact').focus();
                    $('#checkoutContact').addClass('error-input');
                }else{
                    pass_check1 = true;
                    $('#checkoutContact').removeClass('error-input');
                    $('#checkoutContact').addClass('success-input');

                }
            }
            if (pass_check1 != false) {
                //Focus on next div's element and remove hidden class from it.
                // $('#check1').addClass('animated fadeOut');
                $('#check1').addClass('hidden');
                $('#check-one-top').html('<i class="fa fa-check"></i>');
                $('#check-one-top').css({"background-color": "#bb0728"});
                $('#check-two-top').css({"background-color": "#ffa900"});
                $('#check2').removeClass('hidden');
                $('#check2').show('slow');
                $('#shipping_name').focus();
            }
        });

        //Onclick Check button 2
        $('.checkbtn2').click(function() {
            var shipping_name = $('#shipping_name').val();
            var shipping_contact = $('#shipping_contact').val();
            var shipping_primary_address = $('#shipping_primary_address').val();
            var shipping_secondary_address = $('#shipping_secondary_address').val();
            var shipping_nearest_city = $('#shipping_nearest_city').val();
            var pass_check2 = false;
            if (shipping_name === null || shipping_name === "") {
                $('#shipping_name').focus();
                $('#shipping_name').addClass('error-input');
            }else{
                $('#shipping_name').addClass('success-input');
                if (shipping_contact === null || shipping_contact === "") {
                    $('#shipping_name').focus();
                    $('#shipping_name').addClass('error-input');
                }else{
                    $('#shipping_contact').addClass('success-input');
                    if (shipping_primary_address === null || shipping_primary_address === "") {
                        $('#shipping_primary_address').focus();
                        $('#shipping_primary_address').addClass('error-input');
                    }else{

                        $('#shipping_primary_address').addClass('success-input');
                        $('#shipping_secondary_address').addClass('success-input');
                        if (shipping_nearest_city === null || shipping_nearest_city === "") {
                            $('#shipping_nearest_city').focus();
                            $('#shipping_nearest_city').addClass('error-input');
                        }else{
                            pass_check2 = true;
                        }
                    }
                }
            }

            if (pass_check2 != false) {
                $('#check2').addClass('hidden');
                $('#check-two-top').html('<i class="fa fa-check"></i>');
                $('#check-two-top').css({"background-color": "#bb0018"});
                $('#check-three-top').css({"background-color": "#ffa900"});
                $('#check3').removeClass('hidden');
                $('#check3').show('slow');
                $('#payments').focus();
            }
        });


        $('.backToCheck1').click(function() {
            pass_check1 = false;
            $('#check1').removeClass('hidden');
            $('#check2').addClass('hidden');

            $('#check-one-top').html('1');
            $('#check-one-top').css({"background-color": "#14074c"});
            $('#check-two-top').css({"background-color": "#bb0018"});
        });

        $('.backToCheck2').click(function() {
            pass_check2 = false;
            $('#check2').removeClass('hidden');
            $('#check3').addClass('hidden');

            $('#check-two-top').html('1');
            $('#check-two-top').css({"background-color": "#001b4c"});
            $('#check-three-top').css({"background-color": "#5fbb32"});
        });

        // Onclick Payment select option payment list will apear

        $('#payments').change(function(){
            var payment_method = $('#payments').val();

            if (payment_method === "payment_paypal") {
                $('.payment-div-paypal').removeClass('hidden');
                $('.payment-div-paypal').addClass('animated slideInLeft');
                $('.payment-div-visa').addClass('hidden');
                $('.payment-div-stripe').addClass('hidden');
            }
            if (payment_method === "payment_stripe") {
                $('.payment-div-stripe').removeClass('hidden');
                $('.payment-div-stripe').addClass('animated slideInUp');
                $('.payment-div-paypal').addClass('hidden');
                $('.payment-div-visa').addClass('hidden');
            }
            if (payment_method === "payment_visa") {
                $('.payment-div-visa').removeClass('hidden');
                $('.payment-div-visa').addClass('animated slideInRight');
                $('.payment-div-paypal').addClass('hidden');
                $('.payment-div-stripe').addClass('hidden');
            }

        });


    });

</script>

<script src="../../public/js/wow.min.js"></script>

<script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../public/js/webslidemenu.js"></script>
<script type="text/javascript" src="../../public/js/main.js"></script>
</body>
</html>