@php
    /**
     * Created by PhpStorm.
     * User: crys_
     * Date: 20.02.2018
     * Time: 13:57
     */
    if(isset($_GET['type'])) {
        $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?type=" . $_GET['type'];
    }
@endphp
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
                   @include('layouts.tvNavigationBar')
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

                                    </div> <!-- End Latest products row-->
                                    {{ $products->links() }}
                                    <div class="clear"></div>
                                </div> <!-- End products div-->
                            </div> <!-- End container latest products-->
                        </div>  <!-- End Latest products -->
                    </div>
                </div>

            </div>


        </div> <!-- End content Area class -->
        @include("layouts.footer")
    </div> <!-- End wrapper -->
    <!-- Scripts -->
</div>
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
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>
