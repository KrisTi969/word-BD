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
            {!! Form::open(['method'=>'GET','url'=>'/Admin/updateProductImages','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

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
                Current images for this product:
            </div>

            @csrf
            {{--Daca nu apar probleme, afisam un mesaj--}}
            <div id="success-msg" class="hidden">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> The product images have been updated!
                </div>
            </div>



            @include('admin.admin-uploadImage')


            <div class="form-group row">
                <label for="username" class="col-sm-2 form-control-label " hidden>Description:</label>
                <div class="col-sm-8">
                    <input type="hidden" name="description" class="form-control" id="description" placeholder="" oninput="myFunction('#price-error')" hidden>

                    <span class="text-danger">
                            <strong id="price-error"></strong>
                        </span>

                </div>
            </div>


           {{-- <div class="modal-footer">
                <input type="button" class="btn btn-danger btn-lg " id="ajaxDelete" value="Delete" />
            </div>--}}

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
    var toSend;
    var doRefresh;
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script>

</script>


<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        console.log(input.files)
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image1").change(function() {
        readURL1(this);
    });
    $("#image2").change(function() {
        readURL2(this);
    });
    $("#image3").change(function() {
        readURL3(this);
    });

</script>
<script>
    $(document).ready(function() {
        $('#userTable tr').click(function () {
            /* console.log($(this).children()[0].firstChild);*/
            document.getElementById("titleProduct").value = $(this).children()[0].firstChild.textContent;
        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#editAccount').on('hidden.bs.modal', function () {
            document.getElementById('img1').src="";
            document.getElementById('img2').src="";
            document.getElementById('img3').src="";
            $("#image1").val('');
            $("#image2").val('');
            $("#image3").val('');
               if (doRefresh === true) {
                   location.reload();
               }
        })

        $("#editAccount" ).on('show.bs.modal', function(){
            toSend = document.getElementById("titleProduct").value;
            console.log(toSend + "ASDASDAS");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{route('Admin-getProductImages')}}",
                method: 'post',
                dataType: "json",
                data: {
                    title: toSend
                },
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.quantity[0]);
                        }
                    }
                    if (data.success) {
                        doRefresh = true;
                        console.log(data);
                        document.getElementById('img1').src="http://127.0.0.1:8000/uploads/" + data.data[0];
                        document.getElementById('img2').src="http://127.0.0.1:8000/uploads/" + data.data[1];
                        document.getElementById('img3').src="http://127.0.0.1:8000/uploads/" + data.data[2];
                        $('#myModal').modal('show');
                    }
                }
            });
        });
    });
</script>

<script>
    $("#form").submit(function (event) {
        event.preventDefault();
        var $this = $(this);
        var url = $this.attr('action');
        var formData = new FormData(this);
        $.ajax({
            url: "http://127.0.0.1:8000/modifyPicture/"+toSend,
            type: "POST",
            dataType: "json",
            data: formData,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data.errors) {
                    if (data.errors.image1) {
                        $('#image1-error').html(data.errors.image1[0]);
                    }
                    if (data.errors.image2) {
                        $('#image2-error').html(data.errors.image2[0]);
                    }
                    if (data.errors.image3) {
                        $('#image3-error').html(data.errors.image3[0]);
                    }
                }
                if(data.success) {
                    $('#success-msg').removeClass('hidden');
                    doRefresh = true;
                }
            },
            error: function (data) {

            }
        });
    });
</script>


<script>
    function myFunction(string) {
        $(string).empty();
    }
</script>

</body>
</html>
