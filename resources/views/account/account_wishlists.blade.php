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
@include('layouts.head')
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
    @include('layouts.header')
    <!--Login form-->

        <div class="content-area" style="background: white">

            <div class="account-page">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-3">
                            <h2>My Account</h2>
                            <ul>
                                <li  class=""><a href="{{route('Account')}}">Account Control Panel</a></li>
                                <li class=""><a href="{{route('Orders')}}">My Orders</a></li>
                                <li class="active"><a href="{{route('getWishlists')}}">My Wishlists</a></li>
                                <li><a href="{{route('seeCart')}}">My Cart Products</a></li>
                                <li><a href="{{route('Reviews')}}">My Reviews and Ratings</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <h2>Account Control Panel</h2>
                            <strong>Hello, {{\Auth::user()->name}}</strong><br />
                            <p>From this pannel you can see your wishlist.</p>
                            <div class="table-responsive">
                                <table class="table table-condensed" style="border-collapse:collapse;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Total Price</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wishlists as $item)
                                        <tr data-toggle="collapse" data-target="#{{$loop->index}}" class="accordion-toggle">
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>

                                        <tr >
                                            <td colspan="9" class="hiddenRow"><div class="accordian-body collapse" id="{{$loop->index}}">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        </thead>
                                                        @foreach($products as $product)
                                                            @if($product->wishlist_id == $item->id)
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{$product->product_name}}</td>
                                                                    <td>{{$product->quantity}}</td>
                                                                    <td>{{$product->price}}</td>
                                                                </tr>

                                                                </tbody>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </div> </td>


                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!--End Row-->

                </div>
            </div> <!--End Account page div-->

        </div> <!-- End content Area class -->


        <!--End Login form-->
        @include('layouts.footer')
    </div>
</div> <!-- End wrapper -->
<!-- Scripts -->

<!-- Scripts --><script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>

</body>
</html>

