<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 21.02.2018
 * Time: 15:49
 */
use Jorenvh\Share\Share;
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



        <div class="content-area prodcuts">

            <div class="container">
                <ol class="breadcrumb breadcrumb1">
                    <li><a href="{{route('/')}}">Home</a></li>
                    @if(\App\Http\Controllers\Product\ProductController::getCategory($product->id) == "Electronic Appliances")
                    <li><a href="{{route('Electronic-Appliances')}}">Electronic Appliances</a></li>
                    @elseif(\App\Http\Controllers\Product\ProductController::getCategory($product->id) == "Entertainment")
                        <li><a href="{{route('Entertainment')}}">Electronic Appliances</a></li>
                    @elseif(\App\Http\Controllers\Product\ProductController::getCategory($product->id) == "Computers-and-Accesories")
                        <li><a href="{{route('Computers-and-Accesories')}}">Electronic Appliances</a></li>
                    @endif
                    <li class="active">{{$product->title}}</li>
                </ol>

                <div class="single-product">
                    <div class="row" id="">
                        <div class="col-md-6 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    @if($images)
                                        @foreach($images as $image)
                                            @if($loop->index==0)
                                                <li data-thumb="http://127.0.0.1:8000/uploads/{{$image->filename}}">
                                                    <div class="thumb-image detail_images"> <img src="http://127.0.0.1:8000/uploads/{{$image->filename}}" data-imagezoom="true" class="img-responsive" alt="" width="420" height="1000"> </div>
                                                </li>
                                            @endif
                                            @if($loop->index==1)
                                                <li data-thumb="http://127.0.0.1:8000/uploads/{{$image->filename}}">
                                                    <div class="thumb-image"> <img src="http://127.0.0.1:8000/uploads/{{$image->filename}}" data-imagezoom="true" class="img-responsive" alt="" aria-posinset="" width="420"/> </div>
                                                </li>
                                            @endif
                                            @if($loop->index==2)
                                                <li data-thumb="http://127.0.0.1:8000/uploads/{{$image->filename}}">
                                                    <div class="thumb-image"> <img src="http://127.0.0.1:8000/uploads/{{$image->filename}}" data-imagezoom="true" class="img-responsive" alt="" width="420"/>  </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-6 single-top-right">
                            <h3 class="item_name">{{$product->title}}</h3>
                            @if($product->quantity > 0 && $product->quantity > 10)
                                <?php echo '<span class="Whitish">Quantity had: <span style="color: green;">More than 10 available</span> </p>' ?>
                            @elseif($product->quantity >0 && $product->quantity < 10)
                                <?php echo '<span class="Whitish">Quantity had: <span style="color: yellow;">Less than 10 available</span>(10+) </p>' ?>
                            @elseif($product->quantity <= 0)
                                <?php echo '<span class="Whitish">Quantity had: <span style="color: darkred;">suficient</span>(10+) </p>' ?>
                                <div class="single-rating Whitish">
                                    @endif
                            <div class="single-rating Whitish">
                                <ul>
                                    <?php $rating = \App\Http\Controllers\Product\ProductController::getProductAverageReview($product->id) ?>
                                    <?php $toFive = 0 ?>
                                    @for ($i = 1; $i <= $rating; $i++)

                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <?php $toFive++ ?>
                                    @endfor
                                    @while($toFive!=5)
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <?php $toFive++?>
                                    @endwhile

                                    {{-- <li><i class="fa fa-star-o" aria-hidden="true"></i></li>--}}
                                    <li class="rating">{{\App\Http\Controllers\Product\ProductController::getProductReviewCount($product->id)}} reviews</li>
                                        <span class="fake-link" id="goToCommentSection" style="color: darkred; text-decoration: underline;cursor: pointer;">Add your review</span>
                                </ul>
                            </div>
                            <div class="single-price">
                                <ul>
                                    <li class="product-price">{{$product->price}}$</li>
                               {{--     <li  class="Whitish"><del>1000 €</del></li>
                                    <li  class="red"><span class="off">10% OFF</span></li>
                                    <li class="Whitish">Ends on: June,5th</li>
                                    <li><a href="#" hidden><i class="fa fa-gift" aria-hidden="true"></i> Poate pun CUPON ?</a></li>--}}
                                </ul>
                            </div>
                            <p class="single-price-text Whitish" >Processing Time: Item will be shipped out within 2-3 working days. </p>
                           {{-- <form action="#" method="post">
                                <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="w3ls_item" value="Samsung Smart TV UE40MU6102K"/>
                                <input type="hidden" name="amount" value="900" />
                                @if($product->quantity > 0)
                                <button type="submit" class="btn btn-red" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                @endif
                                <button class="btn btn-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</button>
                            </form>--}}
                                    <a href="{{route('cart', ['id' => $product->id])}}"  class="btn btn-red text-center add-to-cart">
                                        <i class="fa fa-cart-plus"></i>
                                        Add to cart
                                    </a>

                                    <br>
                            <br>
                            @if($product->ar_ready==1)
                                <button class="btn btn-warning"data-toggle="modal" data-target="#myModal"><i class="fa fa-image" aria-hidden="true"></i> Marker for AR </button>
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">


                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Augmented Reality</h4>
                                            </div>
                                            <div class="modal-body">
                                                {{--  @include('ar.augmented_reality')--}}
                                                <img style="width: auto;max-width: 100%;height: auto" src="{{asset('images/ar/HIRO.jpg')}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <br><br>
                                <form action="{{route('Augmented-Reality',['filename'=>\App\Http\Controllers\Product\ProductController::getProductARFile($product->id)])}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-warning" ><i class="fa fa-eye" aria-hidden="true"></i> Augmented Reality Camera </button>


                                </form>

                            @endif
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <br><br>
                    <div class="container">
                        <h3 class="Whitish">Share: </h3>
                        <?php
                        $share = new Share();
                        echo $share->page(url()->current(),$product->title )
                            ->facebook()
                            ->twitter()
                            ->googlePlus()
                        ?>
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
                                {{--  {{request()->route('id')}}--}}
                                @if($description)
                                    {{--{{var_dump($description)}}<br>
                                    {{var_dump($product->description)}}--}}
                                    @foreach($product->description as $al=>$ceva)
                                        <table class="table table-striped">

                                        <p class="text-uppercase">{{$al}}</p>
                                        {{-- {{var_dump($ceva)}}<br>--}}
                                        <div>
                                            @foreach($ceva as $altceva=>$celelalt)
                                                {{-- {{var_dump($celelalt)}}<br>--}}

                                                @foreach($celelalt as $x=>$y)
                                                    <tbody>
                                                    <tr>
                                                        <td class="col-xs-4 text-muted">{{$x}}</td>
                                                        <td class="col-xs-8">{{$y}}</td>
                                                {{--    {{$x}}{{":"}} {{$y}}<br>--}}
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </tbody>
                                        </table>
                                    @endforeach
                                @endif
                            </div>
                        </div> <!-- End single product extra div -->

                        <div class="single-extra-div">
                            <a data-toggle="collapse" class="pointer main" aria-expanded="true" data-target="#productReviewCollapse" aria-controls="#productReviewCollapse">
                        <span class="pull-left title-sidebar"> <i class="fa fa-check-square-o"></i>
                            Product Reviews <span class="badge">{{\App\Http\Controllers\Product\ProductController::getProductReviewCount($product->id)}}</span>
                        </span>
                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                <span class="pull-right"><i class="fa fa-minus"></i></span>
                                <div class="clearfix"></div>
                            </a>
                            <div id="productReviewCollapse" class="collapse collapseDiv">

                                <div class="review">
                                    @if(\Auth::check())
                                        <script type="text/javascript" src="{{asset('js/comments.js')}}"></script> <!-- path to tuto_comments.js -->
                                        <h2>Leave a review</h2>
                                        <div id="newComment"></div> <!-- the result will be  posted displayed here -->

                                        <form class="form-horizontal" role="form" action="#" method="post">
                                            <div class="form-group" >
                                                <input type="number" hidden value="{{$product->id}}" id="product_id" name="product_id">
                                            </div>
                                            <div class="form-group" id="idGroup">
                                                <label class="col-md-2 control-label"for="id">Star number:</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="rating" id="rating" class="rating" data-max="5" data-min="1" data-clearable="remove" data-empty-value="0"/>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group" id="formGroupText">
                                                <label class="col-md-2 control-label">Comment:</label>
                                                <div class="col-md-10">
                                                    <span class="help-block"></span>
                                                    <textarea class="form-control" rows="8" id="com_text" name="com_text"></textarea>
                                                </div>
                                            </div>

                                            <p align="center"><input type="submit" class="submitComment btn btn-primary" value="Submit Comment" /></p>
                                        </form>
                                        {{\App\Http\Controllers\Product\ProductController::getProductReviews($product->id)}}
                                    @else
                                        {{\App\Http\Controllers\Product\ProductController::getProductReviews($product->id)}}
                                    @endif

                                    {{----}}
                                </div>
                            </div>
                        </div> <!-- End single product extra div -->



                    </div> <!--End Sidebar title div-->

                </div>  <!--End Single Product Div Everything-->

            </div>
            </div>
        </div> <!-- End content Area class -->
    </div>
    <!--End Login form-->
    @include('layouts.footer')
</div> <!-- End wrapper -->
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('js/jquery.flexslider.js') }}" type="text/javascript"></script>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
    $("#goToCommentSection").click(function() {
        $("#productReviewCollapse").remove("collapse collapseDiv");
        $("#productReviewCollapse").addClass("collapse in collapseDiv");
        $('html, body').animate({
            scrollTop: $("#newComment").offset().top
        }, 2000);
    });

</script>
<!--flex slider-->
<script src="{{ asset('js/imagezoom.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/wow.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webslidemenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

<script type="text/javascript" src="{{asset('js/productSearch.js')}}"></script>

</body>
</html>

