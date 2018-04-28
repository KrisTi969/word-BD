
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
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<input class="input" id="field' + next + '" name="field' + next + '" type="text" placeholder="Field ' + next +'">';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
            var removeButton = $(removeBtn);
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
                $(fieldID).remove();
            });
        });

        $(".add-title").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            nextTitle = nextTitle + 1;
            var newTitle = '  <input size="35"  class="input" id="title' + nextTitle + '" name="title' + next + '" type="text" placeholder="Title ' + nextTitle +'"/><br>';
            var newTitleInput = $(newTitle);
            var newIn = '<input class="input" id="field' + next + '" name="field' + next + '" type="text" placeholder="Field ' + next +'">';
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
            var removeButton = $(removeBtn);
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

            $("#field input").each(function(){
                /* console.log($(this).find(':input').context.name )*///<-- Should return all input elements in that specific form.
                var idGasit = $(this).find(':input.title').context.attributes.id.value;
                var valoare = jQuery('#' + idGasit).val();
                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    employees[valoare] = [];
                    console.log(valoare + "la titlu");
                }
            });


            var currentTitle;
            $("#field input").each(function(){
                var idGasit = $(this).find(':input').context.attributes.id.value;
                var valoare = jQuery('#' + idGasit).val();

                if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
                    currentTitle = valoare;
                }

                if (idGasit.indexOf('field') >= 0 || 'field'.indexOf(idGasit) >= 0) {
                    employees[currentTitle].push({
                        "das":valoare
                    });
                }

            });
            console.log(JSON.stringify(employees));


            debugger;

            console.log(JSON.stringify(employees));
            /* var countries = {};
             countries["USA"] = {};
             countries["USA"]["Alaska"] = {};
             countries["USA"]["Alaska"]["Anchorage"] = 7183;
             countries["USA"]["Alaska"]["Nome"] = 9378;

             alert(JSON.stringify(countries));   // will give you a valid JSON string representation */
            /*
                        var test = {};           // Object
                        test['b'] = [];        // Array
                        test['b'].push( 'item: ceva' );
                        test['b'].push( 'item: ceva' );
                        test['b'].push( 'item: ceva' );
                        var json = JSON.stringify(test);
                        alert(json);*/



            // jQuery('.alert').show();
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
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.lname) {
                            $('#lname-error').html(data.errors.lname[0]);
                        }
                        if (data.errors.email) {
                            $('#email-error').html(data.errors.email[0]);
                        }
                        if (data.errors.phone_number) {
                            $('#phone_number-error').html(data.errors.phone_number[0]);
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
