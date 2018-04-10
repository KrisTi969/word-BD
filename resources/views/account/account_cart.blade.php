<!DOCTYPE html>
<html>

@include('layouts.head')
<body>
<div class="wrapper">
    <!-- Header part  -->
@include('layouts.header')
    <!-- Header part  -->


    <div class="content-area" style="background: whitesmoke">

        <div class="account-page">
            <div class="container">

                <div class="row">
                    @if(Auth::check())
                    <div class="col-sm-3">
                        <h2>My Account</h2>
                        <ul>
                            <li><a href="../account.php">Account Control Panel</a></li>
                            <li><a href="../account_information.php">Personal Information</a></li>
                            <li><a href="account_carts.html">My Orders</a></li>
                            <li class="active"><a href="account_cart.blade.php">My Carts Products</a></li>
                            <li><a href="account_reviews.html">My Reviews and Ratings</a></li>
                        </ul>
                    @endif
                    </div>
                    <div class="col-sm-9">
                        <h2>Account Carts</h2>
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
                                    @if(!Auth::check())
                                        <?php foreach(Cart::content() as $row) :?>
                                    <tr>
                                        <td>
                                            <img src="images/product-slide/product2.png" width="50" alt="image sau nu ?" class="img img-thumbnail pull-left">
                                            <span class="pull-left cart-product-option"></span>

                                            <strong><?php echo $row->name ?></strong><br />
                                            <form action="{{route('remove',['id' => $row->rowId])}}" method="get" accept-charset="utf-8">
                                                <input type="hidden" name="product_id" value="1">
                                                <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                            </form>

                                        </span>
                                            <div class="clearfix"></div>
                                        </td>
                                        <td><input type="number" min="1" name="product_quantity_p1" value="1" class="form-control product_quantity_p1" /></td>
                                        <td>{{$row->price}}</td>
                                        <td><p class="total_ammount_p1">{{$row->price*$row->qty}}$</p></td>
                                    </tr>
                                    <?php endforeach;?>
                                        @else
                                        <?php foreach(Cart::content() as $row) :?>
                                        <tr>
                                            <td>
                                                <img src="images/product-slide/product2.png" width="50" alt="image sau nu ?" class="img img-thumbnail pull-left">
                                                <span class="pull-left cart-product-option"></span>

                                                <strong><?php echo $row->name ?></strong><br />
                                                <form action="{{route('remove',['id' => $row->rowId])}}" method="get" accept-charset="utf-8">
                                                    <input type="hidden" name="product_id" value="1">
                                                    <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                                </form>

                                                </span>
                                                <div class="clearfix"></div>
                                            </td>
                                            <td><input type="number" min="1" name="product_quantity_p1" value="1" class="form-control product_quantity_p1" /></td>
                                            <td>{{$row->price}}</td>
                                            <td><p class="total_ammount_p1">{{$row->price*$row->qty}}$</p></td>
                                        </tr>
                                       <?php endforeach;?>
                                        @endif


                                    {{--/////////////////////--}}
                                    <tr>
                                        <td></td>
                                        <td colspan="1"><strong>Total:</strong></td>
                                        <td></td>
                                        <td>
                                            <p><span class="total_product_sum">{{\App\Http\Controllers\Cart\CartController::cartTotal()}}$</span></p>
                                        </td>
                                        <div class="clearfix"></div>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <a href="{{route('checkout')}}" class="btn btn-yellow btn-lg pull-right margin-bottom-20">
                                                <i class="fa"></i> Continue to checkout</a>
                                            <a href="{{route('/')}}" class="btn btn-success btn-lg pull-right margin-right-20">
                                                <i class="fa fa-plus"></i> Add More Products</a>

                                            <div class="clearfix"></div>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>
                        </div> <!--End Cart page-->

                    </div>
                </div> <!--End Row-->



            </div>
        </div> <!--End Account page div-->

    </div> <!-- End content Area class -->


  @include('layouts.footer')


</div> <!-- End wrapper -->



<!-- Scripts -->
<script type="text/javascript" src="../../../public/js/jquery.min.js"></script>
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
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/custom_validations.js')}}"></script>
<script src="../../../public/js/wow.min.js"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>
</body>
</html>