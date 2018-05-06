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
                    <label for="lastname" class="col-sm-2 form-control-label ">Type:</label>
                    <div class="col-sm-8">
                        <input type="text" name="type" class="form-control" id="type" placeholder="" minlength="2" required oninput="myFunction('#type-error')">

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
                    <label for="username" class="col-sm-2 form-control-label ">Description:</label>
                    <div class="col-sm-8">
                        <input type="text" name="description" class="form-control" id="description" placeholder="" oninput="myFunction('#price-error')">

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
                </div>


                <button id="b1" class="btn add-title" type="button">Add Title</button>

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

    <script>




        var next = 1;
        var doRefresh = false;
        var titleBeforeUpgrade;
        $(function () {
            $('#editAccount').modal({
                keyboard: true,
                backdrop: "static",
                show: false,
            }).on('show', function () {

            });
            $('#userTable tr').click(function() {
                document.getElementById('title').value = $(this).children()[0].firstChild.textContent;
                document.getElementById('type').value = $(this).children()[1].firstChild.textContent;
                document.getElementById('quantity').value = $(this).children()[2].firstChild.textContent;
                document.getElementById('price').value = $(this).children()[3].firstChild.textContent;
                document.getElementById('description').value = $(this).children()[4].firstChild.textContent;
                titleBeforeUpgrade = $(this).children()[0].firstChild.textContent;
                var StringJson = document.getElementById('description').value;
                var aux = JSON.parse(StringJson);
                console.log(aux);

                    // append input control at start of form
                var pasTitlu = 1;
                var pasSubTitlu = 1;
                $.each(aux, function(index , incaceva) {

                    if(pasTitlu === 1) {
                        $("<label id='label'>Title:</label>\n" +
                            "<br>")
                            .attr("id", "label" + pasTitlu)
                            .appendTo("#field");


                        $("<input size=\"14\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Title\" required/>\n" +
                            "<br>")
                            .attr("id", "title" + pasTitlu)
                            .attr("name", "title" + pasTitlu)
                            .attr("value", index)
                            .appendTo("#field");
                    }
                    else {

                        $("<label id='label'>Title:</label>\n" +
                            "<br id='ssa'>")
                            .attr("id", "label" + pasTitlu)
                            .appendTo("#field");

                        $("<input size=\"14\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Title\" required/>\n")
                            .attr("id", "title" + pasTitlu)
                            .attr("name", "title" + pasTitlu)
                            .attr("value", index)
                            .appendTo("#field");

                        var idStergere = 'id=' + 'remove-titlu' + pasTitlu;
                        $("input#title" + pasTitlu).after('<button '+ idStergere +' class=\"btn btn-danger remove-titlu\" >X</button><br id="ss">');
                    }
                    pasTitlu = pasTitlu + 1;
                    for (var key in incaceva) {
                        if(incaceva.hasOwnProperty(key)) {
                            var rez = JSON.stringify(incaceva[key]);
                            var rez1 = rez.substring(rez.indexOf('"') + 1, rez.indexOf(':') - 1);
                            var rez2 = rez.substring(rez.lastIndexOf(":") + 2, rez.lastIndexOf('"'));

                            $("  <input size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/>\n")
                                .attr("id", "field" + pasSubTitlu)
                                .attr("name", "field" + pasSubTitlu)
                                .attr("value", rez1)
                                .appendTo("#field");

                            $("  <input size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/>\n <br>")
                                .attr("id", "value" + pasSubTitlu)
                                .attr("name", "value" + pasSubTitlu)
                                .attr("value", rez2)
                                .appendTo("#field");

                            if (pasSubTitlu != 1) {
                                var id = 'id=' + 'remove' + pasSubTitlu;
                                $("input#value" + pasSubTitlu).after('<button ' + id + ' class=\"btn btn-danger remove-me\" >-</button>');
                            }
                            if (pasSubTitlu == 1) {
                                var id = 'id=' + 'add' + pasSubTitlu;
                                $("input#value" + pasSubTitlu).after('<button ' + id + ' class=\"btn btn-blue add-more\" >+</button>');
                            }
                            pasSubTitlu = pasSubTitlu + 1;

                        }
                    }

                });

                $(".remove-titlu").click(function(e) {

                    e.preventDefault();
                     alert(e.target.id.match(/\d+/)[0]);
                /*    pasSubTitlu = pasSubTitlu +1;

                    var id = 'id=' + 'remove' + pasSubTitlu;
                    var idField = 'id=' + 'field' + pasSubTitlu;
                    var idValue = 'id=' + 'value' + pasSubTitlu;
                    $("button#add"+e.target.id.match(/\d+/)[0]).after('<input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button ' + id + ' class=\"btn btn-danger remove-me\" >-</button>');
*/
                var continua = true;
                var toCheck = document.getElementById('remove-titlu2').nextSibling; // #foo3
                    console.log(toCheck + "VERIFICAM");
                while(continua) {

                    rez = toCheck.match(/field|value/g);
                    console.log(rez  + "rez");
                    if (rez !== 'null') {
                        console.log(toCheck + "VERIFICAM2");
                        toCheck = document.getElementById('remove-titlu2').nextSibling;
                        console.log(toCheck + "NEXT");

                        $("#" + toCheck).remove();
                        toCheck = document.getElementById(toCheck).nextSibling.id;
                        console.log(toCheck + "NEXT");
                    }
                    else{
                        toCheck = document.getElementById(toCheck).nextSibling.id;

                        console.log( "false");
                    }

                }
                });


                $(".add-more").click(function(e) {

                    e.preventDefault();
                   /* alert(e.target.id.match(/\d+/)[0]);*/
                    pasSubTitlu = pasSubTitlu +1;

                    var id = 'id=' + 'remove' + pasSubTitlu;
                    var idField = 'id=' + 'field' + pasSubTitlu;
                    var idValue = 'id=' + 'value' + pasSubTitlu;
                    $("button#add"+e.target.id.match(/\d+/)[0]).after('<input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button ' + id + ' class=\"btn btn-danger remove-me\" >-</button>');


                    $('.remove-me').click(function (e) {
                        e.preventDefault();
                        var fieldNum;
                        if (this.id.length === 7) {
                            fieldNum = this.id.charAt(this.id.length - 1);
                            console.log(fieldNum);
                        } else {
                            var unitati = this.id.charAt(this.id.length - 1);
                            var zecimala = this.id.charAt(this.id.length - 2);
                            fieldNum = zecimala.concat(unitati);
                            console.log(fieldNum);
                        }

                        var fieldID = "#field" + fieldNum;
                        $(this).remove();
                        $("#value" + fieldNum).remove();
                        $(fieldID).remove();
                    });


                });
                    $('.remove-me').click(function (e) {
                        e.preventDefault();
                        var fieldNum;
                        if (this.id.length === 7) {
                            fieldNum = this.id.charAt(this.id.length - 1);
                            console.log(fieldNum);
                        } else {
                            var unitati = this.id.charAt(this.id.length - 1);
                            var zecimala = this.id.charAt(this.id.length - 2);
                            fieldNum = zecimala.concat(unitati);
                            console.log(fieldNum);
                        }

                        var fieldID = "#field" + fieldNum;
                        $(this).remove();
                        $("#value" + fieldNum).remove();
                        $(fieldID).remove();
                    });

                $(".add-title").click(function(e){
                    e.preventDefault();
                    pasTitlu = pasTitlu + 1;
                    pasSubTitlu = pasSubTitlu +1;

                    var id = 'id=' + 'remove' + pasSubTitlu;
                    var idField = 'id=' + 'field' + pasSubTitlu;
                    var idValue = 'id=' + 'value' + pasSubTitlu;
                    var idDiv = 'id=' + 'div'+ pasTitlu;
                  /*  $("#field"+e.target.id.match(/\d+/)[0]).after('<br><label >Title:</label> <br> <input size=\"14\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Title\" required/>' +
                        '                        "<br>"' +
                        '  <input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button ' + id + ' class=\"btn btn-danger remove-me\" >-</button>');
*/
                    $("button#b1").before('<div ' + idDiv + '  ><input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button ' + id + ' class=\"btn btn-danger remove-me\" >-</button> </div>');
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

    jQuery('#ajaxDelete').click(function(e){
        jQuery('.alert').show();
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
            success:function(data) {
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


    $('#editAccount').on('hidden.bs.modal', function () {
        $("#field").html("");
        if(doRefresh===true) {
            location.reload();
        }
    })
</script>

</body>
</html>
