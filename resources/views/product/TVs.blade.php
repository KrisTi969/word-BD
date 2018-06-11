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

                        <div class="all-products">
                            <div class="">
                                <h2 class="title-div wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10"><?php if(count($_GET) === 1 && isset($_GET['type'])) { echo "Our latest ".strtoupper($_GET['type'])." TVs are:";} else {echo "Your filtered results: ";}?></h2>
                                <div class="products">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-md-3">
                                                <div class="product-item">
                                                    <div class="product-borde-inner">
                                                        @foreach($images as $image)
                                                            @if($image->prod_title==$product->title)
                                                                <a href="http://127.0.0.1:8000/Product/{{$product->id}}">
                                                                    <img src="http://127.0.0.1:8000/uploads/{{$image->filename}}" class="img img-responsive"  style="max-width: 200px; min-width: 200px; max-height: 200px; min-height: 200px"/>
                                                                </a>
                                                                @break
                                                            @endif
                                                        @endforeach

                                                        <div class="product-price">
                                                            <a href="{{route('product', ['id' => $product->id])}}">{{$product->title}}</a><br />
                                                            <span class="prev-price">
                                                    <del>200$</del>
                                                </span>
                                                            <span class="current-price">
                                                    {{$product->price}} $
                                                </span>
                                                        </div>

                                                        <a href="{{route('cart', ['id' => $product->id])}}"  class="btn-cart text-center add-to-cart pull-right">
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
                                    {{ $products->appends(request()->input())->links() }}
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

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>
</body>
</html>
