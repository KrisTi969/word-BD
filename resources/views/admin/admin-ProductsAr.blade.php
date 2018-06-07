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
            {!! Form::open(['method'=>'GET','url'=>'/Admin/getProductsAR','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

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
                <h5 class="modal-title" id="exampleModalLabel">Augmented Reality</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Add or update augmented reality object:
            </div>

            @csrf
            {{--Daca nu apar probleme, afisam un mesaj--}}
            <div id="success-msg" class="hidden">
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> The product 3D file has been updated!
                </div>
            </div>


            {!! Form::open(['id' => 'form','style'=>'text-align:left;','enctype'=>"multipart/form-data"]) !!}

            <div class="form-group">
                <label for="titleProduct">Product Images:</label>
                <br>


                {!! Form::file('file',array('id'=>'file')) !!}

                <input hidden id="titleProduct" title="ceva" value=""/>

                <img id="file" src=""  class="img-thumbnail" width="304" height="250" />
                <br>
                <span class="text-danger">
                            <strong id="file-error"></strong>
                        </span>

                <br>


            <button type="submit" class="btn btn-default">Submit</button>
                <br>
                <img id="loading" src="{{asset('images/ajax-loader.gif')}}" hidden>
            </fieldset>
            {!! Form::close() !!}


            <div class="form-group row">
                <label for="username" class="col-sm-2 form-control-label " hidden>Description:</label>
                <div class="col-sm-8">
                    <input type="hidden" name="description" class="form-control" id="description" placeholder="" oninput="myFunction('#price-error')" hidden>

                    <span class="text-danger">
                            <strong id="price-error"></strong>
                        </span>

                </div>
            </div>



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
    $(document).ajaxStart(function () {
        $("#loading").show();
    }).ajaxStop(function () {
        $("#loading").hide();
    });
    var toSend;
    var doRefresh;
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script>

    $('#userTable tr').click(function() {
        toSend = $(this).children()[0].firstChild.data;
        console.log($(this).children()[0].firstChild.data);
    });
    $(document).ready(function() {
        $('#editAccount').on('hidden.bs.modal', function () {
            document.getElementById('file').src="";
            $("#file").val('');
            if (doRefresh === true) {
                location.reload();
            }
        });

        $("#editAccount" ).on('show.bs.modal', function(){


            });
        });


    $("#form").submit(function (event) {
        event.preventDefault();
        var $this = $(this);
        var url = $this.attr('action');
        var formData = new FormData(this);
        $.ajax({
            url: "http://127.0.0.1:8000//uploadGLTF/"+toSend,
            type: "POST",
            dataType: "json",
            data: formData,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data.errors) {
                    if (data.errors.file) {
                        $('#file-error').html(data.errors.file[0]);
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
