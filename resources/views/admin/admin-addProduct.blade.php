
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
        <div class="container   ">

            @include('admin.addProductForm')


        </div>
    </div>

</div>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>


<script>
    $(document).ready(function(){

        var next = 1;
        var nextTitle = 1;
        $(".add-more").click(function(e){
            e.preventDefault();
            var addto = "#value" + next;
            var addRemove = "#value" + (next);
            next = next + 1;
            var newIn = '<input class="input" id="field' + next + '" name="field' + next + '" type="text" placeholder="Field ' + next +'">';
            var newInput = $(newIn);
            var newIn2 = '<input class="input" id="value' + next + '" name="value' + next + '" type="text" placeholder="Value ' + next +'">';
            var newInput2 = $(newIn2);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput2);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);

            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum;
                if(this.id.length === 7) {
                    fieldNum = this.id.charAt(this.id.length - 1);
                } else {
                    var unitati = this.id.charAt(this.id.length - 1);
                    var  zecimala = this.id.charAt(this.id.length - 2);
                    fieldNum = zecimala.concat(unitati);
                }

                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $("#value" + fieldNum).remove();
                $(fieldID).remove();
            });
        });

        $(".add-title").click(function(e){
            e.preventDefault();
            var addto = "#value" + next;
            var addRemove = "#value" + (next);
            next = next + 1;
            nextTitle = nextTitle + 1;
            var newTitle = '  <input size="35"  class="input" id="title' + nextTitle + '" name="title' + next + '" type="text" placeholder="Title ' + nextTitle +'"/><br>';
            var newTitleInput = $(newTitle);
            var newIn = '<input class="input" id="field' + next + '" name="field' + next + '" type="text" placeholder="Field ' + next +'">';
            var newInput = $(newIn);
            var newIn2 = '<input class="input" id="value' + next + '" name="value' + next + '" type="text" placeholder="Value ' + next +'">';
            var newInput2 = $(newIn2);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput2);
            $(addto).after(newInput);
            $(addto).after(newTitleInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);
        });
    });


</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){



            var employees = {
            };

            var firstChestie;

            $("#field input").each(function(){
                /* console.log($(this).find(':input').context.name )*///<-- Should return all input elements in that specific form.
                var idGasit = $(this).find(':input.title').context.attributes.id.value;
                var valoare = jQuery('#' + idGasit).val();
                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    employees[valoare] = [];
                    console.log(valoare + "la titlu");
                }
            });

            var currentId;
            var currentTitle;
            $("#field input").each(function(){
                var idGasit = $(this).find(':input').context.attributes.id.value;
                var valoare = jQuery('#' + idGasit).val();

                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    currentTitle = valoare;
                }

                if (idGasit.indexOf('field') >= 0 || 'field'.indexOf(idGasit) >= 0) {
                    if(idGasit.length === 6) {
                        currentId = idGasit.charAt(idGasit.length - 1);
                    } else {
                        var unitati = idGasit.charAt(idGasit.length - 1);
                        var  zecimala = idGasit.charAt(idGasit.length - 2);
                        currentId = zecimala.concat(unitati);
                    }

                     firstChestie = jQuery('#field' + currentId).val();

                }
                if (idGasit.indexOf('value') >= 0 || 'value'.indexOf(idGasit) >= 0) {
                    var second = jQuery('#value' + currentId).val();
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
                url: "{{ route('Admin-storeProduct')}}",
                method: 'post',
                dataType: "json",
                data: {
                    title: jQuery('#mainTitle').val(),
                    type: jQuery('#type').val(),
                    price: jQuery('#price').val(),
                    quantity: jQuery('#quantity').val(),
                    description: employees,
                },
                success:function(data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#mainTitle-error').html(data.errors.name[0]);
                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.lname[0]);
                        }
                        if (data.errors.price) {
                            $('#price-error').html(data.errors.email[0]);
                        }
                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.phone_number[0]);
                        }
                    }
                    if (data.success) {
                        $('#success-msg').removeClass('hidden');
                    }
                }
            });
        });
    });
</script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
</body>
</html>
