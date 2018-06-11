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
                            <img src="{{asset('images/shop/slide1-1680x500-1-1.jpg')}}" alt="welcome">
                            <div class="carousel-caption">
                                <div class="slide-header-text wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Welcome</div> <br />
                                <!-- \<a href="products.html" class="btn btn-red slider-link wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Buy this Now</a>
                              -->
                            </div>
                        </div>

                        <div class="item">
                            <img src="images/slider/black_friday.jpg" alt="Vader" height="243" width="1680">
                            <div class="carousel-caption">
                                <div class="slide-header-text wow rotateIn" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Turn your looking into an easy price</div> <br />
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

        </div> <!--End Featured products Div-->
        <div class="latest-products">
            <div class="container">
                <h2 class="title-div wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">Our Latest Products available</h2>
                <div class="products">
                    <div class="row">
                    @foreach($products_ar as $product)
                        <div class="col-md-3">
                            <div class="product-item">
                                <div class="product-borde-inner">
                                    @foreach($images_ar as $image)
                                        @if($image->prod_title==$product->title)
                                            <a href="http://127.0.0.1:8000/Product/{{$product->id}}">
                                                <img src="http://127.0.0.1:8000/uploads/{{$image->filename}}" class="img img-responsive"/>
                                            </a>
                                            @break
                                        @endif
                                    @endforeach

                                    <div class="product-price">
                                        <a href="{{route('product', ['id' => $product->id])}}">{{$product->title}}</a><br />
                                        <span class="prev-price">
                                </span>
                                        <span class="current-price">
                                    {{$product->price}}$
                                </span>
                                    </div>

                                    <a href="{{route('cart', ['id' => $product->id])}}" class="btn btn-cart text-center add-to-cart pull-right">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- End Latest products[single] -->
                        @endforeach

                        <div class="clearfix"></div>



                    </div> <!-- End Latest products row-->
                 {{--   <a href="../app/view/productsRedirect.php" class="btn btn-red btn-lg pull-right btn-more wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">
                        <span>See More products.. </span>
                    </a>--}}
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
<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>
</body>
</html>


