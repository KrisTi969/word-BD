<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 27.02.2018
 * Time: 15:15
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

        <div class="content-area">
            <div class="main-slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="images/slider/e-commerce.jpg" alt="welcome"  height="243" width="1680">
                            <div class="carousel-caption">
                                <div class="slide-header-text wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Welcome</div> <br />
                                <!-- \<a href="products.html" class="btn btn-red slider-link wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Buy this Now</a>
                              -->
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/slider/black_friday.jpg" alt="Vader" height="" width="1680">
                            <div class="carousel-caption">
                                <div class="slide-header-text wow rotateIn" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Turn your looking into an easy price</div> <br />
                                <a href="../app/view/productsRedirect.php" class="btn btn-red slider-link wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Buy items on sale!</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>

                </a>

                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div> <!-- End Main slider class -->
        <div class="featured-products">
            <div class="container" >
                <h2 class="title-div wow slideInLeft pull-left" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Recommanded products</h2><div class="clear"></div>
                <div class="featured-navigation pull-right width0">

                </div>
                <div class="clear"></div>
                <div class="featured-items">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel">

                        <div class="item featured1">
                            <div class="item-full animated featured1-inner  width0">
                                <a href="../app/view/productsRedirect.php"><h4>Digital Camera</h4></a>
                                <p>Detalii</p>
                                <h5>200$</h5>
                                <a href="../cart.html" class="btn btn-cart">
                                    Add To Cart
                                </a>

                            </div>
                            <a href="../app/view/productsRedirect.php">
                                <img src="images/product-slide/product3.png" class="img img-responsive" alt="Product1">
                            </a>
                        </div> <!-- Single Featured Item -->

                        <div class="item featured2">
                            <div class="item-full animated featured2-inner  width0">
                                <a href="../app/view/tvProduct.php"><h4>Digital Camera</h4></a>
                                <p>Detalii</p>
                                <h5>220$</h5>
                                <a href="../cart.html" class="btn btn-cart">
                                    Add To Cart
                                </a>

                            </div>
                            <a href="../app/view/productsRedirect.php">
                                <img src="images/products/4ksamsung6120.jpg" class="img-thumbnail" alt="Product1">
                            </a>
                        </div> <!-- Single Featured Item -->

                        <div class="item featured3">
                            <div class="item-full animated featured3-inner  width0">
                                <a href="../app/view/productsRedirect.php"><h4>Digital Camera</h4></a>
                                <p>Detalii</p>
                                <h5>200$</h5>
                                <a href="../cart.html" class="btn btn-cart">
                                    Add To Cart
                                </a>

                            </div>
                            <a href="../app/view/productsRedirect.php">
                                <img src="images/product-slide/product2.png" class="img img-responsive" alt="Product1">
                            </a>
                        </div> <!-- Single Featured Item -->

                        <div class="item featured4">
                            <div class="item-full animated featured4-inner  width0">
                                <a href="../app/view/productsRedirect.php"><h4>Digital Camera</h4></a>
                                <p>Detalii</p>
                                <h5>200$</h5>
                                <a href="../cart.html" class="btn btn-cart">
                                    Add To Cart
                                </a>

                            </div>
                            <a href="../app/view/productsRedirect.php">
                                <img src="images/product-slide/product3.png" class="img img-responsive" alt="Product1">
                            </a>
                        </div> <!-- Single Featured Item -->

                        <div class="item featured5">
                            <div class="item-full animated featured5-inner  width0">
                                <a href="../app/view/productsRedirect.php"><h4>Digital Camera</h4></a>
                                <p>Detalii</p>
                                <h5>200$</h5>
                                <a href="../cart.html" class="btn btn-cart">
                                    Add To Cart
                                </a>

                            </div>
                            <a href="../app/view/productsRedirect.php">
                                <img src="images/product-slide/product4.png" class="img img-responsive" alt="Product1">
                            </a>
                        </div> <!-- Single Featured Item -->

                    </div>
                </div>
            </div>
        </div> <!--End Featured products Div-->
        <div class="latest-products">
            <div class="container">
                <h2 class="title-div wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Our Latest Products available</h2>
                <div class="products">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product1.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product3.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->

                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product4.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product1.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product4.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    <a href="../product_single.html">
                                        <img src="images/product-slide/product3.png" class="img img-responsive"/>
                                    </a>

                                    <div class="product-price">
                                        <a href="../product_single.html">TV</a><br />
                                        <span class="prev-price">
                                    <del>200$</del>
                                </span>
                                        <span class="current-price">
                                    150$
                                </span>
                                    </div>

                                    <a href="../cart.html" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->

                        <div class="clearfix"></div>



                    </div> <!-- End Latest products row-->
                    <a href="../app/view/productsRedirect.php" class="btn btn-red btn-lg pull-right btn-more wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                        <span>See More products.. </span>
                    </a>
                    <div class="clear"></div>
                </div> <!-- End products div-->
            </div> <!-- End container latest products-->
        </div>  <!-- End Latest products -->
    </div> <!-- End content Area class -->

    @include('layouts.footer')
</div> <!-- End wrapper -->

<!-- Scripts --><script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript">
    $("#search").autocomplete({
        source: function(request, response){
            $.get("http://127.0.0.1:8000/autocomplete", {
                term:request.term
            }, function(data){
                response($.map(data, function(item) {
                    return {
                        value: item.id,
                        label: item.title
                    }
                }))
            }, "json");
        },
        select: function( event, ui ) {
            console.log( ui.item ?
                "Selected: " + ui.item.label :
                "Nothing selected, input was " + this.value);
            window.location.href = "/Product/" + ui.item.value;
        },
        minLength: 2,
        dataType: "json",
        cache: false
    });
</script>
</body>
</html>


