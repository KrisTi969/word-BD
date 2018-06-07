<div class="col-sm-2 col-md-2 col-lg-2">
    <div class="sidebar-products-main">
        <div class="panel panel-default" hidden id="panel">
            <div class="panel-heading">Your Filters:</div>
            <div class="panel-body"style="color: black;" id="panel-price" hidden></div>
            <div class="panel-body"style="color: black;" id="panel-type" hidden></div>
            <div class="panel-body"style="color: black;" id="panel-producer" hidden></div>
            <div class="panel-body"style="color: black;" id="panel-size" hidden></div>
            <div class="panel-body"style="color: black;" id="panel-review" hidden></div>
        </div>
        <a role="button" href="{{route('Smartphones')}}">Reset filters</a>

        <h2>Filter by :</h2>
        <div class="sidebar-single">
            <div class="sidebar-title">
                <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#brandCollapse" aria-controls="#brandCollapse">
                    <span class="pull-left title-sidebar">Price</span>

                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                    <span class="pull-right"><i class="fa fa-minus"></i></span>
                    <div class="clearfix"></div>
                </a>
            </div>
            <div id="brandCollapse" class="collapse out">

                {{-- <input type="search" name="brand_name" class="form-control" value="" placeholder="De facut range la price" />--}}
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('priceMin',1,'priceMax',200)"><span></span>UNDER 200 €</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('priceMin',200,'priceMax',450)"><span></span>200 - 450 €</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('priceMin',450,'priceMax',800)"><span></span>450 - 800€</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('priceMin',800,'priceMax',9999)"><span></span>ABOVE 800 €</a><br />
                <br>
                <div class="clearfix"></div>
            </div>
        </div>
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
                <a role="button" onclick="addOrReplace('type','smartphone')"><span></span>Smartphone</a><br />
                <br>
                <a role="button" onclick="addOrReplace('type','smartwatch')"><span></span>Smartwatch</a><br />
                <br>
                <a role="button" onclick="addOrReplace('type','phonecase')"><span></span>PhoneCase</a><br />
                <br>
                <a role="button" onclick="addOrReplace('type','bluetooth-headset')"><span></span>Bluetooth-Headset</a><br />
                <br>
                <a role="button" onclick="addOrReplace('type','smartphone-accesories')"><span></span>Smartphone-Accesories</a><br />
                <br>
                <a role="button" onclick="addOrReplace('type','headphone')"><span></span>Headphone</a><br />
                <div class="clearfix"></div>
            </div>
        </div>
        <!--End Single Sidebar-->

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
                <a role="button" onclick="addOrReplace('producer','Sony')"><span></span>Apple</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','LG')"><span></span>LG</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','Sony')"><span></span>Sony</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','Nokia')"><span></span>Nokia</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','Asus')"><span></span>Asus</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','HTC')"><span></span>HTC</a><br/>
                <br>
                <a role="button" onclick="addOrReplace('producer','Lenovo')"><span></span>Lenovo</a><br/>
                <br>
                <div class="clearfix"></div>
            </div>
        </div> <!--End Second Sidebar-->

        <div class="sidebar-single" id="size-bar">
            <div class="sidebar-title">
                <a data-toggle="collapse"  class="pointer" aria-expanded="true" data-target="#size" aria-controls="#sizeController">
                    <span class="pull-left title-sidebar">Size</span>

                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                    <span class="pull-right"><i class="fa fa-minus"></i></span>
                    <div class="clearfix"></div>
                </a>
            </div> <!--End Sidebar title div-->

            <div id="size" class="collapse out">
                <a role="button" onclick="addOrUpdateUrlParam('sizeMin',1,'sizeMax',4)"><span></span>Below 4 inch</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('sizeMin',4,'sizeMax',5)"><span></span>4 - 5 inch</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('sizeMin',5,'sizeMax',6)"><span></span>5 - 6 inch</a><br />
                <br>
                <a role="button" onclick="addOrUpdateUrlParam('sizeMin',6,'sizeMax',20)"><span></span>ABOVE 6 inch</a><br />
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

<script>
    $( document ).ready(function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var review = url.searchParams.get("review");
        var price1 = url.searchParams.get("priceMin");
        var price2 = url.searchParams.get("priceMax");
        const type = url.searchParams.get("type");
        const producer = url.searchParams.get("producer");
        var size1 = url.searchParams.get("sizeMin");
        var size2 = url.searchParams.get("sizeMax");
        if(size1!==null &&size2!==null){
            document.getElementById('panel').removeAttribute('hidden');
            document.getElementById('panel-size').removeAttribute('hidden');
            document.getElementById('panel-size').innerHTML = "Screen size: " + size1+ " - " +size2;
        }
        if(producer!==null){
            document.getElementById('panel').removeAttribute('hidden');
            document.getElementById('panel-producer').removeAttribute('hidden');
            document.getElementById('panel-producer').innerHTML = "Producer: " + producer;
        }
        if(review!==null){
            document.getElementById('panel').removeAttribute('hidden');
            document.getElementById('panel-review').removeAttribute('hidden');
            document.getElementById('panel-review').innerHTML = "Review: " + review + " Stars";

        }
        if(price1!==null &&price2!==null){
            document.getElementById('panel').removeAttribute('hidden');
            document.getElementById('panel-price').removeAttribute('hidden');
            document.getElementById('panel-price').innerHTML = "Price: " + price1+ " - " +price2;
        }
        if(type!==null){
            if(type==='bluetooth-headset' || type==='smartphone-accesories' || type==='headphone') {
                document.getElementById('size-bar').setAttribute('hidden', 'true');
            }
            document.getElementById('panel').removeAttribute('hidden');
            document.getElementById('panel-type').removeAttribute('hidden');
            document.getElementById('panel-type').innerHTML = "Type: " + type;
        }
    });
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