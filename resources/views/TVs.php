<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 20.02.2018
 * Time: 13:57
 */

if(isset($_GET['type'])) {
    $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?type=" . $_GET['type'];
}

?>


<!DOCTYPE html>
<html>
<?php include "head.blade.php"; ?>
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        <?php include "header.blade.php";?>

        <div class="content-area prodcuts">
            <div class="row">
                <div class="container">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="sidebar-products-main">
                            <h2>Filter by :</h2>
                            <a role="button" href="<?php echo $actual_link?>">Click here to reset filters</a>
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#brandCollapse" aria-controls="#brandCollapse">
                                        <span class="pull-left title-sidebar">Price</span>

                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        <div class="clearfix"></div>
                                    </a>
                                </div> <!--End Sidebar title div-->

                                <div id="brandCollapse" class="collapse out">
                                        <input type="search" name="brand_name" class="form-control" value="" placeholder="De facut range la price" />
                                        <br>
                                        <a role="button" onclick="addOrUpdateUrlParam('priceMin',0,'priceMax',200)"><span></span>UNDER 200 €</a><br />
                                        <br>
                                        <a role="button" onclick="addOrUpdateUrlParam('priceMin',200,'priceMax',450)"><span></span>200 - 450 €</a><br />
                                        <br>
                                        <a role="button" onclick="addOrUpdateUrlParam('priceMin',450,'priceMax',800)"><span></span>450 - 800€</a><br />
                                        <br>
                                        <a role="button" onclick="addOrUpdateUrlParam('priceMin',800,'priceMax',9999)"><span></span>ABOVE 800 €</a><br />
                                        <br>
                                        <div class="clearfix"></div>
                                </div>
                            </div> <!--End Single Sidebar-->

                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#producer" aria-controls="#producerCollapse">
                                        <span class="pull-left title-sidebar">Producer</span>

                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        <div class="clearfix"></div>
                                    </a>
                                </div> <!--End Sidebar title div-->

                                <div id="producer" class="collapse out">
                                    <br>
                                    <a role="button" onclick="addParameter('producer','ceva')"><span></span>SAMSUNG</a><br />
                                    <br>
                                    <a role="button" onclick="addParameter('producer','LAVA')"><span></span>LALA</a><br />
                                    <br>
                                    <a role="button" onclick="addParameter('producer','LAVA2')"><span></span>UNDERCONST</a><br />
                                    <br>
                                    <a role="button" onclick="addParameter('producer','LAVA3')"><span></span>UNDERCONST</a><br />
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div> <!--End Second Sidebar-->

                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#size" aria-controls="#sizeController">
                                        <span class="pull-left title-sidebar">Size</span>

                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        <div class="clearfix"></div>
                                    </a>
                                </div> <!--End Sidebar title div-->

                                <div id="size" class="collapse out">
                                    <br>
                                    <a role="button" onclick="addOrUpdateUrlParam('sizeMin',70,'sizeMax',100)"><span></span>70 - 100 CM</a><br />
                                    <br>
                                    <a role="button" onclick="addOrUpdateUrlParam('sizeMin',100,'sizeMax',120)"><span></span>100 - 120 CM</a><br />
                                    <br>
                                    <a role="button" onclick="addOrUpdateUrlParam('sizeMin',120,'sizeMax',140)"><span></span>120 - 140 CM</a><br />
                                    <br>
                                    <a role="button" onclick="addOrUpdateUrlParam('sizeMin',140,'sizeMax',9999)"><span></span>ABOVE 140 CM</a><br />
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div> <!--End Third Sidebar-->

                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <a data-toggle="collapse" class="pointer" aria-expanded="true" data-target="#productReviewCollapse" aria-controls="#productReviewCollapse">
                                        <span class="pull-left title-sidebar">Review</span>
                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        <div class="clearfix"></div>
                                    </a>
                                </div> <!--End Sidebar title div-->

                                <div id="productReviewCollapse" class="collapse out">

                                        <a role="button" onclick="addParameter('review',5)" style="color:#008000"><span></span>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        </a><br />
                                    <a role="button" onclick="addParameter('review',4)" style="color:#008000"><span></span>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </a><br />
                                    <a role="button" onclick="addParameter('review',3)" style="color:#008000"><span></span>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </a><br />
                                    <a role="button" onclick="addParameter('review',2)" style="color:#008000"><span></span>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </a><br />
                                    <a role="button" onclick="addParameter('review',1)" style="color:#008000"><span></span>
                                        <i class="fa fa-star"></i>
                                    </a><br />
                                        <div class="clearfix"></div>
                                </div>
                            </div> <!--End Single Sidebar-->

                        </div>
                    </div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <ol class="breadcrumb breadcrumb1">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Products</li>
                        </ol>
                        <div class="product-top">
                            <h4>All Products</h4>
                            <ul>
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By<span class="caret"></span></a>
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
                                <h2 class="title-div wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10"><?php if(count($_GET) === 1 && isset($_GET['type'])) { echo "Our latest ".strtoupper($_GET['type'])." TVs are:";} else {echo "Your filtered results: ";}?></h2>
                                <div class="products">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product1.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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


                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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



                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product3.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product4.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product1.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product4.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product2.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <div class="product-borde-inner">
                                                    <a href="product_single.html">
                                                        <img src="images/product-slide/product3.png" class="img img-responsive"/>
                                                    </a>

                                                    <div class="product-price">
                                                        <a href="product_single.html">TV</a><br />
                                                        <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                        <span class="current-price">
                                                    150$
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

                                        <div class="clear"></div>





                                    </div> <!-- End Latest products row-->
                                    <a class="btn btn-red btn-lg pull-right btn-more wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                                        <span>See More products.. </span>
                                    </a>
                                    <div class="clear"></div>
                                </div> <!-- End products div-->
                            </div> <!-- End container latest products-->
                        </div>  <!-- End Latest products -->
                    </div>
                </div>

            </div>


        </div> <!-- End content Area class -->
        <?php include "footer.blade.php"; ?>
    </div> <!-- End wrapper -->
    <!-- Scripts -->

    <script>
        function addOrUpdateUrlParam(min, value1, max, value2)
        {
            var href = window.location.href;
            var regex = new RegExp("[&\\?]" + min + "=");
            var regex2 = new RegExp("[&\\?]" + max + "=");
            if(regex.test(href))
            {
                regex = new RegExp("([&\\?])" + min + "=\\d+" + "([&\\?])" + max + "=\\d+");
                window.location.href = href.replace(regex, "$1" + min + "=" + value1 + "$2" +max + "=" + value2);
            }
            else
            {
                if(href.indexOf("?") > -1)
                    window.location.href = href + "&" + min + "=" + value1 + "&" +max + "=" +value2;
                else
                    window.location.href = href + "?" + min + "=" + value1 + "&"+ max + "=" +value2;
            }
        }

        function addParameter(val, name)
        {
            var href = window.location.href;
            var regex = new RegExp("[&\\?]" + val + "=");
            if(regex.test(href))
            {
                regex = new RegExp("([&\\?])" + val+ "=\\d+");
                window.location.href = href.replace(regex, "$1" + val + "=" + name);
            }
            else
            {
                if(href.indexOf("?") > -1)
                    window.location.href = href + "&" + val + "=" + name;
                else
                    window.location.href = href + "?" +val + "=" + name;
            }
        }



    </script>
    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../public/js/wow.min.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../public/js/webslidemenu.js"></script>
    <script type="text/javascript" src="../../public/js/main.js"></script>

</body>
</html>
