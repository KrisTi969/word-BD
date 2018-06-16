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
@include('layouts.head')
<body>
<div class="wrapper">
    <!-- Header part  -->
    @include('layouts.header')
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
                <form action="/newOrder" method="POST" class="form-horizontal" role="form" id="checkoutForm">
                    {{ csrf_field() }}
                    <div id="check1">
                        <h3>Basic Informations</h3>
                        @if(!Auth::check())
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="checkoutEmail">Email: *</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control inputs" id="checkoutEmail" placeholder="Enter email"  required/>
                                <span class="text-danger">
                                        <strong id="mail-error"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="checkoutContact">Contact: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="checkoutContact" placeholder="Enter phone number"  required/>
                                <span class="text-danger">
                                        <strong id="contact-error"></strong>
                                    </span><br>
                                <span class="input-hint">Phone number</span>
                            </div>
                        </div>
                        @else
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="checkoutEmail">Email: *</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control inputs" id="checkoutEmail" placeholder="Enter email" value="{{Auth::user()->email}}" required/>
                                    <span class="text-danger">
                                        <strong id="mail-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="checkoutContact">Contact: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" id="checkoutContact" placeholder="Enter phone number" value="{{Auth::user()->phone_number}}"  required/>
                                    <span class="text-danger">
                                        <strong id="contact-error"></strong>
                                    </span><br>
                                    <span class="input-hint">Phone number</span>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn1" id="checkbtn1" name="submit_check1" value="Next..."/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check1 -->

                    @if(Auth::check())
                    <div id="check2" class="hidden">
                        <h3>Shipping Address Informations</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_name">Shipping Name: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" id="shipping_name" value="{{Auth::user()->name . " " .  Auth::user()->lname}}" placeholder="Enter Your Shipping Name"  required/>
                                <span class="text-danger">
                                        <strong id="shipping_name-error"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_country">Country: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" value="{{Auth::user()->country}}" id="shipping_country" placeholder="Enter Your Country"  required/>
                                <span class="text-danger">
                                        <strong id="shipping_country-error"></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_city">Shipping City: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" value="{{Auth::user()->city}}" id="shipping_city" placeholder="Enter Your Shipping City "  required/>
                                <span class="text-danger">
                                        <strong id="shipping_city-error"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_address">Shipping Address: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" value="{{Auth::user()->address}}" id="shipping_address" placeholder="Enter Your Shipping Address"  required/>
                                <span class="text-danger">
                                        <strong id="shipping_address-error"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_postal">Postal Code: *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control inputs" value="{{Auth::user()->postal_code}}" id="shipping_postal" placeholder="Enter Your Postal Code"  required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shipping_notes">Notes: *</label>
                            <div class="col-sm-10">
                                <textarea class="form-control inputs"  id="shipping_notes" placeholder="Enter Additional Details"></textarea>
                                <span class="text-danger">
                                        <strong id="shipping_notes-error"></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn2" id="submit_check2" name="submit_check2" value="Next..."/>

                                <input type="button" class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck1" name="backToCheck1" value="Back"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check2 -->
                    @else
                        <div id="check2" class="hidden">

                            <h3>Shipping Address Informations</h3>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_name">Shipping Name: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" id="shipping_name" value="" placeholder="Enter Your Shipping Name"  required/>
                                    <span class="text-danger">
                                        <strong id="shipping_name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_country">Country: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" value="" id="shipping_country" placeholder="Enter Your Country"  required/>
                                    <span class="text-danger">
                                        <strong id="shipping_country-error"></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_city">Shipping City: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" value="" id="shipping_city" placeholder="Enter Your Shipping City"  required/>
                                    <span class="text-danger">
                                        <strong id="shipping_city-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_address">Shipping Address: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" value="" id="shipping_address" placeholder="Enter Your Shipping Address"  required/>
                                    <span class="text-danger">
                                        <strong id="shipping_address-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_postal">Postal Code: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inputs" value="" id="shipping_postal" placeholder="Enter Your Postal Code"  required/>
                                    <span class="text-danger">
                                        <strong id="shipping_postal-error"></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="shipping_notes">Notes: *</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control inputs"  id="shipping_notes" placeholder="Enter Additional Details"></textarea>
                                    <span class="text-danger">
                                        <strong id="shipping_notes-error"></strong>
                                    </span>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn2" id="submit_check2" name="submit_check2" value="Next..."/>

                                    <input type="button" class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck1" name="backToCheck1" value="Back"/>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div> <!-- End check2 for non loggged in-->
                    @endif
                    <div id="check3" class="hidden">

                        <h3>Payment Method Informations</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address_primary">Select Payment Option: *</label>
                            <div class="col-sm-10">
                                <select name="payment" id="payment" class="form-control inputs"  required>
                                    <option value="">Select A payment method</option>
                                    <option value="cash">Cash on arrival</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="stripe">Stripe</option>
                                    <option value="visa">Visa</option>
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
                            <div class="cart-page">
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
                                    {{--/////////////////////--}}
                                        <?php foreach(Cart::content() as $row) :?>
                                        <tr>
                                            <td>
                                                <img src="http://127.0.0.1:8000/uploads/{{App\Http\Controllers\Product\ProductController::getProductImage($row->name)}}" width="50" alt="no image?" class="img img-thumbnail pull-left">
                                                <span class="pull-left cart-product-option"></span>

                                                <strong><?php echo $row->name ?></strong><br />

                                                </span>
                                                <div class="clearfix"></div>
                                            </td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->price}}$</td>
                                            <td><p class="total_ammount_p1">{{$row->price*$row->qty}}$</p></td>
                                        </tr>
                                        <?php endforeach;?>


                                    {{--/////////////////////--}}
                                    <tr>
                                        <td></td>
                                        <td colspan="1"><strong>Total (10% Tax):</strong></td>
                                        <td></td>
                                        <td>
                                            <p><span class="total_product_sum">{{\App\Http\Controllers\Cart\CartController::cartTotal()}}$</span></p>
                                        </td>
                                        <div class="clearfix"></div>
                                    </tr>

                                    </tbody>

                                </table>
                            </div> <!--End Cart page-->

                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" class="submitOrder btn btn-info pull-right  margin-top-20" name="submit_check1" value="Finish Order"/>
                                <input type="button" class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck2" name="backToCheck2" value="Back"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> <!-- End check3 -->

                </form>




            </div> <!--End Checkout page -->
        </div> <!-- End Container -->

    </div> <!-- End content Area class -->

    @include('layouts.footer')

</div> <!-- End wrapper -->

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

<script type="text/javascript" src="{{asset('js/order.js')}}"></script>

<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>
<script>
    jQuery('#submit_check2').click(function(e){
        // jQuery('.alert').show();
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ route('verifyOrder2')}}",
            method: 'post',
            dataType: "json",
            data: {
                name: jQuery('#shipping_name').val(),
                country: jQuery('#shipping_country').val(),
                city: jQuery('#shipping_city').val(),
                address: jQuery('#shipping_address').val(),
                postal: jQuery('#shipping_postal').val(),
                notes: jQuery('#shipping_notes').val()
            },
            success:function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#shipping_name-error').html(data.errors.name[0]);
                    }
                    if (data.errors.country) {
                        $('#shipping_country-error').html(data.errors.country[0]);
                    }
                    if (data.errors.city) {
                        $('#shipping_city-error').html(data.errors.city[0]);
                    }
                    if (data.errors.address) {
                        $('#shipping_address-error').html(data.errors.address[0]);
                    }
                    if (data.errors.postal) {
                        $('#shipping_postal-error').html(data.errors.postal[0]);
                    }
                    if (data.errors.notes) {
                        $('#shipping_notes-error').html(data.errors.notes[0]);
                    }

                }
                if (data.success) {
                    //Focus on next div's element and remove hidden class from it.
                    // $('#check1').addClass('animated fadeOut');
                    $('#check2').addClass('hidden');
                    $('#check-two-top').html('<i class="fa fa-check"></i>');
                    $('#check-two-top').css({"background-color": "#bb0018"});
                    $('#check-three-top').css({"background-color": "#ffa900"});
                    $('#check3').removeClass('hidden');
                    $('#check3').show('slow');
                    $('#payments').focus();
                }
            }
        });
    });


</script>
<script type="text/javascript">
    //Scripts for checkout functions one by one input fields.
    jQuery(document).ready(function() {

        jQuery('#checkbtn1').click(function(e){
            // jQuery('.alert').show();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ route('verifyOrder')}}",
                method: 'post',
                dataType: "json",
                data: {
                    email: jQuery('#checkoutEmail').val(),
                    contact: jQuery('#checkoutContact').val()
                },
                success:function(data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.email) {
                            $('#mail-error').html(data.errors.email[0]);
                        }
                        if (data.errors.contact) {
                            $('#contact-error').html(data.errors.contact[0]);
                        }

                    }
                    if (data.success) {
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
                }
            });
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

            $('#check-two-top').html('2');
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

</body>
</html>