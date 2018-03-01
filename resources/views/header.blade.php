<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 16.02.2018
 * Time: 20:49
 */
$file_name = basename($_SERVER['SCRIPT_FILENAME']);

$new_path = "";
if($file_name != "index.blade.php") {
    $new_path = "../../public/";
    $reddirect_link = "";
}
else {
    $reddirect_link = "";
}
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
                                    <th>No</th>
                                    <th>Item Name</th>
                                    <th>Item Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Digital Camera</td>
                                    <td><img src="<?php echo $new_path?>images/product-slide/product2.png" class="img img-responsive img-thumbnail" alt=""></td>
                                    <td>3</td>
                                    <td>200$</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Samsung Galaxy 7</td>
                                    <td><img src="<?php echo $new_path?>images/product-slide/product3.png" class="img img-responsive img-thumbnail" alt=""></td>
                                    <td>1</td>
                                    <td>500$</td>
                                </tr>
                                <tr>
                                    <td colspan="5" rowspan="5">
                                        Total Price <span class="bold text-primary" style="margin-left: 73%">800$</span>
                                    </td>
                                </tr>
                                <div class="clearfix"></div>
                                </tbody>
                            </table>
                            <p class="text-right text-danger">There are <span style="font-weight: bold">2</span> more products in the cart. Click Checkout now to buy the items..</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
                            </button>
                            <a href="<?php echo $reddirect_link?>account_cart.php" class="btn btn-yellow">Check Out</a>
                        </div>
                    </div>

                </div>
            </div> <!-- End Model -->

        </div>
    </div>
    <!-- End Header Main, logo, search bar,cart -->

    <div class="header-navigation">
        <div class="wsmenucontainer clearfix">
            <div class="overlapblackbg"></div>
            <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"><img src="<?php echo $new_path?>images/logo.png" alt=""></a> <a class="callusicon" href="tel:123456789"><span class="fa fa-phone"></span></a> </div>


            <div class="headerfull">
                <!--Main Menu HTML Code-->
                <div class="wsmain">
                    <!-- <div class="smllogo"><a href="#"><img src="images/logo.jpg" alt=""></a></div> -->
                    <nav class="wsmenu clearfix">
                        <ul class="mobile-sub wsmenu-list">
                            <li><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#" class="navtext"><span>Shop By</span> <span>Department</span></a>
                                <div class="wsshoptabing wtsdepartmentmenu clearfix">
                                    <div class="wsshopwp clearfix" style="height: 421px;">
                                        <ul class="wstabitem clearfix">
                                            <li class=""><span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="<?php echo $reddirect_link?>productsRedirect.php"><i class="fa fa-television"></i>Electronic Appliances</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li><img src="<?php echo $new_path?>./Megamenu_files/ele-menu-img01.jpg" alt=" "></li>
                                                        <li class="wstheading">TVs</li>
                                                        <li><a href="<?php echo $reddirect_link; ?>TVs.php?type=4k">4K Ultra HD TVs </a></li>
                                                        <li><a href="#">Curved TVs </a></li>
                                                        <li><a href="#">LED TVs</a></li>
                                                        <li><a href="#">LCD TVs</a></li>
                                                        <li><a href="#">OLED TVs</a> <span class="wstmenutag bluetag">Popular</span></li>
                                                        <li><a href="#">Plasma TVs</a></li>
                                                        <li><a href="#">Smart TVs</a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="<?php echo $new_path?>./Megamenu_files/ele-menu-img02.jpg" alt=" "></li>
                                                        <li class="wstheading">Camera, Photo &amp; Video</li>
                                                        <li><a href="#">Accessories <span class="wstcount">(1145)</span></a></li>
                                                        <li><a href="#">Bags &amp; Cases <span class="wstcount">(445)</span></a></li>
                                                        <li><a href="#">Binoculars &amp; Scopes <span class="wstcount">(45)</span></a></li>
                                                        <li><a href="#">Digital Cameras <span class="wstcount">(845)</span></a> </li>
                                                        <li><a href="#">Film Photography <span class="wstcount">(245)</span></a> <span class="wstmenutag bluetag">Popular</span></li>
                                                        <li><a href="#">Flashes <span class="wstcount">(105)</span></a></li>
                                                        <li><a href="#">Lenses <span class="wstcount">(445)</span></a></li>
                                                        <li><a href="#">Lighting &amp; Studio <span class="wstcount">(225)</span></a></li>
                                                        <li><a href="#">Video <span class="wstcount">(145)</span></a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="<?php echo $new_path?>./Megamenu_files/ele-menu-img03.jpg" alt=" "></li>
                                                        <li class="wstheading">Cell Phones &amp; Accessories</li>
                                                        <li><a href="#">Unlocked Cell Phones </a></li>
                                                        <li><a href="#">Smartwatches </a></li>
                                                        <li><a href="#">Carrier Phones</a></li>
                                                        <li><a href="#">Cell Phone Cases</a> <span class="wstmenutag orangetag">Hot</span></li>
                                                        <li><a href="#">Apple Cell Phones</a></li>
                                                        <li><a href="#">Bluetooth Headsets</a></li>
                                                        <li><a href="#">Cell Phone Accessories</a></li>
                                                        <li><a href="#">Fashion Tech</a></li>
                                                        <li><a href="#">Headphone</a></li>
                                                    </ul>
                                                    <ul class="wstliststy02">
                                                        <li><img src="<?php echo $new_path?>./Megamenu_files/ele-menu-img04.jpg" alt=" "></li>
                                                        <li class="wstheading">Wearable Device</li>
                                                        <li><a href="#">Activity Trackers </a></li>
                                                        <li><a href="#">Sports &amp; GPS Watches</a></li>
                                                        <li><a href="#">Smart Watches</a> <span class="wstmenutag greentag">New</span></li>
                                                        <li><a href="#">Virtual Reality Headsets</a></li>
                                                        <li><a href="#">Smart Tracking</a></li>
                                                        <li><a href="#">Wearable Cameras</a></li>
                                                        <li><a href="#">Smart Glasses</a></li>
                                                        <li><a href="#">Kids &amp; Pets</a></li>
                                                        <li><a href="#">Smart Sport Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <!--cat 3-->
                                            <li class=""><span class="wsmenu-click02"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-laptop"></i>Computers &amp; Accessories</a>
                                                <div class="wstitemright clearfix computermenubg" style="height: auto;">
                                                    <div class="wstmegamenucoll01 clearfix">
                                                        <div class="wstheading">Monitors <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="#">127 CM &amp; Above <span class="wstmenutag greentag">New</span></a></li>
                                                            <li><a href="#">102 to 126.9 CM </a></li>
                                                            <li><a href="#">76 to 101.9 CM</a></li>
                                                            <li><a href="#">51 to 75.9 CM</a></li>
                                                            <li><a href="#">46 to 50.9 CM</a></li>
                                                            <li><a href="#">40 to 45.9 CM</a></li>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                        <div class="wstheading">Printers <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="#">All-In-One</a> </li>
                                                            <li><a href="#">Copying </a> <span class="wstmenutag orangetag">Exclusive</span></li>
                                                            <li><a href="#">Faxing </a> </li>
                                                            <li><a href="#">Printing Photo Printing</a> </li>
                                                            <li><a href="#">Printing Only</a> </li>
                                                            <li><a href="#">Scanning </a> </li>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                        <div class="wstheading">Software <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="#">Antivirus &amp; Security</a> </li>
                                                            <li><a href="#">Business &amp; Office</a> <span class="wstmenutag orangetag">Exclusive</span></li>
                                                            <li><a href="#">Web Design</a> </li>
                                                            <li><a href="#">Digital Software</a> </li>
                                                            <li><a href="#">Education &amp; Reference</a> </li>
                                                            <li><a href="#">Lifestyle &amp; Hobbies</a> </li>
                                                        </ul>
                                                        <div class="cl" style="height:8px;"></div>
                                                        <div class="wstheading">Accessories <a href="#" class="wstmorebtn">View All</a></div>
                                                        <ul class="wstliststy03">
                                                            <li><a href="#">Audio &amp; Video Accessories</a> </li>
                                                            <li><a href="#">Cable Security Devices</a> </li>
                                                            <li><a href="#">Input Devices </a> </li>
                                                            <li><a href="#">Memory Cards</a> </li>
                                                            <li><a href="#">Monitor Accessories</a> </li>
                                                            <li><a href="#">USB Gadgets</a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class=""><span class="wsmenu-click02"><i
                                                            class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-film "></i> Movies</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Latest Movies</li>
                                                        <li><a href="#">Action &amp; Adventure <span
                                                                        class="wstmenutag greentag">New</span></a></li>
                                                        <li><a href="#">Bollywood </a></li>
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
                                                        <li><a href="#">PlayStation Vita </a> </li>
                                                        <li><a href="#">Retro Gaming</a> </li>
                                                        <li><a href="#">Digital Games</a> </li>
                                                        <li><a href="#">Microconsoles</a> </li>
                                                        <li><a href="#">Kids &amp; Family </a> </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li class=""><span class="wsmenu-click02"><i
                                                            class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#"><i class="fa fa-music"></i> Music</a>
                                                <div class="wstitemright clearfix" style="height: auto;">
                                                    <ul class="wstliststy02">
                                                        <li class="wstheading">Popular Music Genre</li>
                                                        <li><a href="#">Alternative &amp; Indie Rock</a> </li>
                                                        <li><a href="#">Broadway &amp; Vocalists</a> </li>
                                                        <li><a href="#">Children's Music</a> </li>
                                                        <li><a href="#">Christian <span class="wstmenutag bluetag">50% off</span></a> </li>
                                                        <li><a href="#">Classical</a> </li>
                                                        <li><a href="#">Classic Rock</a> </li>
                                                        <li><a href="#">Comedy &amp; Miscellaneous </a> </li>
                                                        <li><a href="#">Country</a> </li>
                                                        <li><a href="#">Dance &amp; Electronic</a> </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <!--Sfarsti categoriiiiiiiiiiiiii-->

                                        </ul>
                                    </div>
                                </div>
                            </li>


                            <li><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#" class="navtext"><span>Shop By</span> <span>Half menu</span></a>
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
                            </li>


                            <li class="wssearchbar clearfix">
                                <form class="topmenusearch">
                                    <input placeholder="Search Product By Name, Category...">
                                    <button class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </li>

                            <!-- <li class="wscarticon clearfix"> <a href="#"><i class="fa fa-shopping-basket"></i> <em class="roundpoint">8</em><span class="mobiletext">Shopping Cart</span></a> </li> -->

                            <li class="wsshopmyaccount clearfix"><span class="wsmenu-click"><i class="wsmenu-arrow fa fa-angle-down"></i></span><a href="#" class="wtxaccountlink"><i class="fa fa-align-justify"></i>My Account <i class="fa  fa-angle-down"></i></a>
                                <ul class="wsmenu-submenu">
                                    <li><a href="<?php echo $reddirect_link?>account.php"><i class="fa fa-black-tie"></i>View Profile</a></li>
                                    @guest
                                    <li><a href="/login"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log in</a></li>
                                    <li><a href="#"><i class="fa fa-registered"></i>Register</a></li>
                                    @endguest
                                    <li><a href="#"><i class="fa fa-heart"></i>My Wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-bell"></i>Notifications</a></li>
                                    <li><a href="#"><i class="fa fa-question-circle"></i>Help Center</a></li>
                                    @guest
                                    <li><a href="#"><i class="fa fa-sign-out"></i>Logout</a></li>
                                    @endguest
                                </ul>
                            </li>

                            <div class="header-cart">
                                <a href="#" class="cart-link" data-toggle="modal" data-target="#cart-item"><i class="fa fa-cart-arrow-down"></i></a>
                                <span class="number-of-cart">20</span>
                            </div>
                        </ul>
                    </nav>
                </div>
                <!--Menu HTML Code-->
            </div>
        </div>

    </div>  <!-- End Navigation header -->

</div>