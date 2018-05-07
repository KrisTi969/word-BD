<!DOCTYPE html>
<html>

@include('admin.admin-head')

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
@include('admin.admin-sidebar')

<!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span>Sidebar</span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('Admin')}}">Page</a></li>

                    </ul>
                </div>
            </div>
        </nav>

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
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td hidden>{{$product->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                {{ $products->links() }}
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
                        <strong>Success!</strong> The account information has been deleted.
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
                        <option value="lcd">lcd</option>
                    </select>
                    <br>
                    <span class="text-danger">
                            <strong id="type-error"></strong>
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
               {{--     <input size="35" autocomplete="off" class="input" id="title1" name="title1" type="text" placeholder="Title" required/>
                    <br>
                    <input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Field1" required/>

                    <input autocomplete="off" class="input" id="value1" name="value1" type="text" placeholder="Value1" required/>
                    <br>
                    <span class="text-danger">
                            <strong id="title1-error"></strong>
                        </span>
                    <br>
                    <span class="text-danger">
                            <strong id="field1-error"></strong>
                        </span>
                    <br>
                    <span class="text-danger">
                            <strong id="value1-error"></strong>
                        </span>--}}
                    <button id="b1" class="btn add-title" type="button">Add Title</button>
                </div>



                <small>Press - to remove a form field :)</small>

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
        console.log('facem update');
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
            console.log('facem delete');
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
                    titleBeforeUpgrade: titleBeforeUpgrade
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
