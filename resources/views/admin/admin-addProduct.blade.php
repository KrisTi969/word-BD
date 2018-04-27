
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

<link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} " />
<script type="text/javascript" src="{{ asset('js/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
</body>
</html>
