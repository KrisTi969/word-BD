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
                            <li><a href="{{route('Account')}}">Account Control Panel</a></li>
                            <li><a href="{{route('Orders')}}">My Orders</a></li>
                            <li><a href="{{route('getWishlists')}}">My Wishlists</a></li>
                            <li class="active"><a href="{{route('seeCart')}}">My Carts Products</a></li>
                            <li><a href="{{route('Reviews')}}">My Reviews and Ratings</a></li>
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
                                       @foreach(Cart::content() as $row)
                                    <tr>
                                        <td>
                                            <img src="http://127.0.0.1:8000/uploads/{{\App\Http\Controllers\Product\ProductController::getProductImage($row->name)}}" width="50" alt="image sau nu ?" class="img img-thumbnail pull-left">
                                            <span class="pull-left cart-product-option"></span>

                                            <strong><?php echo $row->name ?></strong><br />
                                            <form action="{{route('remove',['id' => $row->rowId])}}" method="get" accept-charset="utf-8">
                                                <input type="hidden" name="product_id" value="1">
                                                <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                            </form>

                                        </span>
                                            <div class="clearfix"></div>
                                        </td>

                                        <td><input id="cart-qty-{{$loop->iteration}}" type="number" min="1" name="product_quantity_p1" value="{{$row->qty}}" class="form-control product_quantity_p1" />
                                            <a href="#" onclick="updateQTY(new_quantity = document.getElementById('cart-qty-{{$loop->iteration}}').value, id = '{{$row->rowId}}', idProd = '{{$row->id}}')" id="updateQTY">Update Quantity</a></td>

                                        <td>{{$row->price}}</td>
                                        <td><p class="total_ammount_p1">{{$row->price*$row->qty}}$</p></td>
                                    </tr>
                                   @endforeach
                                        @else
                                        @foreach(Cart::content() as $row)
                                            <tr>
                                                <td>
                                                    <img src="http://127.0.0.1:8000/uploads/{{\App\Http\Controllers\Product\ProductController::getProductImage($row->name)}}" width="50" alt="image sau nu ?" class="img img-thumbnail pull-left">
                                                    <span class="pull-left cart-product-option"></span>

                                                    <strong><?php echo $row->name ?></strong><br />
                                                    <form action="{{route('remove',['id' => $row->rowId])}}" method="get" accept-charset="utf-8">
                                                        <input type="hidden" name="product_id" value="1">
                                                        <input type="submit" class="btn btn-red btn-sm" name="" value="Remove Item">
                                                    </form>

                                                    </span>
                                                    <div class="clearfix"></div>
                                                </td>

                                                <td><input id="cart-qty-{{$loop->iteration}}" type="number" min="1" name="product_quantity_p1" value="{{$row->qty}}" class="form-control product_quantity_p1" />
                                                    <a href="#" onclick="updateQTY(new_quantity = document.getElementById('cart-qty-{{$loop->iteration}}').value, id = '{{$row->rowId}}', idProd = '{{$row->id}}')" id="updateQTY">Update Quantity</a></td>

                                                <td>{{$row->price}}</td>
                                                <td><p class="total_ammount_p1">{{$row->price*$row->qty}}$</p></td>
                                            </tr>
                                        @endforeach
                                        @endif


                                    {{--/////////////////////--}}
                                    <tr>
                                        <td></td>
                                        <td colspan="1"><strong>Total:</strong></td>
                                        <td></td>
                                        <td>
                                            <p><span class="total_product_sum">{{\App\Http\Controllers\Cart\CartController::cartTotal()}}$ (10% Tax)</span></p>
                                        </td>
                                        <div class="clearfix"></div>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <a href="{{route('checkout')}}" class="btn btn-yellow btn-lg pull-right margin-bottom-20">
                                                <i class="fa"></i> Continue to checkout</a>
                                            <a href="{{route('/')}}" class="btn btn-success btn-lg pull-right margin-right-20">
                                                <i class="fa fa-plus"></i> Add More Products</a>
                                            @foreach(Cart::content() as $row)
                                                @if($row)
                                            <button type="button" class="btn btn-warning btn-lg pull-left margin-right-20"data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="fa fa-heart"></i> Save as Wishlist</button>
                                                @endif
                                                @break

                                            @endforeach

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Save Wishlist</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="success-msg" class="hidden">
                                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <strong>Success!</strong> Cart saved as wishlist !
                                                                </div>
                                                            </div>
                                                            <label for="name" >Wishlist name:</label>
                                                            <input id="name" type="text">
                                                            <span class="text-danger">
                                                                <strong id="name-error"></strong>
                                                            </span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id="ajaxSubmit" value="Save Wishlist">Save Wishlist </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script>
    function updateQTY( a, b, c){
        // e.preventDefault();
        //  alert(a + b);
         console.log(a + b + " " + c);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        {{--console.log({{route('updateCart')}})--}}
        jQuery.ajax({
            url: "{{route('updateCart')}}",
            method: 'post',
            dataType: "json",
            data: {
                id: b,
                quantity : a,
                idProd : c,
            },
            success:function(data) {
                if(data.success ) {
                    console.log(data);
                    location.reload(true);
                }
            }
        });
    }
</script>
<script>
    jQuery(document).ready(function(){

        jQuery('#ajaxSubmit').click(function(e){
            // jQuery('.alert').show();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('Wishlist')}}",
                method: 'post',
                dataType: "json",
                data: {
                    name: jQuery('#name').val(),
                },
                success:function(data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }

                    }
                    if (data.success) {
                        $('#success-msg').removeClass('hidden');
                    }
                }
            });
        });

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