<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 18.02.2018
 * Time: 13:07
 */
?>
<!DOCTYPE html>
<html>
@include("layouts.head")
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        @include("layouts.header")
        <div class="content-area prodcuts">

            <div class="row">
                <div class="container">

                    <!-------------------------------------------------------------->
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="sidebar-products-main"><br>
                        <h2 class="title-div">Categories</h2>
                                <li>Electronic Appliances
                            <ul>
                                    <li><a href="{{route("TVs")}}">TVs</a></li>
                                    <li><a href="#">Camera, Photo &amp; Video </a></li>
                                    <li><a href="#">Cell Phones &amp; Accessories</a></li>
                                    <li><a href="#">Wearable Devices</a></li>
                            </ul>
                            </li>

                            <li>Computer & Accesories
                                <ul>
                                    <li><a href="#">Monitors</a></li>
                                    <li><a href="#">Printers</a></li>
                                    <li><a href="#">Software</a></li>
                                    <li><a href="#">Accesories</a></li>
                                </ul>
                            </li>

                            <li>Movies
                                <ul>
                                    <li><a href="#">Latest Movies</a></li>
                                </ul>
                            </li>

                            <li>Games
                                <ul>
                                    <li><a href="#">Newest Games</a></li>
                                </ul>
                            </li>

                            <li>Music
                                <ul>
                                    <li><a href="#">Popular Music Genre</a></li>
                                </ul>
                            </li>
                        </div>
                    </div>




                    <!-------------------------------------------------------------->


                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <ol class="breadcrumb breadcrumb1">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Products</li>
                        </ol>
                        <div class="product-top">
                            <h4>All Products</h4>
                            <ul>
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown" data-toggle="dropdown" style="font-size: large">Sort By<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Most Popular</a></li>
                                        <li><a href="#">New In</a></li>
                                        <li><a href="#">Lowest price</a></li>
                                        <li><a href="#">Highest price</a></li>
                                        <li><a href="#">Best Rating</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="all-products">
                            <div class="">
                                <h2 class="title-div wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Our Latest Products available</h2>
                                <div class="products">
                                    <div class="row">
                            @foreach ($products as $product)
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product1.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="{{route('product', ['id' => $product->id])}}">{{$product->title}}</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    {{$product->price}} $
                                                </span>
                                                    </div>

                                                    <a href="cart.html"  class="btn btn-cart text-center add-to-cart pull-right">
                                                        <i class="fa fa-cart-plus"></i>
                                                        Add to cart
                                                    </a>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div><!-- End Latest products[single] -->

                                        @endforeach

                                        <div class="clear"></div>

                                </div> <!-- End products div-->
                            </div> <!-- End container latest products-->
                        </div>  <!-- End Latest products -->
                            {{ $products->links() }}
                        </div>
                </div>

                    {{--<div class="container">
                        @foreach ($products as $product)
                            {{ $product->tit }}
                        @endforeach
                    </div>

                    {{ $products->links() }}--}}

            </div>


        </div> <!-- End content Area class -->


    </div> <!-- End content Area class -->

    @include("layouts.footer")
</div> <!-- End wrapper -->
</div>
<!-- Scripts -->

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>