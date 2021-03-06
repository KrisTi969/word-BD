<!DOCTYPE html>
<html>

@include('admin.admin-head')

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
@include('admin.admin-sidebar')

<!-- Page Content Holder -->
    <div id="content">

        @include('admin.admin-header')

        <div class="container">
            {!! Form::open(['method'=>'GET','url'=>'/Admin/productList','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
    <button class="btn btn-default-sm" type="submit">
        <i class="fa fa-search">Enter </i>
    </button>
</span>
            </div>

            <div class="container">
                {{Form::close()}}
                <div class="table-responsive">
                    <table id="userTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th hidden>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr data-toggle="modal" data-target="#editAccount" data-id="{{$product->id}}">
                                <td>{{$product->title}}</td>
                                <td>{{$product->type}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td hidden>{{$product->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <?php echo e($products->appends(request()->input())->links()); ?>
            </div>

        </div>
    </div>


</div>
<!-- Modal -->
<div class="modal fade table-responsive" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Modify desired fields:
            </div>

                @csrf
                {{--Daca nu apar probleme, afisam un mesaj--}}
                <div id="success-msg" class="hidden">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> The product information has been updated!
                    </div>
                </div>

                <div id="success-msg2" class="hidden">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> The product has been deleted.
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 form-control-label " >Title:</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder=""  minlength="2" required oninput="myFunction('#title-error')">
                        <span class="text-danger">
                            <strong id="title-error"></strong>
                        </span>
                    </div>
                </div>

            <div class="form-group row">
                <label for="type" class="col-sm-2 form-control-label Whitish">Type:</label>
                <div class="col-sm-8"  >
                    <select id="type" name="type" class="input-group-lg" >
                        <option value="" selected="selected">(please select a type)</option>
                        <option value="4kTV">4kTV</option>
                        <option value="lcdTV">lcdTV</option>
                        <option value="curvedTV">curvedTV</option>
                        <option value="curvedTV">curvedTV</option>
                        <option value="curvedTV">curvedTV</option>
                        <option value="curvedTV">curvedTV</option>
                        <option value="curvedTV">curvedTV</option>

                        <option value="accesories">accesories</option>
                        <option value="bags-cases">bags-cases</option>
                        <option value="binoculars-scopes">binoculars-scopes</option>
                        <option value="bluetooth-headset">bluetooth-headset</option>
                        <option value="digital-cameras">digital-cameras</option>
                        <option value="film-photografy">film-photografy</option>
                        <option value="flashes">flashes</option>
                        <option value="game-nintendods">game-nintendods</option>
                        <option value="game-nintendoswitch">game-nintendoswitch</option>
                        <option value="game-ps4">game-ps4</option>
                        <option value="game-xboxone">game-xboxone</option>
                        <option value="game-pc">game-pc</option>
                        <option value="headphone">headphone</option>
                        <option value="laptop-2-in-1">laptop-2-in-1</option>
                        <option value="laptop-gaming">laptop-gaming</option>
                        <option value="laptop-ultrabooks">laptop-ultrabooks</option>
                        <option value="lcdTV">lcdTV</option>
                        <option value="ledTV">ledTV</option>
                        <option value="lenses">lenses</option>
                        <option value="lightning-studio">lightning-studio</option>
                        <option value="monitor-4k">monitor-4k</option>
                        <option value="monitor-led">monitor-led</option>
                        <option value="monitor-touchscreen">monitor-touchscreen</option>
                        <option value="movie-action">movie-action</option>
                        <option value="movie-animation">movie-animation</option>
                        <option value="movie-comedy">movie-comedy</option>
                        <option value="movie-documentary">movie-documentary</option>
                        <option value="movie-fantasy">movie-fantasy</option>
                        <option value="movie-fitness">movie-fitness</option>
                        <option value="movie-romance">movie-romance</option>
                        <option value="movie-thriller">movie-thriller</option>
                        <option value="music-classical">music-classical</option>
                        <option value="music-comedy">music-comedy</option>
                        <option value="music-country">music-country</option>
                        <option value="music-electronic">music-electronic</option>
                        <option value="music-pop">music-pop</option>
                        <option value="music-rap">music-rap</option>
                        <option value="music-rock">music-rock</option>
                        <option value="music-classicalrock">music-classicalrock</option>
                        <option value="oledTV">oledTV</option>
                        <option value="phonecase">phonecase</option>
                        <option value="plasmaTV">plasmaTV</option>
                        <option value="printer-copying">printer-copying</option>
                        <option value="printer-faxing">printer-faxing</option>
                        <option value="printer-photo">printer-photo</option>
                        <option value="printer-scanners">printer-scanners</option>
                        <option value="printer-all-in-one">printer-all-in-one</option>

                        <option value="smartphone">smartphone</option>
                        <option value="smartphone-accesories">smartphone-accesories</option>
                        <option value="smartwatch">smartwatch</option>
                        <option value="video">video</option>





                    </select>
                    <br>
                    <span class="text-danger">
                            <strong id="type-error"></strong>
                        </span>
                </div>
            </div>



            <div class="form-group row">
                <label for="category" class="col-sm-2 form-control-label Whitish">Category:</label>
                <div class="col-sm-8"  >
                    <select id="category" name="category" class="input-group-lg" >
                        <option value="" selected="selected">(please select a category)</option>
                        <option value="Electronic Appliances">Electronic Appliances</option>
                        <option value="Computers-and-Accesories">Computers-and-Accesories</option>
                        <option value="Entertainment">Entertainment</option>
                    </select>
                    <br>
                    <span class="text-danger">
                            <strong id="category-error"></strong>
                        </span>
                </div>
            </div>



            <div class="form-group row">
                    <label for="lastname" class="col-sm-2 form-control-label ">Quantity:</label>
                    <div class="col-sm-8">
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="" minlength="2" required oninput="myFunction('#quantity-error')">

                        <span class="text-danger">
                            <strong id="quantity-error"></strong>
                        </span>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="username" class="col-sm-2 form-control-label ">Price:</label>
                    <div class="col-sm-8">
                        <input type="number" name="price" class="form-control" id="price" placeholder="" oninput="myFunction('#price-error')">

                        <span class="text-danger">
                            <strong id="price-error"></strong>
                        </span>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="username" class="col-sm-2 form-control-label " hidden>Description:</label>
                    <div class="col-sm-8">
                        <input type="hidden" name="description" class="form-control" id="description" placeholder="" oninput="myFunction('#price-error')" hidden>

                        <span class="text-danger">
                            <strong id="price-error"></strong>
                        </span>

                    </div>
                </div>


                <div id="field">
                    <small>Press - to remove a form field :)</small>
                    <button id="b1" class="btn add-title" type="button">Add Title</button>

        </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger btn-lg " id="ajaxDelete" value="Delete" />
                    <input type="submit" class="btn btn-success btn-lg " id="ajaxSubmit" value="Edit" />
                </div>
        </div>

    </div>
</div>


<!-- jQuery CDN -->
<!-- jQuery CDN -->
<script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
<!-- Bootstrap Js CDN -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/bootstrat-datepicker.js')}}"></script>
<script  src="{{asset('js/datepicker_function.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>


<script type="text/javascript" src="{!! asset('js/admin-scripts/remove-button.js') !!}"></script>


<script>
    $(document).ready(function() {
        var title;
        jQuery('#ajaxSubmit').click(function (e) {
            title = jQuery('#title1').val();
            var employees = {};

            var firstChestie;

            $("#field input").each(function () {
                /* console.log($(this).find(':input').context.name )*///<-- Should return all input elements in that specific form.
                var idGasit = $(this).find(':input.title').context.attributes.id.value;

                var valoare = jQuery('#' + idGasit).val();
                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    employees[valoare] = [];
                  /*  console.log(valoare + " ASTA E UN  titlu");*/
                }
            });

            var currentId;
            var currentTitle;
            $("#field input").each(function () {
                var idGasit = $(this).find(':input').context.attributes.id.value;
             /*   console.log("id Gasit: " + idGasit);*/
                var valoare = jQuery('#' + idGasit).val();
               /* console.log(valoare + " :val al lui idGasit");*/
                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    currentTitle = valoare;
                }

                if (idGasit.indexOf('field') >= 0 || 'field'.indexOf(idGasit) >= 0) {
                    if (idGasit.length === 6) {
                        currentId = idGasit.charAt(idGasit.length - 1);
                /*        console.log("Primul if: currentID:" +currentId);*/
                    } else {
                        var unitati = idGasit.charAt(idGasit.length - 1);
                        var zecimala = idGasit.charAt(idGasit.length - 2);
                        currentId = zecimala.concat(unitati);
                     /*   console.log("Al doilea if: currentID:" +currentId);*/
                    }

                    firstChestie = jQuery('#field' + currentId).val();
                /*    console.log("Firstchestie final ii:  " +currentId);*/

                }
                if (idGasit.indexOf('value') >= 0 || 'value'.indexOf(idGasit) >= 0) {
                    var second = jQuery('#value' + currentId).val();
                   /* console.log("CE NE INTERESEAZA:     " + firstChestie + " " + second);*/
                    employees[currentTitle].push({
                        [firstChestie]: second  //// aparent numai asa stie [] ca te referi la text ca js ii nebunel
                    });
                }

            });
            console.log(JSON.stringify(employees));

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('Admin-updateProduct')}}",
                method: 'post',
                dataType: "json",
                data: {
                    title: jQuery('#title').val(),
                    type: jQuery('#type').val(),
                    category: jQuery('#category').val(),
                    price: jQuery('#price').val(),
                    quantity: jQuery('#quantity').val(),
                    description: employees,
                    titleBeforeUpgrade: titleBeforeUpgrade
                },
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);
                        }
                        if (data.errors.price) {
                            $('#price-error').html(data.errors.price[0]);
                        }
                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);
                        }
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.quantity[0]);
                        }
                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                    }
                    if (data.success) {
                        doRefresh = true;
                        console.log(data);
                        $('#success-msg').removeClass('hidden');
                        $('#myModal').modal('show');
                    }
                }
            });
        });
    });
</script>

<script>
    function myFunction(string) {
        $(string).empty();
    }
</script>

<script>
    $(document).ready(function() {
        jQuery('#ajaxDelete').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('Admin-deleteProduct')}}",
                method: 'post',
                dataType: "json",
                data: {
                    title: titleBeforeUpgrade
                },
                success: function (data) {
                    console.log(data);
                    doRefresh = true;
                    if (data.errors) {

                    }
                    if (data.success) {
                        $('#success-msg2').removeClass('hidden');
                    }
                }
            });
        });

    });
        $('#editAccount').on('hidden.bs.modal', function () {
            $("#field").html("");
            if (doRefresh === true) {
                location.reload();
            }
        })

</script>

</body>
</html>
