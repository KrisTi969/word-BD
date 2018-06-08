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
                 {{--   @include('layouts.tvNavigationBar')--}} {{--de facut SORTAREA SMECHERA--}}
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <ol class="breadcrumb breadcrumb1">
                            <li><a href="{{route('/')}}">Home</a></li>
                            <li class="active">Products</li>
                            @if(count($products))
                                <li class="active">{{$query}}</li>
                                @endif
                        </ol>
                        <div class="product-top">
                            <h4>All Products</h4>
                            <ul>
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort By<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php if (isset($_GET['search'])):
                                        $var = route('All-Products-Most-Popular')."?search=".$_GET['search'];
                                        ?>
                                        <li><a href="{{$var}}">Most Popular</a></li>
                                            <?php $var = route('All-Products-New')."?search=".$_GET['search']; ?>
                                        <li><a href="{{$var}}">New In</a></li>
                                            <?php $var = route('All-Products-Low-Price')."?search=".$_GET['search']; ?>
                                        <li><a href="{{$var}}">Lowest price</a></li>
                                            <?php $var = route('All-Products-High-Price')."?search=".$_GET['search']; ?>
                                        <li><a href="{{$var}}">Highest price</a></li>
                                            <?php $var = route('All-Products-Best-Rating')."?search=".$_GET['search']; ?>
                                        <li><a href="{{$var}}">Best Rating</a></li>
                                           <?php else: ?>
                                            <li><a href="{{route('All-Products-Most-Popular')}}">Most Popular</a></li>
                                            <li><a href="{{route('All-Products-New')}}">New In</a></li>
                                            <li><a href="{{route('All-Products-Low-Price')}}">Lowest price</a></li>
                                            <li><a href="{{route('All-Products-High-Price')}}">Highest price</a></li>
                                            <li><a href="{{route('All-Products-Best-Rating')}}">Best Rating</a></li>
                                        <?php endif;?>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"> </div>
                        </div>
                        @if(count($products))
                        <div class="all-products">
                            <div class="">
                                <h2 class="title-div wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10"><?php if(count($_GET) === 1 && isset($_GET['type'])) { echo "Our latest ".strtoupper($_GET['type'])." TVs are:";} else {echo "Your results: ";}?></h2>
                                <div class="products">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-md-3">
                                                <div class="product-item">
                                                    <div class="product-borde-inner">
                                                        @foreach($images as $image)
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
                        @else
                            <h2 class="title-div wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">"{{'No results found!'}}"</h2>

                        @endif
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

    function addOrUpdateUrlParam1(min, value1)
    {
        var href = window.location.href;
        var regex = new RegExp("[&\\?]" + min + "=");
        if(regex.test(href))
        {
            regex = new RegExp("([&\\?])" + min + "=\\d+");
            window.location.href = href.replace(regex, "$1" + min + "=" + value1);
        }
        else
        {
            if(href.indexOf("?") > -1)
                window.location.href = href + "&" + min + "=" + value1;
            else
                window.location.href = href + "?" + min + "=" + value1;
        }
    }

    function addOrReplace(key, value) {

        var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
            urlQueryString = document.location.search,
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {

            updateRegex = new RegExp('([\?&])' + key + '[^&]*');
            removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

            if( typeof value == 'undefined' || value == null || value == '' ) { // Remove param if value is empty

                params = urlQueryString.replace(removeRegex, "$1");
                params = params.replace( /[&;]$/, "" );

            } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it

                params = urlQueryString.replace(updateRegex, "$1" + newParam);

            } else { // Otherwise, add it to end of query string

                params = urlQueryString + '&' + newParam;
            }
        }
        window.history.replaceState({}, "", baseUrl + params);
        location.reload();
    };



</script>
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
