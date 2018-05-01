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
<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form method="POST"  id="">
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
                        <input type="text" name="description" class="form-control" id="description" placeholder="" oninput="myFunction('#description-error')">

                        <span class="text-danger">
                            <strong id="descriptiion-error"></strong>
                        </span>

                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-danger btn-lg " id="ajaxDelete" value="Delete" />
                    <input type="submit" class="btn btn-success btn-lg " id="ajaxSubmit" value="Edit" />
                </div>

            </form>


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
                title = $(this).children()[0].firstChild.textContent;
               /* console.log(title);*/
            });

        });
    </script>
<script>
    function myFunction(string) {
        $(string).empty();
    }
</script>
<script>
    jQuery('#ajaxSubmit').click(function(e){
        jQuery('.alert').show();
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{route('Admin-editUser')}}",
            method: 'post',
            dataType: "json",
            data: {
                title: jQuery('#title').val(),
                type: jQuery('#type').val(),
                quantity: jQuery('#quantity').val(),
                price: jQuery('#price').val(),
                titleBeforeUpgrade: titleBeforeUpgrade
            },
            success:function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.name) {
                        $('#title-error').html(data.errors.name[0]);
                    }
                    if (data.errors.lname) {
                        $('#type-error').html(data.errors.lname[0]);
                    }
                    if (data.errors.phone_number) {
                        $('#quantity').html(data.errors.phone_number[0]);
                    }
                    if (data.errors.phone_number) {
                        $('#quantity').html(data.errors.phone_number[0]);
                    }
                }
                if (data.success) {
                    $('#success-msg').removeClass('hidden');
                }
            }
        });
    });

    jQuery('#ajaxDelete').click(function(e){
        jQuery('.alert').show();
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{route('Admin-deleteUser')}}",
            method: 'post',
            dataType: "json",
            data: {
                emailBeforeUpgrade: emailBeforeUpgrade
            },
            success:function(data) {
                console.log(data);
                if (data.errors) {

                }
                if (data.success) {
                    $('#success-msg2').removeClass('hidden');
                }
            }
        });
    });
    $('#editAccount').on('hidden.bs.modal', function () {
        location.reload();
    })
</script>

</body>
</html>
