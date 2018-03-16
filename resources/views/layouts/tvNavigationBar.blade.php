<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="sidebar-products-main">
        <h2>Filter by :</h2>
        <a role="button" href="<?php if(isset($actual_linkecho)) echo $actual_link?>">Click here to reset filters</a>
        <div class="sidebar-single">
            <div class="sidebar-title">
                <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#brandCollapse" aria-controls="#brandCollapse">
                    <span class="pull-left title-sidebar">Price</span>

                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                    <span class="pull-right"><i class="fa fa-minus"></i></span>
                    <div class="clearfix"></div>
                </a>
            </div> <!--End Sidebar title div-->
            {{----}}
            {{----}}
            <div class="sidebar-single">
                <div class="sidebar-title">
                    <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#typeCollapse" aria-controls="#typeCollapse">
                        <span class="pull-left title-sidebar">Type</span>
                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        <span class="pull-right"><i class="fa fa-minus"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div> <!--End Sidebar title div-->
                <div id="typeCollapse" class="collapse out">
                    <br>
                    <a role="button" onclick="addOrReplace('type','4kTV')"><span></span>4kTV</a><br />
                    <br>
                    <a role="button" onclick="addOrReplace('type','curved')"><span></span>CURVED TVs</a><br />
                    <br>
                    <a role="button" onclick="addOrReplace('type','led')"><span></span>LED TVs</a><br />
                    <br>
                    <a role="button" onclick="addOrReplace('type','lcd')"><span></span>LCD TVs</a><br />
                    <br>
                    <a role="button" onclick="addOrReplace('type','oled')"><span></span>OLED TVs</a><br />
                    <br>
                    <a role="button" onclick="addOrReplace('type','plasma')"><span></span>PLASMA TVs</a><br />
                    <div class="clearfix"></div>
                </div>
            </div>
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
                <a role="button" onclick="addOrReplace('producer','Samsung')"><span></span>Samsung</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','LALA')"><span></span>LALA</a><br />
                <br>
                <a role="button" onclick="addOrReplace('producer','LAVA2')"><span></span>UNDERCONST</a><br />
                <br>
                <a role="button" onclick="addOrReplace('producer','LAVA3')"><span></span>UNDERCONST</a><br/>
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

                <a role="button" onclick="addOrReplace('review',5)" style="color:#008000"><span></span>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                </a><br />
                <a role="button" onclick="addOrReplace('review',4)" style="color:#008000"><span></span>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                </a><br />
                <a role="button" onclick="addOrReplace('review',3)" style="color:#008000"><span></span>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                </a><br />
                <a role="button" onclick="addOrReplace('review',2)" style="color:#008000"><span></span>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                </a><br />
                <a role="button" onclick="addOrReplace('review',1)" style="color:#008000"><span></span>
                    <i class="fa fa-star"></i>
                </a><br />
                <div class="clearfix"></div>
            </div>
        </div> <!--End Single Sidebar-->

    </div>
</div>