<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 21.02.2018
 * Time: 15:49
 */

?>

<!DOCTYPE html>
<html>
<?php include "head.blade.php"; ?>
<body>
<div class="wrapper">
    <div class="wrapper">
        <!-- Header part  -->
        <?php include "header.blade.php";?>
        <!--Login form-->

        <div class="content-area prodcuts">

            <div class="container">
                <ol class="breadcrumb breadcrumb1">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li class="active">Digital Camera</li>
                </ol>

                <div class="single-product">
                    <div class="row" id="">
                        <div class="col-md-6 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="../../public/images/products/4ksamsung6120.jpg">
                                        <div class="thumb-image detail_images"> <img src="../../public/images/products/4ksamsung6120.jpg" data-imagezoom="true" class="img-responsive" alt="" width="420"> </div>
                                    </li>
                                    <li data-thumb="../../public/images/products/4ksamsung6120-2.jpg">
                                        <div class="thumb-image"> <img src="../../public/images/products/4ksamsung6120-2.jpg" data-imagezoom="true" class="img-responsive" alt="" aria-posinset="" width="420"/> </div>
                                    </li>
                                    <li data-thumb="../../public/images/products/4ksamsung6120-3.jpg">
                                        <div class="thumb-image"> <img src="../../public/images/products/4ksamsung6120-3.jpg" data-imagezoom="true" class="img-responsive" alt="" width="420"/>  </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 single-top-right">
                            <h3 class="item_name">Samsung Smart TV UE40MU6102K</h3>
                            <p class="Whitish">Stoc magazin suficient: (10+ buc)</p>
                            <div class="single-rating Whitish">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                    <li class="rating">20 reviews</li>
                                    <li><a href="#">Add your review</a></li>
                                </ul>
                            </div>
                            <div class="single-price">
                                <ul>
                                    <li class="product-price">$900</li>
                                    <li  class="Whitish"><del>1000 €</del></li>
                                    <li  class="red"><span class="off">10% OFF</span></li>
                                    <li class="Whitish">Ends on: June,5th</li>
                                    <li><a href="#" hidden><i class="fa fa-gift" aria-hidden="true"></i> Poate pun CUPON ?</a></li>
                                </ul>
                            </div>
                            <p class="single-price-text Whitish" >Processing Time: Item will be shipped out within 2-3 working days. </p>
                            <form action="#" method="post">
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="w3ls_item" value="Samsung Smart TV UE40MU6102K"/>
                                <input type="hidden" name="amount" value="900" />
                                <button type="submit" class="btn btn-red" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                <button class="btn btn-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>
                            </form>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <br><br>
                    <div class="single-page-icons social-icons">
                        <ul>
                            <li><h4>Share on</h4></li>
                            <li><a href="#" class="fa fa-facebook-square icon facebook"> </a></li>
                            <li><a href="#" class="fa fa-twitter-square icon twitter"> </a></li>
                            <li><a href="#" class="fa fa-google-plus-square icon googleplus"> </a></li>
                            <li><a href="#" class="fa fa-rss-square icon rss"> </a></li>
                        </ul>
                    </div>

                    <div class="single-product-everything">

                        <div class="single-extra-div">
                            <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productDescriptionCollapse" aria-controls="#productDescriptionCollapse">
                                <span class="pull-left title-sidebar"><i class="fa fa-info-circle"></i> Product Description</span>

                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                <span class="pull-right"><i class="fa fa-minus"></i></span>
                                <div class="clearfix"></div>
                            </a>
                            <div id="productDescriptionCollapse" class="collapse in collapseDiv">
                                <p>Detalii despre produs.</p>
                            </div>
                        </div> <!-- End single product extra div -->

                        <div class="single-extra-div">
                            <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productReviewCollapse" aria-controls="#productReviewCollapse">
                        <span class="pull-left title-sidebar"> <i class="fa fa-check-square-o"></i>
                            Product Reviews <span class="badge">2</span>
                        </span>

                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                <span class="pull-right"><i class="fa fa-minus"></i></span>
                                <div class="clearfix"></div>
                            </a>
                            <div id="productReviewCollapse" class="collapse collapseDiv">
                                <div class="review">
                                    <h4>Cris :</h4>
                                    <p>Is my tv nice ? </p>
                                </div>
                                <div class="review">
                                    <h4>Adrian:</h4>
                                    <p>Ney I say. </p>
                                </div>
                            </div>
                        </div> <!-- End single product extra div -->

                        <div class="single-extra-div">
                            <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productCollapse" aria-controls="#productCollapse">
                                <span class="pull-left title-sidebar"> <i class="fa fa-question-circle"></i> Accesories </span>

                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                <span class="pull-right"><i class="fa fa-minus"></i></span>
                                <div class="clearfix"></div>
                            </a>
                            <div id="productCollapse" class="collapse collapseDiv">
                                <p>Accesorii</p>
                                </div>
                        </div> <!-- End single product extra div -->


                    </div> <!--End Sidebar title div-->




                </div>  <!--End Single Product Div Everything-->


            </div>

        </div> <!-- End content Area class -->

        <!--End Login form-->
        <?php include "footer.blade.php"; ?>
    </div> <!-- End wrapper -->
    <!-- Scripts -->
    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/js/owl.carousel.min.js"></script>

    <script src="../../public/js/jquery.flexslider.js" type="text/javascript"></script>
    <script>
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!--flex slider-->
    <script src="../../public/js/imagezoom.js" type="text/javascript"></script>

    <script src="../../public/js/wow.min.js"></script>

    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../public/js/webslidemenu.js"></script>
    <script type="text/javascript" src="../../public/js/main.js"></script>


</body>
</html>

