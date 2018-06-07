<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 16.02.2018
 * Time: 20:49
 */

?>
<div class="header">
    <!-- Start Top Header -->
    <!-- End Top Header -->
    <!-- Start Header Main, logo, search bar,cart -->
    <div class="header-bottom">
        <div class="container">
            <div class="header-logo pull-left">
            </div>
            <!-- Cart Modal -->
            <div id="cart-item" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                            <h4 class="modal-title">Cart Products</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <?php foreach(Cart::content() as $row) :?>
                                <tbody>
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td><img src="images/product-slide/product2.png" class="img img-responsive img-thumbnail" alt=""></td>
                                    <td>{{$row->qty}}</td>
                                    <td>{{$row->price}}$</td>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td colspan="5" rowspan="5">
                                        Total Price <span class="bold text-primary" style="margin-left: 73%">{{\App\Http\Controllers\Cart\CartController::cartTotal()}}$</span>
                                    </td>
                                </tr>
                                <div class="clearfix"></div>
                                </tbody>
                            </table>
                          {{--  <p class="text-right text-danger">There are <span style="font-weight: bold">2</span> more products in the cart. Click Checkout now to buy the items..</p>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
                            </button>
                            <?php if (\Cart::count()):?>
                            <a href="{{route('checkout')}}" class="btn btn-yellow">Check Out</a>
                            <?php endif; ?>
                    </div>
                    </div>

                </div>
            </div> <!-- End Model -->

        </div>
    </div>
    <!-- End Header Main, logo, search bar,cart -->

    <div class="header-navigation">
        <div class="wsmenucontainer clearfix">
            <div class="overlapblackbg">asdasdas</div>
            <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"></a>{{-- <a class="callusicon" href="tel:0748105856"><span class="fa fa-phone"></span></a>--}}
                <div class="header-cart2">
                    <a href="#" class="cart-link2" data-toggle="modal" data-target="#cart-item"><i class="fa fa-cart-arrow-down"></i></a>
                    <span class="number-of-cart2">20</span>
                </div>
            </div>


            <div class="headerfull">
                <!--Main Menu HTML Code-->
                <div class="smllogo navbar-fixed"><a href="{{route('/')}}"><img src="{{asset('images/shop/Skyshop2.png')}}" style="max-width: 100px;" alt=""></a></div>
                <div class="wsmain">

                    <nav class="wsmenu clearfix">
                        <ul class="mobile-sub wsmenu-list">
                            <li><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#" class="navtext"><span>Shop By</span> <span>Department</span></a>
                                <div class="wsshoptabing wtsdepartmentmenu clearfix">
                                    <div class="wsshopwp clearfix" style="color: red !important;">
                                        <ul class="wstabitem clearfix">
                                            <li class=""><span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="{{route('Electronic-Appliances')}}"><i class="fa fa-television"></i>Electronic Appliances</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                  <ul class="wstliststy02">
                                                        <li><img src="" alt=" "></li>
                                                        <li class="wstheading">TVs</li>
                                                        <li><a href="{{route('TVs')}}?type=4kTV">4K Ultra HD TVs </a></li>
                                                        <li><a href="{{route('TVs')}}?type=curvedTV">Curved TVs </a></li>
                                                        <li><a href="{{route('TVs')}}?type=ledTV">LED TVs</a></li>
                                                        <li><a href="{{route('TVs')}}?type=lcdTV">LCD TVs</a></li>
                                                        <li><a href="{{route('TVs')}}?type=oledTV">OLED TVs</a> <span class="wstmenutag bluetag">Popular</span></li>
                                                        <li><a href="{{route('TVs')}}?type=plasmaTV">Plasma TVs</a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="" alt=" "></li>
                                                        <li class="wstheading">Camera, Photo &amp; Video</li>
                                                        <li><a href="{{route('Cameras')}}?type=accesories">Accessories <span class="wstcount">(1145)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=bags&cases">Bags &amp; Cases <span class="wstcount">(445)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=binoculars-scopes">Binoculars &amp; Scopes <span class="wstcount">(45)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=digital-cameras">Digital Cameras <span class="wstcount">(845)</span></a> </li>
                                                        <li><a href="{{route('Cameras')}}?type=film-photografy">Film Photography <span class="wstcount">(245)</span></a> <span class="wstmenutag bluetag">Popular</span></li>
                                                        <li><a href="{{route('Cameras')}}?type=flashes">Flashes <span class="wstcount">(105)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=lenses">Lenses <span class="wstcount">(445)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=lightning-studio">Lighting &amp; Studio <span class="wstcount">(225)</span></a></li>
                                                        <li><a href="{{route('Cameras')}}?type=video">Video <span class="wstcount">(145)</span></a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="" alt=" "></li>
                                                        <li class="wstheading">Smartphones &amp; Accessories</li>
                                                        <li><a href="{{route('Smartphones')}}?type=smartphone">Smartphones</a></li>
                                                        <li><a href="{{route('Smartphones')}}?type=smartwatches">Smartwatches </a></li>
                                                        <li><a href="{{route('Smartphones')}}?type=phonecase">Phone Cases</a> <span class="wstmenutag orangetag">Hot</span></li>
                                                        <li><a href="{{route('Smartphones')}}?type=bluetooth-headset">Bluetooth Headsets</a></li>
                                                        <li><a href="{{route('Smartphones')}}?type=smartphone-accesories">Smartphone Accessories</a></li>
                                                        <li><a href="{{route('Smartphones')}}?type=headphone">Headphone</a></li>
                                                    </ul>

                                                </div>
                                            </li>
                                            <!--cat 3-->
                                            <li class=""><span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="{{route('Computers-and-Accesories')}}"><i class="fa fa-laptop"></i>Computers &amp; Accessories</a>
                                                <div class="wstitemright clearfix computermenubg" style="height: auto;">
                                                    <div class="wstmegamenucoll01 clearfix">
                                                        <div class="wstheading">Monitors <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="{{route('Monitors')}}?sizeMin=15.5&sizeMax=30">15.5 - 30inch <span class="wstmenutag greentag">New</span></a></li>
                                                            <li><a href="{{route('Monitors')}}?sizeMin=30&sizeMax=40">30 - 40inch </a></li>
                                                            <li><a href="{{route('Monitors')}}?sizeMin=40&sizeMax=70">40+inch</a></li>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                        <div class="wstheading">Printers <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="{{route('Printers')}}?type=printer-all-in-one">All-In-One</a> </li>
                                                            <li><a href="{{route('Printers')}}?type=printer-photo">Copying </a> <span class="wstmenutag orangetag">Exclusive</span></li>
                                                            <li><a href="{{route('Printers')}}?type=printer-faxing">Faxing </a> </li>
                                                            <li><a href="{{route('Printers')}}?type=printer-photo">Photo Printers</a> </li>
                                                            {{--<li><a href="#">Printing Only</a> </li>--}}
                                                            <li><a href="#">Scanners</a> </li>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                        <div class="wstheading">Laptops <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="{{route('Laptops')}}?type=laptop-gaming">Gaming laptops</a> </li>
                                                                <li><a href="{{route('Laptops')}}?type=laptop-ultrabooks">Ultrabooks</a> <span class="wstmenutag orangetag">Exclusive</span></li>
                                                            <li><a href="{{route('Laptops')}}?type=laptop-2-in-1">2 in 1 Laptops</a> </li>
                                                            <br>  <br>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                      {{--  <div class="wstheading">Accessories <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="#">Audio &amp; Video Accessories</a> </li>
                                                            <li><a href="#">Cable Security Devices</a> </li>
                                                            <li><a href="#">Input Devices </a> </li>
                                                            <li><a href="#">Memory Cards</a> </li>
                                                            <li><a href="#">Monitor Accessories</a> </li>
                                                            <li><a href="#">USB Gadgets</a> </li>
                                                        </ul>--}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class=""><span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="{{route('Entertainment')}}"><i class="fa fa-gamepad"></i>Entertainment</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li><img src="" alt=" "></li>
                                                        <li class="wstheading">Movies</li>
                                                        <li><a href="{{route('Movies')}}?type=movie-action">Action &amp; Adventure <span
                                                                        class="wstmenutag greentag">New</span></a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-comedy">Comedy</a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-documentary">Documentary</a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-thriller">Thriller</a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-fitness">Exercise &amp; Fitness </a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-animation">Animation</a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-fantasy">Fantasy</a></li>
                                                        <li><a href="{{route('Movies')}}?type=movie-romance">Romance</a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="" alt=" "></li>
                                                        <li class="wstheading">Games</li>
                                                        <li><a href="{{route('Games')}}?type=game-pc">PC</a> </li>
                                                        <li><a href="{{route('Games')}}?type=game-ps4">PlayStation 4 </a> </li>
                                                        <li><a href="{{route('Games')}}?type=game-xboxone">Xbox One </a> <span class="wstmenutag orangetag">Most Viewed</span></li>
                                                        <li><a href="{{route('Games')}}?type=game-nintendods">Nintendo DS</a> </li>
                                                        <li><a href="{{route('Games')}}?type=game-nintendoswitch">Nintendo Switch</a> </li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Music</li>
                                                        <li><img src="" alt=" "></li>
                                                        <li><a href="{{route('Music')}}?type=music-rock">Rock</a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-pop">Pop <span class="wstmenutag bluetag">50% off</span></a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-classical">Classical</a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-rap">Rap</a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-classicalrock">Classic Rock</a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-country">Country</a> </li>
                                                        <li><a href="{{route('Music')}}?type=music-electronic">Dance &amp; Electronic</a> </li>
                                                    </ul>

                                                </div>
                                            </li>

                                           {{-- <li class=""><span class="wsmenu-click02"><i
                                                            class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-film "></i> Movies</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Latest Movies</li>
                                                        <li><a href="#">Action &amp; Adventure <span
                                                                        class="wstmenutag greentag">New</span></a></li>
                                                        <li><a href="#">Comedy</a></li>
                                                        <li><a href="#">Documentary</a></li>
                                                        <li><a href="#">Educational</a></li>
                                                        <li><a href="#">Exercise &amp; Fitness </a></li>
                                                        <li><a href="#">Faith &amp; Spirituality</a></li>
                                                        <li><a href="#">Fantasy</a></li>
                                                        <li><a href="#">Romance</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li class=""><span class="wsmenu-click02"><i
                                                            class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-gamepad"></i> Games</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Newest Games</li>
                                                        <li><a href="#">PlayStation 4 </a> </li>
                                                        <li><a href="#">Xbox One </a> <span class="wstmenutag orangetag">Most Viewed</span></li>
                                                        <li><a href="#">Xbox 360 </a> </li>
                                                        <li><a href="#">Nintendo DS</a> </li>
                                                        <li><a href="#">Nintendo Switch</a> </li>
                                                        <li><a href="#">Retro Gaming</a> </li>
                                                        <li><a href="#">Digital Games</a> </li>
                                                        <li><a href="#">Kids &amp; Family </a> </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li class=""><span class="wsmenu-click02"><i
                                                            class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-music"></i> Music</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Popular Music Genre</li>
                                                        <li><a href="#">Rock</a> </li>
                                                        <li><a href="#">Pop <span class="wstmenutag bluetag">50% off</span></a> </li>
                                                        <li><a href="#">Classical</a> </li>
                                                        <li><a href="#">Rap</a> </li>
                                                        <li><a href="#">Classic Rock</a> </li>
                                                        <li><a href="#">Comedy &amp; Miscellaneous </a> </li>
                                                        <li><a href="#">Country</a> </li>
                                                        <li><a href="#">Dance &amp; Electronic</a> </li>
                                                    </ul>
                                                </div>
                                            </li>--}}
                                            <!--Sfarsti categoriiiiiiiiiiiiii-->

                                        </ul>
                                    </div>
                                </div>
                            </li>


                           {{-- <li><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#" class="navtext"><span>Shop By</span> <span>Half menu</span></a>
                                <div class="megamenu clearfix halfmenu">


                                    <ul class="wstliststy06">
                                        <li class="wstheading">Windows Products</li>
                                        <li><a href="#">List Products 01 </a> <span class="wstmenutag redtag">Popular</span></li>
                                        <li><a href="#">List Products 02</a></li>
                                        <li><a href="#">List Products 03</a></li>
                                        <li><a href="#">List Products 04</a> </li>
                                        <li><a href="#">List Products 05</a> </li>
                                        <li><a href="#">List Products 06</a></li>
                                    </ul>
                                    <ul class="wstliststy06">
                                        <li class="wstheading">Apple More Products</li>
                                        <li><a href="#">List Products 07 </a></li>
                                        <li><a href="#">List Products 08</a></li>
                                        <li><a href="#">List Products 09</a></li>
                                        <li><a href="#">List Products 10</a> </li>
                                        <li><a href="#">List Products 11 </a></li>
                                        <li><a href="#">List Products 12</a></li>
                                    </ul>

                                </div>
                            </li>--}}
                            <li class="wssearchbar clearfix">
                                <form method="get" action="{{route('search')}}" class="topmenusearch">
                                    <input type="text" name="search" id="search" placeholder="Search Product By Name, Type...">
                                    <button class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>

                            <!-- <li class="wscarticon clearfix"> <a href="#"><i class="fa fa-shopping-basket"></i> <em class="roundpoint">8</em><span class="mobiletext">Shopping Cart</span></a> </li> -->

                            <li class="wsshopmyaccount clearfix"><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span>
                                <a href="#" class="wtxaccountlink">
                                    <i class="fa fa-align-justify"></i>
                                    @guest
                                        My Account
                                    @else
                                        {{ Auth::user()-> name}}
                                        <?php if(Auth::viaRemember()) {
                                            echo Auth::viaRemember();
                                        } else
                                            echo Auth::viaRemember();

                                        ?>
                                    @endguest

                                    <i class="fa  fa-angle-down">
                                    </i>
                                </a>
                                <ul class="wsmenu-submenu">
                                    @guest
                                        <li><a href="/login"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log in</a></li>
                                        <li><a href="/register"><i class="fa fa-registered"></i>Register</a></li>
                                    @endguest
                                    @if(Auth::check())
                                        <li><a href="{{route('Account')}}"><i class="fa fa-black-tie"></i>View Profile</a></li>
                                            <li><a href="{{route('seeCart')}}"><i class="fa fa-shopping-cart"></i>My Cart</a></li>
                                        <li><a href="{{route('getWishlists')}}"><i class="fa fa-heart"></i>My Wishlist</a></li>
                                      {{--  <li><a href="#"><i class="fa fa-bell"></i>Notifications</a></li>--}}
                                        <li><a href="#"><i class="fa fa-question-circle"></i>Help Center</a></li>
                                    @if(Auth::user()->role == "admin")
                                            <li><a href="{{route('Admin')}}"><i class="fa fa-exclamation-triangle"></i>Admin Page</a></li>
                                    @endif
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </ul>
                            </li>

                            <div class="header-cart">
                                <a href="#" class="cart-link" data-toggle="modal" data-target="#cart-item"><i class="fa fa-cart-arrow-down"></i></a>
                                <span class="number-of-cart">{{\Cart::count()}}</span>
                            </div>
                        </ul>
                    </nav>
                </div>
                <!--Menu HTML Code-->
            </div>
        </div>

    </div>  <!-- End Navigation header -->
</div>

{{--/// Activate Selectize--}}

